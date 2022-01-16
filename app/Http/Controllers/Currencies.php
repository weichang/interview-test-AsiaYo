<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Room;
use App\Models\User;
use App\Service\Currencies\JPYConvert;
use App\Service\Currencies\TWDConvert;
use App\Service\Currencies\USDConvert;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Currencies extends Controller
{
    /**
     * @OA\Post(
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

        User::all()->random()->id;

       return  Room::where('property_id',5)->get()->random()->id;
        $source = $request->source;
        $amount = $request->amount;
        $target = $request->target;

        $currenciesData = json_decode(file_get_contents(public_path() . '/testData/currencies.json'), true);
        $classArray = [
            'TWD' => new TWDConvert($currenciesData, $source, $amount, $target),
            'JPY' => new JPYConvert($currenciesData, $source, $amount, $target),
            'USD' => new USDConvert($currenciesData, $source, $amount, $target),
        ];

        try {
            $class = $classArray[$source];
            $convertAmount = $class->convert();
            return response()->json(['convertAmount' => $convertAmount]);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }

    }
}
