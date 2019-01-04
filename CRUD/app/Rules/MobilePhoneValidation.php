<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MobilePhoneValidation implements Rule
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
        if ($value == null) {
            return true;
        }

        $filtered_phone_number = filter_var($value, FILTER_SANITIZE_NUMBER_INT);

        $phone_to_check = str_replace("-", "", $filtered_phone_number);

        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Proszę podać telefon w formacie 00-000-000-000';
    }
}
