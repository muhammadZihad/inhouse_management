<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'Muhammad Zihad',
                'email' => 'muhammad.zihad97@gmail.com',
                'password' => Hash::make('password'),
                'designation_id' => 2,
                'department_id' => 1,
                'amount_id' => 1,
                'type' => 'Permanent',
                'gender' => 'Male',
                'home_address' => 'Dhaka',
                'phone' => '2366234324',
                'national_id' => '9239329424',
                'type' => 'Permanent',
                'isAdmin' => 1,
                'department_id' => 2,
                'designation_id' => 1,
            ]
        );
        User::create(
            [
                'name' => 'SM Saleheen',
                'email' => 'abc@gmail.com',
                'password' => Hash::make('password'),
                'designation_id' => 2,
                'department_id' => 1,
                'amount_id' => 1,
                'type' => 'Permanent',
                'gender' => 'Male',
                'home_address' => 'Dhaka',
                'phone' => '2366234324',
                'national_id' => '9239329424',
                'type' => 'Permanent',
                'isAdmin' => 0,
                'department_id' => 2,
                'designation_id' => 1,
            ]
        );
        User::create(
            [
                'name' => 'Alif Hasnain',
                'email' => 'def@gmail.com',
                'password' => Hash::make('password'),
                'designation_id' => 2,
                'department_id' => 1,
                'amount_id' => 1,
                'type' => 'Permanent',
                'gender' => 'Male',
                'home_address' => 'Dhaka',
                'phone' => '2366234324',
                'national_id' => '9239329424',
                'type' => 'Permanent',
                'isAdmin' => 0,
                'department_id' => 2,
                'designation_id' => 1,
            ]
        );
    }
}