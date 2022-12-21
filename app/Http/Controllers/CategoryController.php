<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //create category
    public function createCategory(Request $request){
        $this->validationCheck($request);
        $data = $this->getTitle($request);
        // dd($data);
        Category::create($data);
        $list = Category::get();
        return view('admin.home',compact('list'));
    }

    //show category
    public function showCategory(){
        $list = Category::get();
        return view('admin.home',compact('list'));
    }

    //delete category
    public function deleteCategory($id){
        // dd($id);
        Category::where('category_id',$id)->delete();
        return redirect()->route('admin#showCategory')->with(['deleteSuccess'=>'Category delete success']);
    }

    //get data
    private function getTitle($request){
        return [
            'title' => $request->title
        ];
    }

    //validation
    private function validationCheck($request){
        Validator::make($request->all(),[
            'title' => 'required'
        ])->validate();
    }


}
