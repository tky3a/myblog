<!-- 継承先を宣言 -->
@extends('layouts.default')


<!-- titleを継承できるように宣言 -->
@section('title', 'Blog Posts')

     <!-- contentを継承できる様に宣言  -->
      @section('content')
        <h1>
          <a href="{{ url ('/posts/create') }}" class="header-menu">New Post</a>
          Blog Posts
        </h1>
        <ul>
          <!-- もし$postsが空だった場合の処理 -->
          @forelse ($posts as $post)
          <!--Postsコントローラーのshowアクションの$post->idに移動-->
          <li><a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a></li>
          @empty
          <li>No posts yet</li>
          @endforelse
        </ul>
      @endsection
