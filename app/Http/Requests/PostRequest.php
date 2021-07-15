<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required',
            'short_content' => 'required',
            'content' => 'required',
            'category_id' => 'integer | required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field :attribute required to enter',
            'integer' => 'Field :attribute should be : integer'
        ];
    }
}
