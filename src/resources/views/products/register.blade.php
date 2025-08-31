@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
@if(count($errors) > 0)
<p>入力に問題があります</p>
@endif
<div class="fruit-content">
    <div class="fruit-content__heading">
        <h2>商品登録</h2>
    </div>
    <form class="register" action="/products" method="post" enctype="multipart/form-data">
        @csrf
        <div class="register__group">
            <div class="register__group-title">
                <span class="register__label--item">商品名</span>
                <span class="register__label--required">必須</span>
            </div>
            <div class="register__group--content">
                <div class="register__input--text">
                    <input type="text" name="name" placeholder="商品名を入力" />
                </div>
                <div class="register__error">
                    @error('name')
                    {{ $errors->first('name') }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="register__group">
            <div class="register__group-title">
                <span class="register__label--item">値段</span>
                <span class="register__label--required">必須
                </span>
            </div>
            <div class="register__group--content">
                <div class="register__input--text">
                    <input type="text" name="price" placeholder="値段を入力" />
                </div>
                <div class="register__error">
                    @error('price')
                    {{ $errors->first('price') }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="register__group">
            <div class="register__group-title">
                <span class="register__label--item">商品画像</span>
                <span class="register__label--required">必須</span>
            </div>
            <div class="register__group--content">
                <div class="register__input--image">
                    <input type="file" name="image">
                </div>
                <div class="register__error">
                    @error('image')
                    {{ $errors->first('image') }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="register__group">
            <div class="register__group-title">
                <span class="register__label--item">季節</span>
                <span class="register__label--required">必須</span>
                <span class="register__label--rule">複数選択可</span>
            </div>
            <div class="register__group--content">
                <div class="register__checkbox--season">
                    <label>春<input type="checkbox" class="season" name="season" value="春" /></label>
                    <label>夏<input type="checkbox" class="season" name="season" value="夏" /></label>
                    <label>秋<input type="checkbox" class="season" name="season" value="秋" /></label>
                    <label>冬<input type="checkbox" class="season" name="season" value="冬" /></label>
                </div>
                <div class="register__error">
                    @error('season')
                    {{ $errors->first('season') }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="register__group">
            <div class="register__group-title">
                <span class="register__label--item">商品説明</span>
                <span class="register__label--required">必須</span>
            </div>
            <div class="register__group--content">
                <div class="register__input--textarea">
                    <textarea name="description" placeholder="商品の説明を入力" /></textarea>
                </div>
                <div class="register__error">
                    @error('description')
                    {{ $errors->first('description') }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="register__button">
            <a href="/products">
                <button class="register__button-return" type="button">戻る</button>
                <button class="register__button-submit" type="submit">登録</button>
            </a>
        </div>
    </form>
</div>
@endsection