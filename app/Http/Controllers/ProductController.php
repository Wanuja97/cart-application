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
        //Storing Image and image_name

        //taking image file
        $image = $request->file('image');

        // //generating unique if for image
        $name_gen = hexdec(uniqid());
        // //Creating Extension
        $image_exte = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen. "." .$image_exte;
        // upload location
        $up_location = 'images/product/';
        $last_img = $up_location.$img_name;
        $image->move($up_location,$img_name);       

        
        Product::insert([
            'product_name' => $request->pname,
            'description' => $request->description,
            'price' => $request->price,
            'available_qty' => $request->quantity,
            'image' => $last_img,
            'created_at' => Carbon::now(),
            // 'user_id' => Auth::user()->id,
        ]);

        $products = Product::all();
        // return view('admin.products.index',compact('products'))->with('success','Product Updated Successfully');
        return redirect()->route('view.products');
    }
    public function delete($id)
    {
        $item = Product::find($id);
        $old_image = $item->image;
        unlink($old_image);
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

        $old_image = $item->image;
        //If User changed Image
         if($request->image){
            //taking image file
            $image = $request->file('image');
            //generating unique if for image
            $name_gen = hexdec(uniqid());
            //Creating Extension
            $image_exte = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen. "." .$image_exte;
            //upload location
            $up_location = 'images/product/';
            $last_img = $up_location.$img_name;
            $image->move($up_location,$img_name);

            unlink($old_image);
            Product::find($id)->update([
            
            'image' => $last_img,
            ]);
         }
         //if user changed brand name
        //  if($request->category_name){
        //     Product::find($id)->update([
        //     'category_name' => $request->image,
        //     ]);
        //  }
        //  if($request->description){
        //     Product::find($id)->update([
        //     'description' => $request->description,
        //     ]);
        //  }
        //  //For Any Changes
        // Product::find($id)->update([
        //     'created_at' => Carbon::now(),
        //     // 'user_id' => Auth::user()->id,
        // ]);
        Product::find($id)->update([
            'product_name' => $request->pname,
            'description' => $request->description,
            'price' => $request->price,
            'available_qty' => $request->available_qty,
            'image'=> $last_img,
            'updated_at' => Carbon::now(),
        ]);
        $products = Product::all();
        // return view('admin.products.index',compact('products'))->with('success','Product Updated Successfully');
        return redirect()->route('view.products');
    }


    
}
