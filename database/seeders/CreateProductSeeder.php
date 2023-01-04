<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class CreateProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                
               'product_name'=>'Anchor Milk Powder',
               'description'=>'400g',
               'price'=>'1350',
               'available_qty'=>'100',
            ],
            [
                'product_name'=>'Coca Cola',
                'description'=>'1.5l',
                'price'=>'500',
                'available_qty'=>'200',
            ],
        ];
  
        foreach ($user as $key => $value) {
            Product::create($value);
        }
    }
}