<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;
use DB;

class CategoryController extends Controller
{
    //View Add Category Form
    public function addForm(){
        return view('admin/category/addForm');
    }

    //Add Category
    public function add(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator -> fails()){
            return redirect('category/addForm')->withErrors($validator)->withInput(); 
        }
        else{
            $categories = Category::create([
                'name' => $request -> name,
            ]);

            Session::flash('success','Category create successfully!');
            return redirect('admin/dashboard');
        }
    }

    //View Edit Category Form
    public function editForm($id){
        $categories = Category::all()->where('id',$id);

        return view('admin/category/editForm')->with('categories',$categories);
    }

    //Update Category
    public function update(Request $request){
        $categories = Category::find($request -> categoryID);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator -> fails()){
            return redirect('category/editForm')->withErrors($validator)->withInput(); 
        }
        else{
            $categories -> name = $request -> name;
            $categories -> save();

            Session::flash('success','Category update successfully!');
            return redirect('admin/dashboard');
        }
    }

    //Delete Category
    public function delete($id){
        $deleteCategory = Category::find($id);
        $deleteCategory -> delete();
        
        if($deleteCategory){
            Session::flash('success','Category delete successfully!');
            return redirect('admin/dashboard');
        }
    }
}
