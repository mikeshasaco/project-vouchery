<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
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
            'subscription_price'=> 'required|max:60',
            'bankName' => 'required|max:100',
            'beneficiarySwiftCode' => 'required|numeric',
            'ibanAccountNo' => 'required|numeric', 
        ];
    }
    public function messages(){
        return[
            'subscription_price'=>'Please select subscription price',
            'bankName'=>'Bank Name is required',
            'beneficiarySwiftCode'=>'Routing Number is required',
            'ibanAccountNo'=>'Account Number is required'
        ];
    }
}
