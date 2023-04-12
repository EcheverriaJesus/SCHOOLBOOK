<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaseStoreRequest extends FormRequest
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
            'subject_id' => ['required', 'string'],
            'classroom_id' => ['required', 'string'],
            'history_id' => ['required', 'string'],
            'cycle_id' => ['required', 'string'],
        ];
    }
}
