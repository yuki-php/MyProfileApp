@extends('layouts.app')

@section('content')
  <h1 class='pagetitle'>お問い合わせフォーム</h1>
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
      <form method='POST' action="{{ route('ses_put') }}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label>お名前</label>
                  <input type='text' class='form-control' name='name' placeholder='名前を入力' value="{{ old('name') }}">
                </div>
                <div class="form-group">
                <label>メールアドレス</label>
                 <input type='email' class='form-control' name='email' placeholder='メールアドレスを入力' value="{{ old('email') }}">
                </div>
                <div class="form-group">
                <label>お問い合わせ内容</label>
                  <textarea class='description form-control' name='content' placeholder='お問い合わせ内容を入力'>{{ old('content') }}</textarea>
                </div>
                <input type='submit' class='btn btn-primary' value='確認画面へ'> 
              </div>
          </div>
        </form>
      </div>
  </div>
@endsection