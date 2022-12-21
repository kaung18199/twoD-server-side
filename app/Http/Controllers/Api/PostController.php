<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    // api user get post
    public function userGetPost(){
        $post = Post::select('posts.*','users.name')
                ->join('users','posts.user_id','users.id')
                ->orderBy('created_at','desc')
                ->get();
        return response()->json([
            'post'=>$post
        ],200);
    }

    //user post create
    public function userPost(Request $request){
        $data = [
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>$request->user_id
        ];

        Post::create($data);
        $post = Post::select('posts.*','users.name')
                ->join('users','posts.user_id','users.id')
                ->orderBy('created_at','desc')
                 ->get();
        return response()->json([
            'post'=>$post
        ],200);
    }

    //user post search
    public function postSearch(Request $request){
        $post = Post::select('posts.*','users.name')
                    ->join('users','posts.user_id','users.id')
                    ->where('title','like','%'.$request->key.'%')->get();
        return response()->json([
            'post'=>$post
        ]);
    }

    //post detail
    public function postDetail(Request $request){
        $id = $request->postId;
        $post = Post::select('posts.*','users.name')
                        ->join('users','posts.user_id','users.id')
                        ->where('post_id',$id)
                        ->first();
        return response()->json([
            'post' => $post
        ]);
    }
}
