<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
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
            'id_address' => ['required'],
            'street' => ['required', 'string', 'max:50'],
            'num_ext' => ['required', 'string', 'max:10'],
            'num_int' => ['required', 'string', 'max:10'],
            'neighborhood' => ['required', 'string', 'max:50'],
            'city' => ['required', 'string', 'max:50'],
            'state' => ['required', 'string', 'max:50'],
            'country' => ['required', 'string', 'max:50'],
        ];
    }
}
