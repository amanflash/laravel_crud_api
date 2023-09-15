<?php

namespace App\Http\Controllers;

use App\Models\Post;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return response()->json(['Posts'=>Post::get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $POST = new POST;
        $POST->title=$request->title;
        $POST->description=$request->description;

        $POST->save();

        return response()->json([
            'message' => 'post created',
            'status' => 'succes',
            'data' => $POST 
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json(['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
       
        $post->title=$request->title;
        $post->description=$request->description;

        $post->save();

        return response()->json([
            'message' => 'post created',
            'status' => 'succes',
            'data' => $post 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'Message' =>  'Post deleted',
            'status' => 'succes'


        ]);
    }
}
