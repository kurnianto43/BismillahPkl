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
            'instansi_id' => 'required',
            'perihal' => 'required|max:100',
            'tanggal_surat' => 'required',
            'tanggal_diterima' => 'required',
            'lampiran' => 'required|max:2500'
        ];
    }

}
