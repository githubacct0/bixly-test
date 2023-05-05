<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'make' => 'required|string|min:3|max:50',
            'model' => 'required|string|min:5|max:50',
            'year' => 'required|integer',
            'length' => 'required|decimal:0,2',
            'width' => 'required|decimal:0,2',
            'hin' => 'required|string',
            'current_hours' => 'required|decimal:0,2',
            'service_interval' => 'required|string|min:4',
            'next_service' => 'required|string|min:4',
        ];
    }
}
