<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'        => 'required|string',
            'price'       => 'required|integer|min:0|max:10000',
            'season'      => 'required|string',
            'description' => 'required|string|max:120',
            'image'       => 'required|mimes:jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            // 商品名
            'name.required'        => '商品名を入力してください',

            // 値段
            'price.required'       => '値段を入力してください',
            'price.integer'        => '数値で入力してください',
            'price.max'            => '0~10000円以内で入力してください',

            // 季節
            'season.required'      => '季節を選択してください',

            // 商品説明
            'description.required' => '商品説明を入力してください',
            'description.max'      => '120文字以内で入力してください',

            // 商品画像
            'image.required'       => '商品画像を登録してください',
            'image.mimes'          => '「.png」または「.jpeg」形式でアップロードしてください',
        ];
    }
}
