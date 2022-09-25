<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViolationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'nullable',
            'datetime' => 'nullable',
            'author_id' => 'nullable',
            'description' => 'nullable',

            'id_id' => 'nullable',
            'td_id' => 'nullable',
            'tb_id' => 'nullable',
        ];
    }
}
