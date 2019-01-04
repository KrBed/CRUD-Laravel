<?php

namespace App\Http\Requests;

use App\Rules\MobilePhoneValidation;
use App\Rules\StationaryPhoneValidation;
use Illuminate\Foundation\Http\FormRequest;

class KontaktRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'imie' => 'required',
            'nazwisko' => 'required',
            'firma' => 'required',
            'oddzial' => 'required',
            'telefonStacjonarny' => new StationaryPhoneValidation,
            'telefonKomorkowy' => new MobilePhoneValidation,
            'email' =>'nullable|email'
        ];
    }
    public function messages()
    {
        return [
            'imie.required' => 'Pole imię jest wymagane',
            'nazwisko.required' => 'Pole nazwisko jest wymagane',
            'firma.required' => 'Pole firma jest wymagane',
            'oddzial.required' => 'Pole oddzial jest wymagane',
            'email.email' => 'Wpisz poprawny adres email'
        ];
    }
}
