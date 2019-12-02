<?php

use App\Amount;
use App\Day;
use App\Department;
use App\Designation;
use App\Month;
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
        $department = [
            [
                'name' => 'Design',
            ],
            [
                'name' => 'Development',
            ],
            [
                'name' => 'Marketing',
            ]
        ];
        foreach ($department as $d) {
            Department::create($d);
        }
        $month = [
            [
                'name' => 'January',
            ],
            [
                'name' => 'February',
            ],
            [
                'name' => 'March',
            ],
            [
                'name' => 'April',
            ],
            [
                'name' => 'May',
            ],
            [
                'name' => 'June',
            ],
            [
                'name' => 'July',
            ],
            [
                'name' => 'August',
            ],
            [
                'name' => 'September',
            ],
            [
                'name' => 'October',
            ],
            [
                'name' => 'November',
            ],
            [
                'name' => 'December',
            ]
        ];
        foreach ($month as $d) {
            Month::create($d);
        }
        $day = [
            [
                'name' => 'Satarday',
            ],
            [
                'name' => 'Sunday',
            ],
            [
                'name' => 'Monday',
            ],
            [
                'name' => 'Tuesday',
            ],
            [
                'name' => 'Wednesday',
            ],
            [
                'name' => 'Thursday',
            ],
            [
                'name' => 'Friday',
            ]
        ];
        foreach ($day as $d) {
            Day::create($d);
        }
        $amount = [
            [
                'amount' => 10000
            ],
            [
                'amount' => 12000
            ],
            [
                'amount' => 16000
            ],
            [
                'amount' => 18000
            ]
        ];
        foreach ($amount as $d) {
            Amount::create($d);
        }
    }
}