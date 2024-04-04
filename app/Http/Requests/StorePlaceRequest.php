<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:places',
            'address' => 'required|string',
            'email' => 'required|email|unique:places',
            'phone' => 'required|string',
            'type_id' => 'required|exists:types,id',
            'city_id' => 'required|exists:cities,id',
        ];
    }
}
