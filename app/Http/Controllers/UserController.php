<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\carbon;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();

        $orders = Order::where('user_id',Auth::user()->id)->with('user','orderItems','orderItems.product')->get();

        return view('consumer.consumerProfile',compact('user','orders'));
    }

    public function profileUpdate(Request $request){
        User::find($request->id)->update([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'zip_code' => $request->zcode,
            'street' => $request->street,
            'city' => $request->city,
            'country' => $request->country,
            'telephone' => $request->telephone,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('cart.checkout');

    }

    // retrive all consumers
    public function viewConsumers(){
        $consumers = User::all()->where('is_admin','=','0');
        return view('admin.consumers.viewAllConsumers',compact('consumers'));
    }

    // Retrieve one consumer
    public function viewOneConsumer($id){
        $consumer = User::find($id);
        $orders = Order::where('user_id',$consumer->id)->with('user','orderItems','orderItems.product')->get();
        // return view('consumer.purchaseHistory')->with('orders',$orders);

        return view('admin.consumers.viewConsumer',compact('consumer','orders'));
    }
}
