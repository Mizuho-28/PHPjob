{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.app')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'Home')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ action('PostController@create') }}" method="post" enctype="multipart/form-data" class="card p-3 mb-3">

@if (count($errors) > 0)
    <ul>
        @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
        @endforeach
    </ul>
@endif
<div class="form-group row">
    <label class="col-md-2" for="title">ホーム</label>
    <div class="card-body">
    <div class="col-md-10">
      
        <input type="text" class="form-control" name="body" placeholder="いまどうしてる？" value="{{ old('body') }}">
    </div>
    </div>
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    {{ csrf_field() }}
    <div class="mt-3 text-right card-footer"><input type="submit" value="つぶやく" class="btn btn-success"></div>
</div>
</form>
@foreach($posts as $post)
  @foreach($users as $user)
  @if($post->user_id == $user->id)
  <div class="card p-2">
      <div>{{ $user->name }}</div>
      <div class="text-right">{{ $post->created_at }}</div>
      <div>{{ $post->body }}</div>
      @if($post->user_id == Auth::user()->id)
      <div class="text-right "><a class="text-danger" href="{{ action('PostController@delete',['post_id'=>$post->id]) }}" >削除</a></div>
      @endif
  </div>
  @endif
  @endforeach

  @endforeach
        </div>
    </div>
</div>
@endsection