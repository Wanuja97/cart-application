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
        $product = [
            [
               'id'=>'1',
               'product_name'=>'Anchor Milk Powder',
               'description'=>'400g',
               'price'=>'1350',
               'available_qty'=>'100',
               'image'=>'images/product/1754159091729964.jpg',
            ],
            [
                'id'=>'2',
                'product_name'=>'Coca Cola',
                'description'=>'1.5l',
                'price'=>'500',
                'available_qty'=>'200',
                'image'=>'images/product/1754159001565205.jfif',
            ],
        ];
  
        foreach ($product as $key => $value) {
            Product::create($value);
        }
    }
}
