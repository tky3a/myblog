<?php

/* 名前空間 */
namespace App\Http\Controllers;

//use: 名前空間を省略化
use Illuminate\Http\Request;
use App\Post; //useすることで名前空間に\App\Post::処理内容();等と書かないといけないものが、Post::処理内容();と省略できる

class PostsController extends Controller
{
  # indexアクションを定義
  public function index() {
   # データの取得
   // $posts = [];
   $posts = Post::latest()->get(); //Postのデータ全て$postsに代入(データ全件取得)
    // dd($posts->toArray()); //dump die
    // return view('posts.index', ['posts' => $posts]); //view('ディレクトリ名.ファイル名');
    return view('posts.index')->with('posts', $posts);
  }
    //


    # showアクションを定義(引数に$idを与える)
    public function show($id) {
      // $post = Post::find($id);
      $post = Post::findOrFail($id);
      return view('posts.show')->with('post', $post);
    }
}
