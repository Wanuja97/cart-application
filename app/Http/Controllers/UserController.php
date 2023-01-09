<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\carbon;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('consumer.consumerProfile',compact('user'));
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
        return redirect()->route('home');

    }
}
