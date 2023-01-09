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
                'user_id'=>'2'
             ],
             [
                 'id'=>'2',
                 'user_id'=>'2'
             ],
        ];
  
        foreach ($order as $key => $value) {
            Order::create($value);
        }
    }
}
