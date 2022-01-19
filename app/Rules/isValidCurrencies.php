<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class isValidCurrencies implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array($value, [
            "TWD",
            "USD",
            "JPY"
        ]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '匯率幣別不符合';
    }
}
