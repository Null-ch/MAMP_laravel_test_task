<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StroreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'password' => 'required|string|min:8',
            'email' => 'required|string|email|unique:users',
            'role' => 'required|integer',
            'isActive' => '',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле должно быть заполнено',
            'name.string' => 'Имя должно быть строкой',
            'password.required' => 'Это поле должно быть заполнено',
            'email.required' => 'Это поле должно быть заполнено',
            'email.string' => 'Почта должна быть строкой',
            'email.email' => 'Почта должна быть в формате example@mail.ru',
            'email.unique' => 'Email уже занят',
        ];
    }
}
