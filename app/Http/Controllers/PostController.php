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
        $postedby = Auth::user()->id;
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
        $validatedData['posted_by'] = Auth::user()->id;

        Post::create($validatedData);

        return Redirect::route('dashboard.index')->with('success', 'Posted successfully!');
    }

    public function edit(String $post_id)
    {
        $post = DB::table('posts')
            ->where('id', $post_id)
            ->first();

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|string',
            'content' => 'required|string',
            'post_id' => 'required'
        ];

        $post = Post::where('id', $request->post_id)->first();

        if (!$post) {
            // error, not existing id,
            dd('haha');
        }

        if ($post->posted_by != Auth::user()->id) {
            // error, not yours.
            dd('haha');
        }

        $array = [
            'title' => $request->title,
            'content' => $request->content,
            'updated_at' => now()
        ];

        Post::where('id', $request->post_id)->update($array);

        return Redirect::route('dashboard.index')->with('success', 'Changed successfully!');
    }

    public function destroy(Request $request, Post $post)
    {
        Post::where('id', $request->post_id)->delete($post->id);

        return Redirect::route('dashboard.index')->with('success', 'Product has been deleted!');
    }
}
