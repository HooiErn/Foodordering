<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //occur error
        //$foods = DB::table('food')->leftjoin('ratings','food.id','=','ratings.food_id')->select('food.*');
        $foods = Food::all();
        return view('home')->with('foods',$foods);
    }
}