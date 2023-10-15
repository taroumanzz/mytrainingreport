<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
            'weight' => 'required',
            'freq' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'weight.required' => '重量は入力必須です。',
            'freq.required' => '回数は入力必須です。',
        ];
    }
}
