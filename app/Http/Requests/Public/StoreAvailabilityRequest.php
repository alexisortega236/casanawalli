<?php

namespace App\Http\Requests\Public;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAvailabilityRequest extends FormRequest
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
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'room_id' => ['nullable', 'exists:rooms,id'],
            'name' => ['required', 'string', 'max:160'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['nullable', 'string', 'max:60'],
            'arrival_date' => ['required', 'date', 'after_or_equal:today'],
            'departure_date' => ['required', 'date', 'after:arrival_date'],
            'guests' => ['required', 'integer', 'min:1', 'max:4'],
            'message' => ['nullable', 'string', 'max:1200'],
        ];
    }

    public function attributes(): array
    {
        return [
            'arrival_date' => 'arrival date',
            'departure_date' => 'departure date',
        ];
    }
}
