<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateExerciseRequest extends FormRequest
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
            'name'     => ['required', Rule::unique('exercises')->ignore($this->exercise)],
            'muscle_group'     => 'required',
            'video_exercise'     => 'max:100'
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'Nama Gerakan latihan sudah ada',
            'name.required' => 'Nama Gerakan latihan harus diisi',
            'video_exercise.max' => 'Maksimal 100 karakter'
        ];
    }
}
