<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'id_teacher' => ['required'],
            'first_name' => ['required', 'string', 'max:50'],
            'father_surname' => ['required', 'string', 'max:50'],
            'fathers_last_name' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email'],
            'curp' => ['required', 'string'],
            'rfc' => ['required', 'string', 'max:50'],
            'education_level' => ['required', 'string', 'max:50'],
            'major' => ['required', 'string', 'max:50'],
            'photo' => ['required', 'string', 'max:255'],
            'professional_license' => ['required', 'string', 'max:255'],
            'id_address' => ['required', 'string'],
        ];
    }
}
