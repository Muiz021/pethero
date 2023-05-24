<?php

namespace App\Http\Requests\front;

use Illuminate\Foundation\Http\FormRequest;

class LokasiRequest extends FormRequest
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
            'label_alamat' => 'required',
            'alamat' => 'required',
            'nama_penerimaan' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'label_alamat.required' => 'label alamat tidak boleh kosong',
            'alamat.required' => 'alamat tidak boleh kosong',
            'nama_penerimaan.required' => 'nama penerima tidak boleh kosong',
        ];
    }
}
