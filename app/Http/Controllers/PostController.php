<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $lists = Post::orderBy('id', 'DESC')->paginate(20); // SELECT * FROM post ORDER id DESC

        return view("post.index", compact('lists'));
    }

    public function create()
    {
        return view("post.create");
    }

    public function store(Request $request)
    {
        Post::create($request->all());

        return redirect()->route('index');
    }

    public function edit($id)
    {
        $result = Post::find($id); // SELECT * FROM posts WHERE id = $id

        return view('post.edit', compact('result'));
    }

    public function update(Request $request, $id)
    {
        Post::find($id)->update($request->all()); // UPDATE post SET ..., ..., WHERE id = $id

        return redirect()->route('index');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect()->route('index');
    }
}
