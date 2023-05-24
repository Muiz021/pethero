<?php

namespace App\Http\Requests\front;

use Illuminate\Foundation\Http\FormRequest;

class KirimHewanRequest extends FormRequest
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
            'deskripsi_hewan' => 'required',
            'jenis_pengiriman' => 'required',
            'jenis_asuransi' => 'required',
            'jenis_kandang' => 'required',
            'lokasi' => 'required',
        ];
    }

    public function messages()
    {
       return [
        'deskripsi_hewan.required' => 'detail hewan tidak boleh kosong',
        'jenis_pengiriman.required' => 'jenis pengiriman tidak boleh kosong',
        'jenis_asuransi.required' => 'jenis asuransi tidak boleh kosong',
        'jenis_kandang.required' => 'jenis kandang tidak boleh kosong',
        'lokasi.required' => 'lokasi tidak boleh kosong',
       ];
    }
}
