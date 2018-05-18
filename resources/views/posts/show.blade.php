<!--継承先宣言-->
@extends('layouts.default')

<!--titleを継承できる様に宣言-->
@section('title', $post->title)

@section('content')
<h1>
  <a href="{{ url('/') }}" class="header-menu">Back</a>
  {{ $post->title }}
</h1>
<p>{!! nl2br(e($post->body)) !!}</p>

<h2>Comments</h2>
<ul>
  <!-- もし$postsが空だった場合の処理 -->
  @forelse ($post->comments as $comment)
  <!--Postsコントローラーのshowアクションの$post->idに移動-->
  <li>
    {{ $comment->body }}
      <a href="#" class="del" data-id="{{ $comment->id }}">[X]</a>
      <form action="{{ action( 'CommentsController@destroy', [$post, $comment] ) }}" method="post"
        id="form_{{ $comment->id }}">
        {{ csrf_field() }}
        {{ method_field('delete') }}
      </form>
  </li>
  @empty
  <li>No commnet yet</li>
  @endforelse
</ul>

<form method="post" action="{{ action('CommentsController@store', $post) }}">
  {{ csrf_field() }}
  <p>
    <input type="text" name="body" placeholder="enter comment" value="{{ old('body') }}">
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>
  <p>
    <input type="submit" value="Add Commnet">
  </p>
</form>

<script src="/js/main.js"></script>

@endsection
