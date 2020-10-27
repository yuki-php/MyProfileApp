@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <h1 class='pagetitle'>詳細ページ</h1>
  <div class="card">
    <div class="card-body d-flex">
      <section class='review-main'>
        <h2 class='h2'>タイトル</h2>
        <p class='h4 mb30'>{{ $profile->title }}</p>
        <h2 class='h2'>本文</h2>
        <p>{{ $profile->content }}</p>
      </section>  
      <aside class='review-image'>
        <div class=btn-wrapper>
          <a href="{{ route('edit', ['id' => $profile->id ]) }}" class='btn btn-success'>編集</a>
          <a href="{{ route('delete', ['id' => $profile->id ]) }}" class='btn btn-danger'>削除</a>
        </div>
@if(!empty($profile->image))
        <img class='book-image' src="{{ asset('storage/images/'.$profile->image) }}">
@else
        <img class='book-image' src="{{ asset('images/dummy.jpeg') }}">
@endif
      </aside>
    </div>
    <a href="{{ route('index') }}" class='btn btn-info btn-back mb20'>一覧へ戻る</a>
  </div>
</div>
@endsection