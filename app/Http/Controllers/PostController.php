<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Post/Index', [
            'posts' => Post::leftJoin('users', 'users.id', 'posts.user_id')
                ->select(['posts.*', 'name'])
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return Inertia::render('Post/Form', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function save(Request $request)
    {
        $post = $request->id ? Post::find($request->id) : new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = \Auth::id();
        $post->save();
        return to_route('posts');
        //return \Redirect::route('posts');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Post $post
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
