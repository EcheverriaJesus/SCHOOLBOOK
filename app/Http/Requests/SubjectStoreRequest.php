<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectStoreRequest extends FormRequest
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
            'id_subject' => ['required'],
            'subject_name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:50'],
            'grade' => ['required', 'integer'],
            'id_qualification' => ['required', 'string'],
        ];
    }
}
