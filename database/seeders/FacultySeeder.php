<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
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
                'name' => 'Công nghệ thông tin',
                'sign' => 'CNTT'
            ],
            [
                'name' => 'Điện - Điện tử',
                'sign' => 'DDT'
            ],
            [
                'name' => 'Kế toán',
                'sign' => 'KT'
            ],
        ];

        foreach ($data as $val) {
            DB::table('faculties')->insert($val);
        }
    }
}
