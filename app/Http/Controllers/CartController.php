<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\carbon;

class CartController extends Controller
{
    public function __construct(){
        return $this-> middleware('auth');
    }
    
    public function index()
    {
        return view('consumer/cart');
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "productId" => $id,
                    "name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "productId" => $id,
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function deleteCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkout()
    {
        $user = Auth::user();
        return view('consumer.checkout', compact('user'));
    }

    public function payment()
    {

        $orderId = Order::insertGetId([
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $cart = session()->get('cart');
        // print_r($cart);

        foreach ($cart as $cartitem) {
                // print_r($cartitem);
            ;
            OrderItem::insert([
                'order_id' => $orderId,
                'product_id' => $cartitem['productId'],
                'quantity' => $cartitem['quantity'],
                'item_price' => $cartitem['price'],
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect()->route('purchase.history');
    }

    public function purchaseHistoryForLoggedUser()
    { 
        $orders = Order::where('user_id',Auth::user()->id)->with('user','orderItems','orderItems.product')->get();
        return view('consumer.purchaseHistory')->with('orders',$orders);
    }

    public function viewAllSales(){
        $sales = Order::all();
        return view('admin.consumers.viewSales')->with('sales',$sales);
    }
}
