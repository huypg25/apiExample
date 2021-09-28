<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{https://github.com/huypg25/apiExample/blob/main/app/Http/Controllers/ApiController.php
    public function getAllPosts() {

            $posts = Post::get()->toJson(JSON_PRETTY_PRINT);
        
            return response($posts, 200);
    }

    public function createPost(Request $request) {

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return response()->json([
            "message" => "post created"
        ], 201);
    }

    public function getPost(Post $post) {
        if ($post->exists()) {
            
            return response($post, 200);
        } else {
            
            return response()->json([
                "message" => "Post not found"
            ], 404);
        }
    }

    public function updatePost(Request $request,Post $post) {
        if ($post->exists()) {
            $post->title = is_null($request->title) ? $post->title : $request->title;
            $post->body = is_null($request->body) ? $post->body : $request->body;
            $post->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            
            return response()->json([
                "message" => "Post not found"
            ], 404);

        }
    }

    public function deletePost ( Post $post) {
        if ($post->exists()) {
            $post->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            
            return response()->json([
                "message" => "Post not found"
            ], 404);
        }
    }
}
