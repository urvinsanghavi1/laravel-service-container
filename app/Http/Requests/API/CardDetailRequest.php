<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CardDetailRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'card_number' => ['required'],
            'name_on_card' => ['required'],
            'expiry_date' => ['required'],
            'cvv' => ['required', 'min:3'],
            'bank_name' => ['required']
        ];
    }
}
