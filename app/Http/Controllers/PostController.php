<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->get();
        return view('posts', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostFormRequest $request)
    {
        DB::table('posts')->insert([
            'title' => $request->input('title'),
            'image' => $request->input('image'),
            'post_content' => $request->input('post_content'),
        ]);
        return back()->with('success', 'Successfully post created');
    }

    public function edit($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('posts.edit', ['post' => $post]);
    }

    public function show($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('posts.show', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:128',
            'post_content' => 'required|string',
        ]);

        DB::table('posts')->where('id', $id)->update([
            'title' => $request->input('title'),
            'post_content' => $request->input('post_content'),
        ]);
        return back()->with('success', 'Successfully post update');
    }

    public function destroy($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return back()->with('success', 'Successfully post deleted');
    }
}
