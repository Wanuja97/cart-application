<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
class Order extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'total_cost',
        'no_of_items',
    ];

}
