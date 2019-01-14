<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratmasukStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
   public function rules()
    {
        return [
            'nomor_surat' => 'bail|required|unique:surat_masuks|max:50',
           'unit_kerja' => 'required|max:50',
           'perihal' => 'required|max:100',
           'tanggal_surat' => 'required',
           'tanggal_diterima' => 'required',
           'lampiran' => 'required|max:2500'
        ];
    }


    public function messages()
    {
        return [
            'nomor_surat.required' => 'Nomor surat harus diisi!',
            'nomor_surat.unique' => 'Nomor surat sudah terdaftar',
            'nomor_surat.max' => 'Tidak boleh lebih dari 50 karakter',
            'unit_kerja.required' => 'Unit kerja harus diisi!',
            'perihal.required' => 'Perihal harus diisi!',
            'tanggal_surat.required' => 'Tanggal surat harus diisi!',
            'tanggal_diterima.required' => 'Tanggal diterima harus diisi!',
            'lampiran.required' => 'Lampiran harus diisi!',
            'lampiran.max' => 'Tidak boleh lebih dari 2Mb'
        ];
    }
}
