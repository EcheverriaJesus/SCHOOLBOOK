<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
            'id_student' => ['required'],
            'student_name' => ['required', 'string', 'max:50'],
            'paternal_surname' => ['required', 'string', 'max:50'],
            'maternal_surname' => ['required', 'string', 'max:50'],
            'grade' => ['required', 'integer'],
            'birth_date' => ['required', 'date'],
            'curp' => ['required', 'string', 'max:18'],
            'gender' => ['required', 'string', 'max:10'],
            'email' => ['required', 'email', 'max:50'],
            'phone' => ['required', 'string'],
            'status' => ['required'],
            'study_plan' => ['required', 'string', 'max:100'],
            'photo' => ['required', 'string', 'max:255'],
            'id_address' => ['required', 'string'],
            'id_tutor' => ['required', 'string'],
            'id_document' => ['required', 'string'],
            'id_history' => ['required', 'string'],
        ];
    }
}
