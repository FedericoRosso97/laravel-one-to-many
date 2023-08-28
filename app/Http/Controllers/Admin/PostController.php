<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::paginate(15);
        return view('admin.posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //var_dump($request->all());
        //die;
        $data=$request->validate(
            [
                'title' =>['required','min:3', 'max:255'],
                'image'=>['file'],
                'description' =>['required', 'min:10'],
            ]
        );

        if ($request->hasFile('image')){
            $img_path = Storage::put('uploads/posts', $request['image']);
            $data['image'] = $img_path;
        };

        $newPost = Post::create($data);
        return redirect()->route('admin.posts.show', $newPost);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view('admin.posts.show', compact('post'));

    } 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        //dd($request->all());
        $data=$request->validate(
            [
                'title' =>['required',Rule::unique('posts')->ignore($post->id),'min:3', 'max:255'],
                //'image'=>['file'],
                'description' =>['required', 'min:10'],
            ]
        );

        $post->update($data);
        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        //dd($post);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
