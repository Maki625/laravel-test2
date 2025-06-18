<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;

class UpdateProductRequest extends FormRequest
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
        $productId = $this->route('productId');
        $product = Product::find($productId);

        return [
            'name'        => 'required',
            'price'       => 'required|integer|min:0|max:10000',
            'seasons'      => 'required|array|min:1',
            'seasons.*'   => 'integer|exists:seasons,id',
            'description' => 'required|string|max:120',
            'image'       => $product && $product->image
                            ? 'nullable|mimes:jpeg,png'
                            : 'required|mimes:jpeg,png',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => '商品名を入力してください',
            'price.required'       => '値段を入力してください',
            'price.numeric'        => '数値で入力してください',
            'price.max'            => '0~10000円以内で入力してください',
            'seasons.required'      => '季節を選択してください',
            'description.required' => '商品説明を入力してください',
            'description.max'      => '120文字以内で入力してください',
            'image.required'       => '商品画像を登録してください',
            'image.mimes'          => '「.png」または「.jpeg」形式でアップロードしてください',
        ];
    }
}
