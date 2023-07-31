<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            "name"=>["required","string"],
            "email"=>["required","email","unique:users,email"],
            "password"=>["required","confirmed",Password::min(8)->letters()->symbols()->numbers()],
        ];
    }

    public function messages()
    {
        return [
            "name"=> "El nombre es obligatorio",
            "email.required"=> "El correo es obligatorio",
            "email.email"=> "El correo es incorrecto",
            "email.unique"=> "El correo ya esta registrado",
            "password.confirmed"=> "Las contraseñas deben ser iguales",
            "password"=> "La contraseña debe contener al menos 8 caracteres, un simbolo y un numero",
        ];
    }
}
