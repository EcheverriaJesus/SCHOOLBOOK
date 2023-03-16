<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentStoreRequest extends FormRequest
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
            'id_document' => ['required'],
            'document_name' => ['required', 'string', 'max:50'],
            'status' => ['required'],
            'file' => ['required', 'string', 'max:5'],
            'id_student' => ['required', 'string'],
        ];
    }
}
