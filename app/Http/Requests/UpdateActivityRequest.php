<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
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
        'name' => 'string|max:255',
        'description' => 'string',
        'price' => 'numeric|min:0',
        'date' => 'date|after_or_equal:today',
        'capacity' => 'integer|min:1',
        'provider_id' => 'exists:users,id',
        'duration' => 'numeric|gt:0',
        'guide_id' => 'nullable|exists:users,id',
        'place_id' => 'exists:places,id',
        'category_id' => 'exists:categories,id',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
