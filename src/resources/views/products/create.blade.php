@extends('layouts.app')

@section('content')

<link href="{{ asset('css/create.css') }}" rel="stylesheet">

    <div class="container">
        <h2 class="page-title">商品登録</h2>

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
                <label>商品名 <span class="required">必須</span></label>
                <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}">
            <p class="error-message">
          @error('name')
          {{ $message }}
          @enderror
        </p>
</div>

<!-- 値段 -->
<div class="form-group">
                <label>値段 
                <span class="required">必須</span></label>
                <input type="text" name="price" placeholder="値段を入力" value="{{ old('price') }}">
            <div><p class="error-message">
          @error('price')
          {{ $message }}
          @enderror
        </p></div>
</div>

<!-- 商品画像 -->
<div class="form-group">
  <label>商品画像
  <span class="required">必須</span></label>
  <img id="imagePreview" alt="画像プレビュー" class="preview-img">

  <input type="file" name="image">


<!-- 季節 -->
  <div class="form-group">
  <label>季節 <span class="required">必須</span> <span class="required-message">複数選択可</span></label>
    <div class="season-inputs">
        @foreach ($seasons as $season)
            <label>
                <input type="checkbox" name="seasons[]" value="{{ $season->id }}" 
                    {{ (is_array(old('seasons')) && in_array($season->id, old('seasons'))) ? 'checked' : '' }}>
                {{ $season->name }}
            </label>
        @endforeach
    </div>
  </div>
        <p class="error-message">
          @error('seasons')
          {{ $message }}
          @enderror
        </p>
</div>

  <!-- 商品説明 -->
    <div class="form-group">
    <label>商品説明 <span class="required">必須</span></label>
    <textarea name="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
    <p class="error-message">
          @error('description')
          {{ $message }}
          @enderror
    </p>
</div>

    <!-- 商品登録ボタン -->
    <div class="button-wrapper">
    <button type="submit" name="return" class="return-btn" value="back">戻る</button>

    <button type="submit" name="send" class="send-btn" value="create">登録
    </button>
    </div>

</form>

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