<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AccountIsEmailOrPhone implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return (preg_match("/^[1][3,4,5,7,8,9][0-9]{9}$/",$value) || filter_var($value, FILTER_VALIDATE_EMAIL)) ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The incorrect account format.';
    }
}
