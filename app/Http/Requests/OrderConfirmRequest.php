<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderConfirmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Validate name, email and mobile phone of the customer.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        'customer_name' => 'required|min:5|max:80',
        'customer_email' => 'required|email|min:5|max:120',
        'customer_mobile' => 'required|digits_between:10,40'
        ];
    }
}
