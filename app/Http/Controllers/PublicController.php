<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function getProducts(){
        $products = Product::all();
        return $products;
    }
}
