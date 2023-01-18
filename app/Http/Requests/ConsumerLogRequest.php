<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsumerLogRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'room' => 'required|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения',
            'room.required' => 'Поле "Комната" обязательно для заполнения',
        ];
    }
}
