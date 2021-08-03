<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntranceRequest extends FormRequest
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
            'house_id' => 'required|integer|exists:houses,id',
            'name' => 'required|string|max:155',
            'number' => 'required|integer',
        ];
    }
}
