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
               'first_name'=>'Test',
               'last_name'=>'Admin',
               'email'=>'admin@test.com',
                'is_admin'=>'1',
                'country' => 'Sri Lanka',
               'password'=> bcrypt('secret'),
            ],
            [
               'first_name'=>'Test',
               'last_name'=>'User',
               'email'=>'user@test.com',
                'is_admin'=>'0',
                'country' => 'Sri Lanka',
               'password'=> bcrypt('secret'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
