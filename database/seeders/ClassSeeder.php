<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Quản trị mạng 18C',
                'sign' => 'QTM18C',
                'faculty_id' => 1
            ],
            [
                'name' => 'Quản trị mạng 18A',
                'sign' => 'QTM18A',
                'faculty_id' => 1
            ],
            [
                'name' => 'Quản trị mạng 18B',
                'sign' => 'QTM18B',
                'faculty_id' => 1
            ],
        ];

        foreach ($data as $val) {
            DB::table('class_list')->insert($val);
        }
    }
}
