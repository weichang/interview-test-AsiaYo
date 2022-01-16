<?php
/**
 * Created by PhpStorm.
 * User: jeffrey
 * Date: 2022/1/16
 * Time: 12:52 PM
 */

namespace App\Service\Currencies;


abstract class Currencies
{
    public $currenciesData = [];
    public $source;
    public $amount;
    public $target;

    public function __construct($currenciesData, $source, $amount, $target)
    {
        $this->currenciesData = $currenciesData;
        $this->source = $source;
        $this->amount = $amount;
        $this->target = $target;
    }

    public abstract function convert();

}