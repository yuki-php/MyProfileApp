@extends('layouts.app')

@section('css')
  <link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="search-box">
        <form method='POST' action="{{ route('search') }}">
            @csrf
            <input type='text' name='input'>
            <input type='submit' value='検索'>
        </form>
    </div>
        @foreach($profiles as $profile)
            <div class="col-md-4">
                <div class="card mb50">
                    <div class="card-body">
                    @if(!empty($profile->image))
                        <div class='image-wrapper'><img class='profile-image' src="{{ asset('storage/images/'.$profile->image) }}"></div>
                    @else
                        <div class='image-wrapper'><img class='profile-image' src="{{ asset('images/dummy.jpeg') }}"></div>
                    @endif
                        <h3 class='h3 profile-title'>{{ $profile->title }}</h3>
                        <p class='description'>
                        {{ $profile->content }}
                        </p>
                        <a href="{{ route('show', ['id' => $profile->id ]) }}" class='btn btn-secondary detail-btn'>詳細を読む</a>
                    </div>
                </div>
            </div>    
        @endforeach
</div>

{{ $profiles->links() }}
@endsection