<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTag extends FormRequest
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
            'name' => 'bail|required|max:16|unique:tags',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'タグの名前を入力してください。',
            'name.max'      => '16文字以内で入力してください。',
            'name.unique'   => 'このタグはすでに存在します。',
        ];
    }
}
