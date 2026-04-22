<?php

namespace App\Http\Requests;

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'message' => 'required|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est obligatoire.',
            'email.email' => 'L\'email doit être valide.',
            'message.required' => 'Le message est obligatoire.',
            'message.max' => 'Le message ne doit pas dépasser 1000 caractères.',
        ];
    }
}
