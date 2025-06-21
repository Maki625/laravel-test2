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
    public function index(Request $request)
{
    $query = Product::query();

    //検索キーワードで絞り込み
    if ($request->filled('keyword')) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
    }

    // 並び替え
    if ($request->sort === 'price_desc') {
        $query->orderBy('price', 'desc');
    } elseif ($request->sort === 'price_asc') {
        $query->orderBy('price', 'asc');
    }

    //ページネーション（6件ずつ）
    $products = $query->paginate(6)->appends($request->query());

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
        $seasons = Season::all();

        return view('products.create', compact('seasons'));
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

        $product = Product::create($input);

        // 季節を中間テーブルに保存
        if ($request->has('seasons')) {
            $product->seasons()->attach($request->seasons);
        }

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

        return redirect('/products');
    }

    // 商品検索処理
    public function search(Request $request)
    {
        $query = Product::query();

        //検索キーワード
        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        //並び替え
        if ($request->sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } elseif ($request->sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        }

        //ページネーション + クエリ維持
        $products = $query->paginate(6)->appends($request->query());

        return view('products.index', compact('products'));
    }

    public function destroy(Request $request)
    {
        $product = Product::find($request->productId);
        $product->delete();

        return redirect('/products');
    }
}
