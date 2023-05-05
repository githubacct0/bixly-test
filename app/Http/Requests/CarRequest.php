<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CarRequest extends FormRequest
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
            'seats' => 'required|integer|min:1',
            'color' => 'required|string|min:3',
            'vin' => 'required|string',
            'current_mileage' => 'required|decimal:0,2',
            'service_interval' => 'required|string|min:4',
            'next_service' => 'required|string|min:4',
        ];
    }
}
