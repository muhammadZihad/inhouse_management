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
        $users = [
            [
                'name' => 'Muhammad Zihad',
                'email' => 'muhammad.zihad97@gmail.com',
                'password' => Hash::make('password'),
                'designation_id' => 2,
                'department_id' => 1,
                'amount_id' => 1,
            ],
            [
                'name' => 'Shadesh Saha',
                'email' => 'abc@gmail.com',
                'password' => Hash::make('password'),
                'designation_id' => 5,
                'department_id' => 1,
                'amount_id' => 2,
                'type' => 'Permanent',
                'gender' => 'Male'
            ],
            [
                'name' => 'SM Saleheen',
                'email' => 'smsaleheen18@gmail.com ',
                'password' => Hash::make('password'),
                'designation_id' => 2,
                'department_id' => 1,
                'amount_id' => 3,
                'type' => 'Permanent',
                'gender' => 'Male'
            ],
            [
                'name' => 'Alif Hasnail',
                'email' => 'hasnain.alif20@gmail.com ',
                'password' => Hash::make('password'),
                'designation_id' => 1,
                'department_id' => 1,
                'amount_id' => 2,
                'type' => 'Permanent',
                'gender' => 'Male'
            ],
        ];
        foreach ($users as $u) {
            User::create($u);
        }
    }
}