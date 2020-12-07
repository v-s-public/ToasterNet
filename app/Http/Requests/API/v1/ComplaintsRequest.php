<?php

namespace App\Http\Requests\API\v1;

use App\Rules\API\v1\ClientExistsRule;
use Illuminate\Foundation\Http\FormRequest;

class ComplaintsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'max:150'
            ],
            'text' => [
                'required',
                'max:3000'
            ],
            'client_id' => [
                'required',
                new ClientExistsRule,
            ]
        ];
    }
}
