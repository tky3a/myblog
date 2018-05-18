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
  </li>
  @empty
  <li>No commnet yet</li>
  @endforelse
</ul>

@endsection
