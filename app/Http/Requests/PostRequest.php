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
     //authorize:　認証のルール
    public function authorize()
    {
        return true; //trueで認証の仕組みは無し。
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     // バリデーションのルール
    public function rules()
    {
        return [
          'title' => 'required|min:3', // title必須で3文字以上必要
          'body' => 'required' // body必須
        ];
    }

    // messages(): バリデーションのエラーメッセージをカスタマイズ
    public function messages() {
      return [
        'title.require' => 'please enter title!!'
      ];
    }
}
