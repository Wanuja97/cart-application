<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        $products = Product::all();
        return view('home',compact('products'));
    }
    public function adminDashboard(){
        return view('admin.adminDashboard');
    }

    public function searchResults(Request $request){
        $searchTerm =$request->keyword;
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $searchTerm = str_replace($reservedSymbols, ' ', $searchTerm);

        $searchValues = preg_split('/\s+/', $searchTerm, -1, PREG_SPLIT_NO_EMPTY);

        $products = Product::where(function ($q) use ($searchValues) {
            foreach ($searchValues as $value) {
            $q->orWhere('product_name', 'like', "%{$value}%");
           
            }
        })->latest()->get();

        return view('consumer.searchresults',compact('products'));
    }
}
