<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('home');
    }

    public function getRegisteredUsers()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('users', ['users' => $users]);
    }


    /**
     * A function to show a list of all blog posts
     */

    public function PostList()
    {
        $posts = Blog::with('writer')->get();
//        dd($posts);
        return view('post_list', ['posts' => $posts]);
    }


    /**
     * A function to show a form to create post
     */

    public function createPost()
    {
        return view('post_create');
    }


    /**
     * A function to store our post
     */

    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            ]
        );

        $article = new Blog();
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->author = Auth::id();
        $article->save();
        return redirect()->route('all_posts')->with('status', 'New article has been successfully created!');
    }

}
