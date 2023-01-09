<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class CreateUsersSeeder extends Seeder
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
                'id'=> '1',
               'first_name'=>'Test',
               'last_name'=>'Admin',
               'email'=>'admin@test.com',
                'is_admin'=>'1',
                'zip_code'=> '11010',
                'street'=> 'ABC Road',
                'city'=> 'City A',
                'country' => 'Sri Lanka',
                'telephone'=> '0771231234',
               'password'=> bcrypt('secret'),
            ],
            [
                'id'=> '2',
               'first_name'=>'Test',
               'last_name'=>'User',
               'email'=>'user@test.com',
                'is_admin'=>'0',
                'zip_code'=> '11010',
                'street'=> 'ABC Road',
                'city'=> 'City A',
                'country' => 'Sri Lanka',
                'telephone'=> '0771231234',
               'password'=> bcrypt('secret'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
