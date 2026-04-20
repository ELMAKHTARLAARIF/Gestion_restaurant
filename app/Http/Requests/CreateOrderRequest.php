<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Authorize the request
     */
    public function authorize(): bool
    {
        return true; // change if you need auth logic
    }

    /**
     * Validation rules
     */
    public function rules(): array
    {
        return [
            'items'          => ['required', 'array', 'min:1'],
            'items.*.id'     => ['required', 'integer'], // optional but recommended
            'items.*.qty'    => ['required', 'integer', 'min:1'],

            'prenom'         => ['required', 'string', 'max:255'],
            'nom'            => ['required', 'string', 'max:255'],
            'email'          => ['required', 'email', 'max:255'],
            'telephone'      => ['required', 'string', 'max:20'],

            'payment_method' => ['required', 'string', 'in:cash,card,online'], // adjust values
        ];
    }

    /**
     * Custom messages (optional)
     */
    public function messages(): array
    {
        return [
            'items.required' => 'You must add at least one item.',
            'items.min'      => 'Order must contain at least one item.',
            'email.email'    => 'Please enter a valid email address.',
        ];
    }
}