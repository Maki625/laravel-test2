@extends('layouts.app')

@section('content')

<link href="{{ asset('css/index.css') }}" rel="stylesheet">

<div class="title-and-button">
    <h2 class="page-title">商品一覧</h2>

    <form method="GET" action="{{ route('products.create') }}" >
    <button type="submit" name="create" class="create-btn" value="create">+ 商品を追加</button>
    </form>
</div>

<main style="display:flex;">
<div class="container">
    <form action="{{ route('products.search') }}"  method="GET" class="search-form">
        <input type="text" name="keyword" placeholder="商品名で検索" value="{{ request('keyword') }}">
        <button type="submit" name="search" class="search-btn" value="search">検索</button>

    <label class="search-form__label" for="">価格順で表示</label>
    <!-- 並び替え -->
    <select name="sort" onchange="this.form.submit()">
        <option value="">価格で並べ替え</option>
        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>高い順に表示</option>
        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>低い順に表示</option>
    </select>
    </form>

    <!-- タグ表示 -->
@if(request('keyword') || request('sort'))
    <div class="filter-tags" style="margin-top: 10px;">
        @if(request('keyword'))
            <span class="tag">検索: {{ request('keyword') }}</span>
        @endif

        @if(request('sort'))
            <span class="tag">
                並び替え: {{ request('sort') == 'price_desc' ? '高い順に表示' : '低い順に表示' }}
                <!-- ×ボタン：並び替えだけをリセット -->
                <a href="{{ url('/products') . '?' . http_build_query(array_filter(request()->except('sort'))) }}" class="close-btn">×</a>
                </span>
        @endif
    </div>
@endif
</div>


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
</main>

    <div class="pagination-wrapper">
        {{ $products->appends(request()->query())->links() }}
    </div>

@endsection