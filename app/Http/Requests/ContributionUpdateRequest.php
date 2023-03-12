<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContributionUpdateRequest extends FormRequest
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
            'id_contribution' => ['required'],
            'amount' => ['required', 'integer'],
            'status' => ['required'],
            'description' => ['required', 'string', 'max:100'],
            'contribution_date' => ['required', 'date'],
            'deadline_date' => ['required', 'date'],
            'id_student' => ['required', 'string'],
        ];
    }
}
