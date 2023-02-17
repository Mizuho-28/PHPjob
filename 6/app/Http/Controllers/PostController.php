<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;


class PostController extends Controller
{
     // 以下を追記
  public function add()
  {
      return view('post.create');
  }

  public function create(Request $request)
  {
    $this->validate($request, Post::$rules);
    $post = new Post;
    $form = $request->all();
    unset($form['_token']);

    // データベースに保存する
    $post->fill($form);
    $post->save();
    return redirect('post/create');
  }

  public function index(Request $request)
  {
    $user = User::all();
    $post = Post::orderBY('created_at','desc')->get();
    return view('post.create',['posts' => $post, 'users' => $user]);
  }

  public function delete(Request $request)
  {
    $post = Post::find($request->post_id);
    $post->delete();

    return redirect('post/create');
  }

}

