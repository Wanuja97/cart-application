<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = [
            [
                'id'=>'1',
                'total_cost'=>'3550.50',
                'no_of_items'=>'5',
                'user_id'=>'2'
             ],
             [
                 'id'=>'2',
                 'total_cost'=>'4200.00',
                 'no_of_items'=>'7',
                 'user_id'=>'2'
             ],
        ];
  
        foreach ($order as $key => $value) {
            Order::create($value);
        }
    }
}
