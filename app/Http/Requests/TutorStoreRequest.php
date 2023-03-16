<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TutorStoreRequest extends FormRequest
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
            'id_tutor' => ['required'],
            'tutor_name' => ['required', 'string', 'max:50'],
            'paternal_surname' => ['required', 'string', 'max:50'],
            'maternal_surname' => ['required', 'string', 'max:50'],
            'gender' => ['required', 'string', 'max:10'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'id_address' => ['required', 'string'],
        ];
    }
}
