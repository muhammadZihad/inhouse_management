<?php

use App\Designation;
use Illuminate\Database\Seeder;

class DSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $desig = [
            [
                'name' => 'CEO',
            ],
            [
                'name' => 'Manager',
            ],
            [
                'name' => 'HR',
            ],
            [
                'name' => 'Web App Developer',
            ],
            [
                'name' => 'Python Developer',
            ],

        ];

        foreach ($desig as $d) {
            Designation::create($d);
        }
    }
}