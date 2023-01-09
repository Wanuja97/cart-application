<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateOrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderitem = [
            [
               'order_id'=>'1',
               'product_id'=>'1',
               'quantity'=>'10',
               'item_price'=>'1200.00'

            ],
            [
                'order_id'=>'1',
                'product_id'=>'2',
                'quantity'=>'5',
                'item_price'=>'500.00'
            ],
        ];
  
        foreach ($orderitem as $key => $value) {
            OrderItem::create($value);
        }
    }
}
