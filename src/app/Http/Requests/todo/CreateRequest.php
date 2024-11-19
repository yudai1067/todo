<?php

namespace App\Http\Requests\todo;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:100'],
            'description' => ['max:1000'],
            'deadline' => ['required', 'after:now']
        ];
    }

    public function messages(): array
    {
        return [
            'deadline.after' => ':attributeには、現在時刻より後の日時を指定してください。'
        ];
    }
}
