@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection

@section('content')
@if (count($errors) > 0)
<p>入力に問題があります</p>
@endif
<div class=" fruit__content--detail">
    <form class="detail" action="/products" method="post" enctype="multipart/form-data">
        @csrf
        <div class="detail__group">
            <div class="detail__group--label">
                <span class="detail__label--item">商品名</span>
            </div>
            <div class="detail__group--content">
                <div class="detail__input--text">
                    <input type="text" name="name" value="{{ $product->name }}" />
                    <input type="hidden" name="id" value="{{ $product['id'] }}">
                </div>
                <div class="detail__error">
                    @error('name')
                    {{ $errors->first('name') }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="detail__group">
            <div class="detail__group--label">
                <span class="detail__label--item">値段</span>
            </div>
            <div class="detail__group--content">
                <div class="detail__input--text">
                    <input type="text" name="price" value="{{ $product->price }}" />
                    <input type="hidden" name="id" value="{{ $product['id'] }}">
                </div>
                <div class="detail__error">
                    @error('price')
                    {{ $errors->first('price') }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="detail__group">
            <div class="detail__group--label">
                <span class="detail__label--item">季節</span>
            </div>
            <div class="detail__group--content">
                <div class="detail__checkbox--season">
                    <label>春<input type="checkbox" class="season" name="season" value="{{ $product->season }}" /></label>
                    <label>夏<input type="checkbox" class="season" name="season" value="{{ $product->season }}" /></label>
                    <label>秋<input type="checkbox" class="season" name="season" value="{{ $product->season }}" /></label>
                    <label>冬<input type="checkbox" class="season" name="season" value="{{ $product->season }}" /></label>
                </div>
                <div class="detail__error">
                    @error('season')
                    {{ $errors->first('season') }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="detail__float--content">
            <div class="detail__float--image">
                <img src="{{ \Storage::url($product->image) }}" alt="画像" width="50%">
            </div>
            <div class="detail__error">
                @error('image')
                {{ $errors->first('image') }}
                @enderror
            </div>
        </div>
        <div class="detail__group">
            <div class="detail__group--label-description">
                <span class="detail__label--item">商品説明</span>
            </div>
            <div class="detail__group--content">
                <div class="detail__input--textarea">
                    <textarea>{{ $product -> description }}</textarea>
                </div>
                <div class="detail__error">
                    @error('description')
                    {{ $errors->first('description') }}
                    @enderror
                </div>
            </div>
        </div>
    </form>
    <div class="detail__button">
        <a href="/products">
            <button class="detail__button-return" type="button">戻る</button>
            <form class="update-form__button" action="/products/{productId}/update" method="post">
                @method('PATCH')
                @csrf
                <input type="hidden" name="id" value="{{ $product['id'] }}">
                <button class="detail__button-submit" type="button">変更を保存</button>
            </form>
            <form action="/delete?id={{ $product->id }}" method="post" onSubmit="return emptyTrash()">
                @method('DELETE')
                @csrf
                <div class="delete-form__button">
                    <input type="hidden" name="id" value="{{ $product['id'] }}">
                    <button class="delete-form__button-submit" type="button">削除</button>
                </div>
            </form>
        </a>
    </div>
</div>
@endsection