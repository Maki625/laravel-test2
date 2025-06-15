<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // 商品一覧表示
    public function index()
    {
        $products = Product::paginate(6);
        return view('products.index', compact('products'));
    }

    // 商品詳細表示
    public function show($productId)
    {
        $product = Product::find($productId);
        $seasons = Season::all();

        return view('products.show', compact('product', 'seasons'));
    }

    // 商品登録画面の表示
    public function create()
    {
        return view('products.create');
    }

    // 商品登録
    public function store(StoreProductRequest $request)
    {
        $input= [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ];

        // 画像保存
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $input['image'] = str_replace('public/', 'storage/', $path);
        }

        Product::create($input);

        return redirect('/products');
    }

    // 商品更新
    public function update(UpdateProductRequest $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $validated = $request->validated();

        // 画像保存
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $validated['image'] = str_replace('public/', 'storage/', $path);
        }

        $product->update($validated);

        $product->seasons()->sync($request->input('seasons', []));

        return redirect()->route('products.show', $product->id);
    }

    // 商品検索処理
    public function search(Request $request)
    {
    $keyword = $request->input('keyword');
    $products = Product::where('name', 'like', "%{$keyword}%")->paginate(6);

    return view('products.index', compact('products'));
    }

    // 商品削除処理
    public function destroy($productId)
    {
    $product = Product::findOrFail($productId);
    $product->delete();

    return redirect('/products');
    }
}
