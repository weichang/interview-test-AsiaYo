<?php
/**
 * Created by PhpStorm.
 * User: jeffrey
 * Date: 2022/1/16
 * Time: 12:54 PM
 */

namespace App\Service\Currencies;


class USDConvert extends Currencies
{
    public function convert()
    {
        $currenciesData = $this->currenciesData;
        $source = $this->source;
        $target = $this->target;
        $amount = $this->amount;
        if (!empty($currenciesData['currencies'][$source]) && !empty($currenciesData['currencies'][$source][$target])) {
            $targetPrice = $currenciesData['currencies'][$source][$target];
            return number_format($amount * $targetPrice, 2, '.', ',');
        }
    }

}