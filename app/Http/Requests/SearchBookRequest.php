<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchBookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'keyword' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'keyword.required' => 'キーワードを入力してください。',
        ];
    }
}