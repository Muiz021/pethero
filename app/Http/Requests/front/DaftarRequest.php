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
            "password" => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'nomor_ponsel' => 'required|numeric|digits_between:10,12'
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
            'password.regex' => 'password harus terdiri dari setidaknya satu huruf kecil, satu huruf besar, dan satu angka',
            'nomor_ponsel.required' => 'nomor ponsel tidak boleh kosong',
            'nomor_ponsel.numeric' => 'nomor ponsel harus angka',
            'nomor_ponsel.digits_between' => 'nomor ponsel tidak boleh kurang dari 10 atau lebih dari 12',
        ];
    }
}
