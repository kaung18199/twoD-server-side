<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //comment create
    public function commentCreate(Request $request){
        $data = [
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'comment' => $request->comment
        ];
        Comment::create($data);

        $comment = Comment::select('comments.*','users.name')
                            ->join('users','comments.user_id','users.id')
                            ->where('post_id',$request->post_id)
                            ->orderBy('created_at','desc')
                            ->get();
        return response()->json([
            'comment' => $comment
        ]);
    }

    //comment get
    public function commentGet(Request $request){
        $comment = Comment::select('comments.*','users.name')
                            ->join('users','comments.user_id','users.id')
                            ->where('post_id',$request->post_id)
                            ->orderBy('created_at','desc')
                            ->get();
        return response()->json([
            'comment' => $comment
        ]);
    }
}
