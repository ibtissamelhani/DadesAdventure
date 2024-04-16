<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuideRequest extends FormRequest
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
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'password' => 'required|string|min:8',
            'spoken_languages' => 'required|array|min:1',
            'spoken_languages.*' => 'required|string|in:English,Spanish,Chinese,Frensh,Arabic',
        ];
    }
}
