<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('id','DESC')->paginate(3);
        //dd($posts);
        return view('home', compact('posts'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request){
      $this->validate($request,[
        'title' => 'required|min:5',
        'content' => 'required|min:10'
      ]);

      Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'user_id' => Auth::user()->id,
      ]);

      return redirect()->route('post.user')->with('message','Resep berhasil ditambah');
    }

    public function edit($id){
      $post = Post::where('id',$id)->first();

      return view('update', compact('post'));
    }

    public function update(Request $request, $id){
      $post = Post::find($id);
      $post->update([
        'title' => $request->title,
        'content' => $request->content,
      ]);

      return redirect()->route('post.user')->with('message','Resep berhasil diubah');
    }


    public function destroy($id){
      $post = Post::find($id);

      $post->delete();

      return redirect()->route('post.user')->with('message','Resep berhasil dihapus');
    }

    public function postUser(){
      $posts = Post::where('user_id',Auth::user()->id)->orderBy('id','DESC')->paginate(3);

      return view('postUser', compact('posts'));
    }


}
