<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassStoreRequest extends FormRequest
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
            'id_class' => ['required'],
            'id_subject' => ['required', 'string'],
            'id_classroom' => ['required', 'string'],
            'id_history' => ['required', 'string'],
            'id_cycle' => ['required', 'string'],
        ];
    }
}
