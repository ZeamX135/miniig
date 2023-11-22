<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'caption'      => 'max:250',
            'image'       => 'required|image|mimes:jpeg,jpg,png,gif,svg',
        ]);

        $imageName = $user->image;
        if($request->image){
            $image = $request->image;
            $imageName = $user->username . '-' . time() . '.' . $image->extension();
            $image->move(public_path('images/posts'), $imageName);
        }

        $user->posts()->create([
            'caption'      => $request->caption,
            'image'   => $imageName
        ]);

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        if($post->user_id != Auth::user()->id)
            abort(403);

        $request->validate([
            'caption'      => 'max:250',
        ]);

        $post->update([
            'caption'      => $request->caption,
        ]);

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
