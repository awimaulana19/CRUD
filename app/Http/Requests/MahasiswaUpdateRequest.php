<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $mahasiswaId = $this->route('id');
        
        return [
            'namaUpdate' => 'string|max:50',
            'nimUpdate' => 'string|max:20|unique:mahasiswas,nim,'.$mahasiswaId,
            'kelasUpdate' => 'string|max:2',
            'alamatUpdate' => 'string|max:50',
            'semesterUpdate' => 'integer|max:14',
        ];
    }

    public function messages()
    {
        return[
            'namaUpdate.string' => 'Nama harus bertipe string',
            'namaUpdate.max' => 'Nama maximal 50 karakter',
            'nimUpdate.string' => 'Nim harus bertipe string',
            'nimUpdate.max' => 'Nim maximal 20 karakter',
            'nimUpdate.unique' => 'Sudah ada NIM yang sama',
            'kelasUpdate.string' => 'Kelas harus bertipe string',
            'kelasUpdate.max' => 'Kelas maximal 2 karakter',
            'alamatUpdate.string' => 'Alamat harus bertipe string',
            'alamatUpdate.max' => 'Alamat maximal 50 karakter',
            'semesterUpdate.integer' => 'Semester harus bertipe integer',
            'semesterUpdate.max' => 'Semester maximal 14 angka',
        ];
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Data inputan salah, Periksa inputan anda');
        }
    }
}
