<?php

namespace App\Http\Requests\front;

use Illuminate\Foundation\Http\FormRequest;

class DaftarRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required',
            "email" => 'required|email',
            "password" => 'required|min:8',
            'nomor_ponsel' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'nama.required' => 'nama tidak boleh kosong',
            'email.email' => 'harus menggunakan email',
            'email.required' => 'email tidak boleh kosong',
            'password.required' => 'password tidak boleh kosong',
            'password.min' => 'password minimal 8 karakter',
            'nomor_ponsel.required' => 'nomor ponsel tidak boleh kosong',
        ];
    }
}
