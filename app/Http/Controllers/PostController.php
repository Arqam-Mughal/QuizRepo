<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();

        return $this->successResponse($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();
        // dd($validatedData);

        // $post = new Post();
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

        $post = Post::create($request->validated());
        $token = $post->createToken("MyApp")->plainTextToken;

        return $this->successResponse($post, 'Data created SuccessFully!', 201, $token);
    }

    /**
     * Display the specified resource.
     */
    public function show($post)
    {
        $post = Post::find($post);
        if(!$post){
            return $this->errorResponse('Record Not Found!', 404);
        }

        return $this->successResponse($post, $post.'th single user!', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, $post)
    {
        $post = Post::find($post);

        // dd($request->all());
        // $post = Post::find($post->id);

        // $post->title = $request->title ?? $post->title;
        // $post->content = $request->content ?? $post->content;
        // $post->save();

        if(!$post){
            return $this->errorResponse('Record Not Found!', 404);
        }

        $post->update($request->validated());


        return $this->successResponse($post, 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post)
    {
        $post = Post::find($post);

        if(!$post){
            return $this->errorResponse('Record Not Found!', 404);
        }
            $post->delete();

            return $this->successResponse($post, 'Deleted!', 200);
        }
}
