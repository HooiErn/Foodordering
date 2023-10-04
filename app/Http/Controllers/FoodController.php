<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Food;
use App\Models\Table;
use Session;
use DB;

class FoodController extends Controller
{
    //View Add Food Form
    public function addForm(){
        $categories = Category::all();
        return view('admin/food/addForm')->with('categories',$categories);
    }

   public function index()
    {
    $foods = Food::orderBy('name', 'asc')->get();
    return view('admin.food', compact('foods'));
    }

    //Add Food
    public function add(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'foodImage' => 'required',
            'available' => 'required',
            'price' => 'required',
            'categoryID' => 'required',
        ]);

        if($validator -> fails()){
            return redirect('food/addForm')->withErrors($validator)->withInput(); 
        }
        else{
            $image=$request->file('foodImage');        
            $image->move('images',$image->getClientOriginalName());               
            $imageName=$image->getClientOriginalName(); 
            $addFood=Food::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'available'=>$request->available,
                'price'=>$request->price,
                'categoryID'=>$request->categoryID,
                'image'=>$imageName,
            ]);

            Session::flash('success', 'Food create successfully!');
            return redirect('admin/dashboard');
        }
    }

    //View Edit Food Form
    public function editForm($id){
        $foods = Food::all()->where('id',$id);
        $categories = Category::all();
        return view('admin/food/editForm')->with('foods',$foods)->with('categories',$categories);
    }

   
    //Update Food
    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'foodImage' => 'required',
            'available' => 'required',
            'price' => 'required',
            'categoryID' => 'required',
        ]);

        $foods = Food::all()->find($request->foodID);

        if($validator -> fails()){
            return redirect('food/editForm')->withErrors($validator)->withInput();
        }
        else{
            if($request -> file('foodImage')!=''){
                $image=$request->file('foodImage');        
                $image->move('images',$image->getClientOriginalName());               
                $imageName=$image->getClientOriginalName(); 
                $foods-> image = $imageName;
            }

            $foods -> name = $request -> name;
            $foods -> description = $request -> description;
            $foods -> available = $request -> available;
            $foods -> price = $request ->price;
            $foods -> categoryID = $request -> categoryID;
            $foods -> save();

            Session::flash('success','Category update successfully!');
            return redirect('admin/dashboard');
        }
    }
   
    //Delete Food
    public function delete($id){
        $deleteFood=Food::find($id);
        $deleteFood->delete();
        
        if($deleteFood){
           Session::flash('success',"Food delete successfully!");
            return redirect('admin/dashboard'); 
        }
    }

    public function view($id){
        $viewFoods = Food::all()->where('id',$id);
        $ratings = Rating::where('food_id', $id)->get();
        $ratings_sum = Rating::where('food_id', $id)->sum('stars_rated');
        $table = Table::all();
        // Check if there is no rating
        if($ratings -> count() > 0){
            $rating_value = $ratings_sum / $ratings->count();
        }
        else{
            $rating_value = 0;
        }
        return view('/view', compact('viewFoods', 'ratings','rating_value','table'));
    }

    public function foodDetail($id){
         $foods = DB::table('food')
        ->leftjoin('categories','categories.id','=','food.CategoryID')
        ->select('food.*','categories.name as cName')
        ->where('food.id',$id)
        ->get();
        return view('foodDetail', compact('foods'));
    }
    
//      //Menu
//   public function menu(){
//     $categories = DB::table('categories')->select('categories.*')->get();
//     $foods = DB::table('food')->leftjoin('categories','food.categoryID','=','categories.id')->select('food.*','categories.name as cName')->get();
//     return view('pages.menu')->with(["categories" => $categories])->with('foods',$foods);
// }  

    // public function searchFood(){
    //     $r=request();
    //     $keyword=$r->keyword;
    //     $categories = DB::table('categories')->select('categories.*')->get();
    //     $foods=DB::table('food')
    //     ->leftjoin('categories','categories.id','=','food.CategoryID')
    //     ->select('food.*','categories.name as cName')
    //     ->where('food.name','like','%'.$keyword.'%')
        
    //     ->get();
    //     return view('pages.menu')->with('foods',$foods)->with(["categories" => $categories]);
    // }

    // public function viewAll(){
    //     $foods=DB::table('food')
    //     ->leftjoin('categories','categories.id','=','food.CategoryID')
    //     ->select('food.*','categories.name as cName')
    //     ->get();
    //     return view('pages.menu')->with('foods',$foods);
    // }

    // public function viewDrink(){
    //     $foods=DB::table('food')->where('CategoryID','=','1')
    //     ->leftjoin('categories','categories.id','=','food.CategoryID')
    //      ->select('food.*','categories.name as cName')
    //      ->get();
    //     return view('pages.menu')->with('foods',$foods);
    //  }
 
    //  public function viewNoodles(){
    //      $foods=DB::table('food')->where('CategoryID','=','3')
    //      ->leftjoin('categories','categories.id','=','food.CategoryID')
    //      ->select('food.*','categories.name as cName')
    //      ->get();
    //      return view('pages.menu')->with('foods',$foods);
    //  }
 
    //  public function viewDessert(){
    //     $foods=DB::table('food')->where('CategoryID','=','2')
    //     ->leftjoin('categories','categories.id','=','food.CategoryID')
    //     ->select('food.*','categories.name as cName')
    //     ->get();
    //     return view('pages.menu')->with('foods',$foods);
    // }
 
    // public function viewRice(){
    //     $foods=DB::table('food')->where('CategoryID','=','4')
    //     ->leftjoin('categories','categories.id','=','food.CategoryID')
    //     ->select('food.*','categories.name as cName')
    //     ->get();
    //     return view('pages.menu')->with('foods',$foods);
    // }

}