<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'     => 'required|unique:food',
            'slug'     => 'required',
            'amount' => 'required|max:10',
            'unit' => 'required',
            'calory' => 'required|max:10',
            'protein' => 'required|max:10',
            'fat' => 'required|max:10',
            'carbohydrate' => 'required|max:10',
            'classification' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
    public function messages(): array
    {
        return [
            'name.unique' => 'Nama makanan sudah ada ',
            'amount.max' => 'Satuan Makanan harus dibawah 10 karakter',
            'calory.max' => 'Kalori harus dibawah 10 karakter',
            'protein.max' => 'Protein harus dibawah 10 karakter',
            'fat.max' => 'Lemak harus dibawah 10 karakter',
            'carbohydrate.max' => 'Karbohidrat harus dibawah 10 karakter',
            'image.image' => 'File yang diupload harus gambar',
        ];
    }
}
