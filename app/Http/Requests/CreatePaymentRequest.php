<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'prenom'         => 'required|string|max:100',
            'nom'            => 'required|string|max:100',
            'email'          => 'required|email|max:255',
            'telephone'      => 'required|string|max:30',
            'payment_method' => 'required|in:card,cash,mobile',
            'Total_Price'   => 'required|',
            'items'          => 'required|array|min:1',
            'items.*.id'     => 'required',
            'items.*.price'  => 'required|numeric|min:0',
            'items.*.qty'    => 'required|integer|min:1',

            // Only required if card
            'stripe_payment_intent' => 'required_if:payment_method,card'
        ];
    }
    protected function failedValidation($validator)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(
            response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
