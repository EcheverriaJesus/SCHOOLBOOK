<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleStoreRequest extends FormRequest
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
            'id_schedule' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'day' => ['required', 'date'],
            'id_class' => ['required', 'string'],
        ];
    }
}
