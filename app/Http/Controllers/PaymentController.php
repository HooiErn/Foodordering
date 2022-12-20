<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Food;
use Stripe;

class PaymentController extends Controller
{
    public function paymentPost(Request $request)
    {
	       
	Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->sub*100,
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose",
        ]);

        $newOrder=Order::Create([   
            'paymentStatus'=>'Done',
            'userID'=>Auth::id(),
            'amount'=>$request->sub,
        ]); 
        
        $orderID=DB::table('orders')->where('userID','=',Auth::id())->orderBy('created_at','desc')->first();

        $items=$request->input('cid');
        foreach($items as $item=>$value){
            $carts=Cart::find($value); //get the cart item record
            $carts->orderID=$orderID->id; //binding the orderID with cart item record
            $carts->save();
        }

        //Food available decrease
        

        //Clear cart
        $deleteCart = Cart::where('userID',Auth::id())->where('orderID','!=','');
        $deleteCart -> delete(); 

        Session::flash('success','Order succeessully!');   
        return back();
    }
}