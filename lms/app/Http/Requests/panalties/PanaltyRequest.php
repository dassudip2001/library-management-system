<?php

namespace App\Http\Requests\panalties;

use Illuminate\Foundation\Http\FormRequest;

class PanaltyRequest extends FormRequest
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
            'penaltyResign'     =>   'required|string|min:8',
            'price'             =>   'required|dimensions',
            'status'            =>   'required|string',
            'studentId'         =>   'string',
            'user_id'           =>   'string'
        ];
    }
}
