<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'item_price',
    ];
    // consider one row
    // definition of one row
    public function order(){
        return $this->belongsTo('App\Models\Order','order_id','id');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id','id');
    }
}
