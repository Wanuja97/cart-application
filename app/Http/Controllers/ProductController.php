<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\carbon;

class ProductController extends Controller
{
    //Calling the Auth Middleware 
    // public function __construct(){
    //     return $this-> middleware('auth');
    // }

    // Retrive all products
    public function allProducts()
    {
        $products = Product::all();
        return view('admin/products/index', compact('products'));
    }

    public function add()
    {
        return view('admin.products.create');
    }
    public function create(Request $request)
    {

        Product::insert([
            'product_name' => $request->pname,
            'description' => $request->description,
            'price' => $request->price,
            'available_qty' => $request->quantity,
            'created_at' => Carbon::now(),
            // 'user_id' => Auth::user()->id,
        ]);

        $products = Product::all();
        return view('admin.products.index',compact('products'))->with('success','Product Updated Successfully');
    }
    public function delete($id)
    {
        $item = Product::find($id);
        Product::find($id)->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }

    public function edit($id){

        //Query Builder Method
        //$row = DB::table('products')->where('id',$id)->first();

        // Eloquoent ORM Method
        $item = Product::find($id);
        return view('admin.products.edit',compact('item'));
    }

    public function update(Request $request, $id){
        $item = Product::find($id);
        
        Product::find($id)->update([
            'product_name' => $request->pname,
            'description' => $request->description,
            'price' => $request->price,
            'available_qty' => $request->available_qty,
            'updated_at' => Carbon::now(),
        ]);
        $products = Product::all();
        return view('admin.products.index',compact('products'))->with('success','Product Updated Successfully');
    }

}
