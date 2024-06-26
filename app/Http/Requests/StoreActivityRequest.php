<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
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
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'date' => 'required|date|after_or_equal:today',
        'capacity' => 'required|integer|min:1',
        'provider_id' => 'required|exists:users,id',
        'duration' => 'required|numeric|gt:0|lte:12',
        'guide_id' => 'nullable|exists:users,id',
        'place_id' => 'required|exists:places,id',
        'category_id' => 'required|exists:categories,id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
