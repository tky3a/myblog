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
@endsection
