<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Lang;

class AccountRules implements Rule
{

    protected $type;

    /**
     * AccountRules constructor.
     * @param array $type
     */
    public function __construct($type = [
        'phone',
        'email',
        'username'
    ])
    {
        $this->type = $type;
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
        $return = false;
        foreach ($this->type as $item) {
            switch ($item) {
                case 'phone':
                    $return = preg_match("/^[1][3,4,5,7,8,9][0-9]{9}$/", $value);
                    break;
                case 'email':
                    $return = filter_var($value, FILTER_VALIDATE_EMAIL);
                    break;
                case 'username':
                    $return = ctype_alnum($value);
                    break;
            }
            if ($return) {
                return true;
            }
        }


        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $msg = array();
        foreach ($this->type as $item) {
            switch ($item) {
                case 'phone':
                    $msg[] = Lang::get('validation.account.phone');
                    break;
                case 'email':
                    $msg[] = Lang::get('validation.account.email');
                    break;
                case 'username':
                    $msg[] = Lang::get('validation.account.username');
                    break;
            }
        }
        return count($msg) > 1 ? implode(' 或 ', $msg) : $msg[0];
    }
}
