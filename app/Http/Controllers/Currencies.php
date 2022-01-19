<?php

namespace App\Http\Controllers;

use App\Service\Currencies\Convert;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class Currencies extends Controller
{
    /**
     * @OA\Get(
     *     tags={"匯率轉換"},
     *     path="/api/currencies",
     *     description="匯率轉換API",
     *     @OA\RequestBody(
     *      required=true,
     *       @OA\JsonContent(
     *        type="object",
     *          @OA\Property(property="source", type="string" ,example="" ,description="來源幣別 (TWD/JPY/USD)"),
     *          @OA\Property(property="target", type="string" ,example="" ,description="目標幣別 (TWD/JPY/USD) "),
     *          @OA\Property(property="amount", type="integer" ,example="" ,description="金額數字")
     *      ),
     *    ),
     *     @OA\Response(response="default", description="")
     * )
     */

    public function action(Request $request)
    {
        $rules = [
            "source" => "required|string",
            "target" => "required|string",
            "amount" => "required|integer",
        ];
        $validator = Validator::make($request->route()->parameters(), $rules);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json(['status' => false, 'error' => $error], 400);
        }

        $source = $request->source;
        $amount = $request->amount;
        $target = $request->target;

        $currenciesData = json_decode(file_get_contents(public_path() . '/testData/currencies.json'), true);
        try {

            $convert = new Convert($currenciesData, $source, $amount, $target);
            $convertAmount =  $convert->convert();
            return response()->json(['convertAmount' => $convertAmount]);
        } catch (\Exception $e) {
            return response()->json(['status' => false,'msg' => $e->getMessage()], 400);
        }

    }
}
