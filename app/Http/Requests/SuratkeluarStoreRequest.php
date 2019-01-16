<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratkeluarStoreRequest extends FormRequest
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
            'nomor_surat' => 'bail|required|unique:surat_keluar|max:50',
            'instansi' => 'required|max:50',
            'perihal' => 'required|max:100',
            'instansi_tujuan' => 'required|max:50',
            'tanggal_surat' => 'required',
            'lampiran' => 'required|max:2500'
        ];
    }

}
