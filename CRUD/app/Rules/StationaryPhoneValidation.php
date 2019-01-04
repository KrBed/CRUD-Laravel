<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StationaryPhoneValidation implements Rule
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

        if (strlen($phone_to_check) < 9 || strlen($phone_to_check) > 12) {
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
        return 'Proszę podać telefon w formacie 00-000-00-00';
    }
}
