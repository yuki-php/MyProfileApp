@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <h1 class='pagetitle'>削除ページ</h1>
  <div class="card">
    <div class="card-body d-flex">
      <section class='review-main'>
        <h2 class='h2'>タイトル</h2>
        <p class='h4 mb30'>{{ $items->title }}</p>
        <h2 class='h2'>本文</h2>
        <p>{{ $items->content }}</p>
      </section>  
      <aside class='review-image'>
        
@if(!empty($profile->image))
        <img class='book-image' src="{{ asset('storage/images/'.$profile->image) }}">
@else
        <img class='book-image' src="{{ asset('images/dummy.jpeg') }}">
@endif
      </aside>
    </div>
    <form method='POST' action="{{ route('remove') }}" enctype="multipart/form-data">
      @csrf
        <input type='hidden' name='id' value="{{$items->id}}">
        <input type="submit"  class='btn btn-danger btn-delete mb20' value="削除する">
    </form>
    <a href="{{ route('index') }}" class='btn btn-info btn-back mb20'>一覧へ戻る</a>
  </div>
</div>
@endsection