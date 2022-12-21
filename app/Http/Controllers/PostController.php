<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //post page
    public function postList(){
        return view('admin.post');
    }

    //post create
    public function postCreate(Request $request){
        $this->validationCheck($request);
        $data = $this->getData($request);

        Post::create($data);
        $post = Post::get();
        return view('admin.post',compact('post'));
    }

    //show post
    public function showPost(){
        $post = Post::get();
        return view('admin.post',compact('post'));
    }

    //delete post
    public function deletePost($id){
        Post::where('post_id',$id)->delete();
        return redirect()->route('admin#showPost');
    }



    private function getData($request){
        return [
            'title' => $request->title,
            'description'=>$request->description,
            'user_id'=> Auth::user()->id
        ];
    }

    private function validationCheck($request){
        Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required'
        ])->validate();
    }
}
