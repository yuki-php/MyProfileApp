@extends('layouts.app')

@section('content')
  <h1 class='pagetitle'>記事投稿ページ</h1>
  @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
  @endif
    
  <div class="row justify-content-center container">
      <div class="col-md-10">
      <form method='POST' action="{{ route('store') }}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label>タイトル</label>
                  <input type='text' class='form-control' name='title' placeholder='タイトルを入力'>
                </div>
                <div class="form-group">
                <label>内容</label>
                  <textarea class='description form-control' name='content' placeholder='本文を入力'></textarea>
                </div>
                <div class="form-group">
                  <label for="file1">画像のアップロード</label>
                  <input type="file" id="file1" name='image' class='form-control-file'>
                </div>
                <input type='submit' class='btn btn-primary' value='記事を登録'>
              </div>
          </div>
        </form>
      </div>
  </div>
@endsection