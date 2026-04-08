<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReservationRequest extends FormRequest
{
        protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
        {
                dd($validator->errors()->all());
        }
        public function authorize(): bool
        {
                return true;
        }

        public function rules(): array
        {
                return [
                        'name'            => 'required|string|max:255',
                        'lastName'        => 'required|string|max:255',
                        'telephone'       => 'required|string|max:20',
                        'reservationDate' => 'required|date|after_or_equal:today',
                        'Hour'            => 'required|string',
                        'numberOfPeople'  => 'required|integer|min:1|max:8',
                        'tableNumber'     => 'required|integer|min:1|max:10',
                        'special_requests' => 'nullable|string|max:500',
                ];
        }

        public function messages(): array
        {
                return [
                        'reservationDate.after_or_equal' => 'The reservation date must be today or in the future.',
                        'numberOfPeople.max'             => 'For more than 8 guests, please contact us directly.',
                ];
        }
}
