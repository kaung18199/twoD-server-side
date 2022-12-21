<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MakeController extends Controller
{
    //api
    //get category
    public function getCategory(){
        $categoryList = Category::get();
        return response()->json([
            'categoryList'=>$categoryList
        ],200);
    }
}
