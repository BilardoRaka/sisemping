<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'required|max:50',
            'phone' => 'required|max:20',
            'logo' => 'image|file|max:1024',
            'city_id' => 'required',
            'description' => 'required',
            'address' => 'required',
            'email' => 'required|max:50|email',
            'password' => 'required|max:15',

        ];
    }
}
