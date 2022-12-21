<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ActionLogController extends Controller
{
    //user list page
    public function userList(){
        $list = User::get();
        return view('admin.userlist',compact('list'));
    }

    //delete user list
    public function deleteUserList($id){
        User::where('id',$id)->delete();
        return redirect()->route('admin#userList');
    }
}
