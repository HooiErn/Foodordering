<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Table;
use Session;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function method($id){
        $table = Table::where('table_id',$id)->first();
        
        return view('method');
    }
     
    public function index($id)
    {
        $table = Table::where('table_id',$id)->first();
        $foods = Food::all();
        $carts = Cart::where('table_id',$id)->get();
        return view('home',compact('foods','carts','table'));
    }

    public function view($id){
        $table = Table::where('table_id',$id)->first();

        $details = Cart::leftjoin('food','carts.food_id','=','food.id')
        ->select('carts.*','food.name as name','food.price as price',
        'food.image as image','food.description as description','food.id as foodID')
        ->where('table_id',$id)
        ->get();

        return view('view',compact('details','table'));

    }

    public function info(){
        $tables = Table::all();

        return view('info',compact('tables'));
    }
}