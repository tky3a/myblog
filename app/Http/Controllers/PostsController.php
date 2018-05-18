<?php

/* 名前空間 */
namespace App\Http\Controllers;

//use: 名前空間を省略化
use Illuminate\Http\Request;
use App\Post; //useすることで名前空間に\App\Post::処理内容();等と書かないといけないものが、Post::処理内容();と省略できる
use App\Http\Requests\PostRequest;

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
    // public function show($id) {
    public function show(Post $post) {
      // $post = Post::find($id);
      // $post = Post::findOrFail($id);
      return view('posts.show')->with('post', $post);
    }

    # createアクションを定義
    public function create() {
      return view('posts.create');
    }
    # storeアクション
    // formから送信されたデータを受け取る場合Requestする必要がある(getではなくpostの場合)
    public function store(PostRequest $request) {
      # バリデーションをPostRequestで管理

      $post = new Post();
      $post->title = $request->title; //postのtitleがrequestのtitle
      $post->body = $request->body; //　postのbodyがrequestのbody
      $post->save();
      return redirect('/'); //フォームを保存出来たらルートに飛ぶ
    }

    # editアクション
    public function edit(Post $post) {
      return view('posts.edit')->with('post', $post);
    }

    public function update(PostRequest $request, Post $post) {
      # バリデーションをPostRequestで管理

      $post->title = $request->title; //postのtitleがrequestのtitle
      $post->body = $request->body; //　postのbodyがrequestのbody
      $post->save();
      return redirect('/'); //フォームを保存出来たらルートに飛ぶ
    }

    #destroyアクション #インプリシットバインディング
    public function destroy(Post $post) {
      $post->delete();
      return redirect('/');
    }
}
