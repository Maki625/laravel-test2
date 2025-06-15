@extends('layouts.app')

@section('content')

<link href="{{ asset('css/show.css') }}" rel="stylesheet">

<div class="container">

@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif

<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" >
  @csrf

<!-- 商品名 -->
<div class="form-group">
                <label>商品名 </label>
                <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name', $product->name) }}">
            <p class="error-message">
          @error('name')
          {{ $message }}
          @enderror
        </p>
</div>

<!-- 値段 -->
<div class="form-group">
                <label>値段</label>
                <input type="text" name="price" placeholder="値段を入力" value="{{ old('price', $product->price) }}">
            <div><p class="error-message">
          @error('price')
          {{ $message }}
          @enderror
        </p></div>
</div>

<!-- 商品画像 -->
<div class="form-group">
  <label>商品画像</label>

  <!-- 登録済みの画像を表示 -->
  @if ($product->image)
    <img src="{{ asset($product->image) }}" alt="商品画像">
  @else
    <p>画像は登録されていません</p>
  @endif
  <!-- 画像アップロード用 -->
  <input type="file" name="image" onchange="previewImage(event)">
</div>

<!-- 季節 -->
  <div class="form-group">
  @foreach ($seasons as $season)
    <label class="checkbox">
        <input type="checkbox" name="seasons[]" value="{{ $season->id }}"
            {{ $product->seasons->contains($season->id) ? 'checked' : '' }}>
        {{ $season->name }}
    </label>
@endforeach
        </div>
        <p class="error-message">
          @error('season')
          {{ $message }}
          @enderror
        </p>
</div>

  <!-- 商品説明 -->
    <div class="form-group">
    <label>商品説明</label>
    <textarea name="description" placeholder="商品の説明を入力">{{ old('description', $product->description) }}</textarea>
    <p class="error-message">
          @error('description')
          {{ $message }}
          @enderror
    </p>
</div>

    <!-- ボタン -->
  <div class="button-container">
  <div class="button-wrapper">
    <a href="/products" class="return-btn">戻る</a>

    <button type="submit" name="store" class="store-btn" value="store">変更を保存
    </button>
  </div>
</form>

    <form method="POST" action="/products/{{ $product->id }}/delete" >
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" value="{{ $product->id }}">
    <input class="delete-btn" type="submit" value="削除UI">
    </form>
</div>

<!-- プレビュー用のスクリプト -->
<script>
  const input = document.querySelector('input[type="file"]');
  const preview = document.getElementById('imagePreview');

  input.addEventListener('change', () => {
    const file = input.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = () => {
        preview.src = reader.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    } else {
      preview.src = '';
      preview.style.display = 'none';
    }
  });
</script>

@endsection