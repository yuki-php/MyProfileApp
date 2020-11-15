@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <h1 class='pagetitle'>送信完了ページ</h1>
    <div class="card">
      <div class="card-body d-flex">
        <section class='review-main'>
         <h2>送信が完了しました！</h2>
        </section>  
      </div>
      <a href="{{ route('index') }}" class='btn btn-info btn-back mb20'>TOPへ戻る</a>
    </div>
</div>
@endsection