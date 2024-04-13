<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $postedby = Auth::user()->name;
        $posts = DB::table('posts')->where('posted_by', $postedby)->get();

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string',
            'content' => 'required|string',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['post_date'] = Carbon::now()->format('Y-m-d');
        $validatedData['posted_by'] = Auth::user()->name;

        Post::create($validatedData);

        return Redirect::route('dashboard.index')->with('success', 'Posted successfully!');
    }

    public function edit(String $post_id)
    {
        $post = DB::table('posts')
            ->where('id', $post_id)
            ->get();

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
    }
}
