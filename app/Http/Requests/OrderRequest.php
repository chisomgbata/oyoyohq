<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'contact_email' => ['required', 'email', 'max:254'],
            'contact_phone_number' => ['required'],
            'contact_name' => ['required'],
            'shipping_first_name' => ['nullable'],
            'shipping_last_name' => ['nullable'],
            'shipping_address' => ['nullable'],
            'shipping_apartment' => ['nullable'],
            'shipping_city' => ['nullable'],
            'shipping_state' => ['nullable'],
            'shipping_zip' => ['nullable'],
            'shipping_country' => ['nullable'],
            'shipping_phone_number' => ['nullable'],
            'quantities' => ['array'],
            'proof' => ['image', 'required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
