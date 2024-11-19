<?php

namespace App\Http\Requests\todo;

use App\Models\Todo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $todo = Todo::find($this->route('id'));
        return $todo && Gate::allows('update-todo', $todo);
    }

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
