<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // 商品一覧表示
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // 商品詳細表示
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    // // 商品登録画面の表示
    // public function create()
    // {
    //     return view('products.create');
    // }

    // // 商品登録
    // public function store(StoreProductRequest $request)
    // {
    // $validated = $request->validated();

    // // 画像保存
    // $path = $request->file('image')->store('public/images');
    // $validated['image'] = str_replace('public/', 'storage/', $path);
    // }

    // Product::create($validated);
    // return redirect()->route('products.index');
    // }

    // // 商品更新
    // public function update(UpdateProductRequest $request, $id)
    // {
    // $product = Product::findOrFail($id);
    // $validated = $request->validated();

    // // 画像保存
    // $path = $request->file('image')->store('public/images');
    // $validated['image'] = str_replace('public/', 'storage/', $path);

    // }

    // $product->update($validated);
    // return redirect()->route('products.show', $product->id);
    // }

    // // 商品検索処理
    // public function search(Request $request)
    // {
    // $keyword = $request->input('keyword');
    // $products = Product::where('name', 'like', "%{$keyword}%")->get();

    // return view('products.index', compact('products'));
    //     }

    // // 商品削除処理
    // public function destroy($id)
    // {
    // $product = Product::find($id);
    // $product->delete();

    // return redirect()->route('products.index');
    // }
}
