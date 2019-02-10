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

    public function messages()
    {
        return [
            'nomor_surat.required' => 'Nomor surat diperlukan',
            'nomor_surat.unique' => 'Nomor surat telah terdata',
            'nomor_surat.xax' => 'Nomor surat maksismal 50 karakter',
            'instansi_id.required'  => 'Instansi diperlukan',
            'perihal.required' => 'Perihal diperlukan',
            'perihal.max' => 'Perihal maksimal 100 karakter',
            'tanggal_surat.required' => 'Tanggal surat diperlukan',
            'tanggal_diterima.required' => 'Tanggal diterima diperlukan',
            'lampiran.required' => 'Lampiran diperlukan',
            'lampiran.max' => 'Ukuran maksimal 2Mb',

        ];
    }

}
