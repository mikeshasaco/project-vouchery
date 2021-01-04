<?php

namespace App\Http\Requests;


use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardExpirationMonth;
use Illuminate\Foundation\Http\FormRequest;

class UserSubscriptionRequest extends FormRequest
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
            'card_number' => ['required', new CardNumber],
            'exp_year' => ['required', new CardExpirationYear($this->get('exp_month'))],
            'exp_month' => ['required', new CardExpirationMonth($this->get('exp_year'))],
            'cv_code' => ['required', new CardCvc($this->get('card_number'))]
        ];
    }
}
