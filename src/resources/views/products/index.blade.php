@extends('layouts.app')

@section('content')

<link href="{{ asset('css/index.css') }}" rel="stylesheet">

<h2 class="page-title">商品一覧</h2>

<form method="GET" action="{{ route('products.create') }}" >
<button type="submit" name="create" class="create-btn" value="create">+ 商品を追加</button></form>

<div class="container">
    <form action="{{ route('products.search') }}"  method="GET" class="search-form">
        <input type="text" name="keyword" placeholder="商品名で検索" value="{{ request('keyword') }}">
        <button type="submit" name="search" class="search-btn" value="search">検索</button>
    </form>

    <label class="search-form__label" for="">価格順で表示</label>

    <div class="wrapper">
@foreach ($products as $product)
    <a href="{{ route('products.show', $product->id) }}" class="card-link">
    <div class="card">
        <div class="fruit-img">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
        </div>
        <div class="text-box">
            <span class="name">{{ $product->name }}</span>
            <span class="price">¥{{ $product->price }}</span>
        </div>
    </div>
    </a>
@endforeach
</div>
</div>

    <div class="pagination-wrapper">
        {{ $products->appends(request()->query())->links() }}
    </div>

@endsection