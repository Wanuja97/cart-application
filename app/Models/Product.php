<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
class Product extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'product_name',
        'description',
        'price',
        'available_qty',
        'image',
    ];

}
