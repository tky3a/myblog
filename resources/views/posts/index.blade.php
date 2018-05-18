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
          <li>
            <a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a>
            <a href="{{ action('PostsController@edit', $post) }}" class="edit">[Edit]</a>
            <a href="#" class="del" data-id="{{ $post->id }}">[X]</a>
            <form class="" action="{{ url('/posts/', $post->id ) }}" method="post"
              id="form_{{$post->id }}">
              {{ csrf_field() }}
              {{ method_field('delete') }}
            </form>
          </li>
          @empty
          <li>No posts yet</li>
          @endforelse
        </ul>
        <script src="/js/main.js"></script>
      @endsection
