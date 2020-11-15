@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <h1 class='pagetitle'>お問い合わせ確認ページ</h1>
    <div class="card">
      <div class="card-body d-flex">
        <section class='review-main'>
          <p class="ontact-topic">※お名前</p>
          <p>{{ $items['name'] }}</p>
          <p class="ontact-topic">※メールアドレス</p>
          <p>{{ $items['email'] }}</p>
          <p class="ontact-topic">※お問い合わせ内容</p>
          <p>{{ $items['content'] }}</p>
        </section>  
      </div>
      <div class="button-contact">
      <form action="{{ route('send') }}" method="post">
      @csrf
        <input type="hidden" name="名前"  value="{{ $items['name'] }}">
        <input type="hidden" name="email" value="{{ $items['email'] }}">
        <input type="hidden" name="content"  value="{{ $items['content'] }}">
        <button type="button" class="btn btn-warning" onclick="history.back()">戻る</button>
        <button type="submit" class="btn btn-success">メールを送信する</button>
      </form>
      </div>
      <a href="{{ route('index') }}" class='btn btn-info btn-back mb20'>TOPへ戻る</a>
    </div>
</div>
@endsection