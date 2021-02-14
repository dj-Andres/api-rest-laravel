<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $post = Post::all(); 

        return response()->json([
            'succes'=>true,
            'data'=>$post
        ],status:200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $imputs= $request->all();

        Post::create($imputs);

        return response()->json([
            'succes'=>true,
            'message'=>'El post se creo exitosamente',
            'data'=>$imputs
                        
        ],status:200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $post = Post::find($id); 

        return response()->json([
            'success'=>true,
            'data'=>$post
        ],status:200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());

         return response()->json([
            'success'=>true,
            'message'=>'update',
            'data'=>$post
        ],status:200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $post = Post::destroy($id); 

        return response()->json([
            'success'=>true,
            'message'=>'delete',
            'data'=>$post
        ],status:200);
    }
}
