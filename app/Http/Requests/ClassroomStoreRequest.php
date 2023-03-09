<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomStoreRequest extends FormRequest
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
            'id_classroom' => ['required'],
            'classroom_name' => ['required', 'string', 'max:5'],
            'building' => ['required', 'string', 'max:5'],
        ];
    }
}
