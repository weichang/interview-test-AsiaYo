<?php

namespace App\Http\Controllers;

use App\Service\Currencies\JPYConvert;
use App\Service\Currencies\TWDConvert;
use App\Service\Currencies\USDConvert;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Currencies extends Controller
{


    public function action(Request $request)
    {
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
