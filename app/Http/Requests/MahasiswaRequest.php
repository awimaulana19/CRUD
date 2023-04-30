<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaRequest extends FormRequest
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
        return [
            'nama' => 'string|max:50',
            'nim' => 'string|max:20|unique:mahasiswas',
            'kelas' => 'string|max:2',
            'alamat' => 'string|max:50',
            'semester' => 'integer|max:14',
        ];
    }

    public function messages()
    {
        return[
            'nama.string' => 'Nama harus bertipe string',
            'nama.max' => 'Nama maximal 50 karakter',
            'nim.string' => 'Nim harus bertipe string',
            'nim.max' => 'Nim maximal 20 karakter',
            'nim.unique' => 'Sudah ada NIM yang sama',
            'kelas.string' => 'Kelas harus bertipe string',
            'kelas.max' => 'Kelas maximal 2 karakter',
            'alamat.string' => 'Alamat harus bertipe string',
            'alamat.max' => 'Alamat maximal 50 karakter',
            'semester.integer' => 'Semester harus bertipe integer',
            'semester.max' => 'Semester maximal 14 angka',
        ];
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Data inputan salah, Periksa inputan anda');
        }
    }
}
