<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SendRequestRequest extends FormRequest
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
            'request-name' => 'required',
            'request-email' => 'required',
            'request-tel' => 'required',
            'request-date' => 'required',
            'request-checkbox' => 'required|in:1',
            'image-input' => ['required', 'image', 'mimes:jpeg,png', 'max:2048'],
            'file-input' => ['required', 'file', 'mimes:pdf,docx', 'max:5120'],
            'country' => ['required', 'integer', Rule::exists('countries', 'id')],
            'city' => ['required', 'integer', Rule::exists('cities', 'id')->where(function ($query) {
                return $query->where('country_id', $this->country);
            })],
        ];
    }

    public function messages(): array
    {
        return [
            'request-checkbox.in' => 'You must agree to the terms and conditions.',
        ];
    }
}
