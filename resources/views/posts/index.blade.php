<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blog Posts</title>
    <link rel="stylesheet" href="/css/styles.css">
  </head>
  <body>
    <div class="container">
        <h1>Blog Posts</h1>
        <ul>
          <!-- ループ処理 -->
          {{--
          @foreach ($posts as $post)
          @endforeach
          --}}
          <!-- もし$postsが空だった場合の処理 -->
          @forelse ($posts as $post)
          <!--Postsコントローラーのshowアクションの$post->idに移動-->
          <li><a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a></li>
          @empty
          <li>No posts yet</li>
          @endforelse
        </ul>
    </div>
  </body>
</html>
