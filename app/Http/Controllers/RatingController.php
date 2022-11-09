<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Rating;
use Session;
use DB;

class RatingController extends Controller
{
    //Rating Food
    public function rating(Request $request){
        $stars_rated = $request -> input('product_rating');
        $food_id = $request -> input('food_id');

        $food_check = Food::where('id', $food_id)->get();

        if($food_check){
            $existing_Rating = Rating::where('user_id', Auth::id())->where('food_id',$food_id)->first();
            if($existing_Rating){
                $existing_Rating -> stars_rated = $stars_rated;
                $existing_Rating -> update();
            }
            else{
                Rating::create([
                    'user_id' => Auth::id(),
                    'food_id' => $food_id,
                    'stars_rated' => $stars_rated
                ]);
            }
            Session::flash('success', 'Thank you for the rating');
            return redirect()->back();
        }
        else{
            Session::flash('msg', 'The link you follow was broken');
            return redirect()->back();
        }
    }
}