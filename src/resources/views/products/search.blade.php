@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/search.css') }}" />
@endsection

@section('content')
<div class="fruit-content">
    <div class="fruit-content__heading">
        <h2>商品一覧</h2>
    </div>
    <aside class="aside">
        <form action="" method="post">
            @csrf
            <div class="search-form">
                <input type="text" name="input" placeholder="商品名で検索" />
            </div>
            <div class="search-button">
                <button class="search__button-submit" type="submit">検索</button>
            </div>
            <div class="display">
                <p class="display">価格順で表示</p>
                <select class="type__of--content" name="content" value="">
                    <option name="価格で並べ替え" value="">価格で並べ替え</option>
                    <option name="高い順に表示" value="">高い順に表示</option>
                    <option name="低い順に表示" value="">低い順に表示</option>
                </select>
            </div>
        </form>
    </aside>
    @if (@isset($products))
    <main class="main">
        @foreach ($products as $product)
        <div>
            @if ($product->image !=='')
            <a href="{{ url('products/{productId}') }}">
                <img src="{{ \Storage::url($product->image) }}" alt="画像" width="50%">
            </a>
            @else
            <img src="{{ \Storage::url('product/no_image.png') }}" alt="">
            @endif
        </div>
        <p>{{ $product -> name }} ¥{{ $product -> price }}</p>
        @endforeach
    </main>
    @endif
</div>
@endsection