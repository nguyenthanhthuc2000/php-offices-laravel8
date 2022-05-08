<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolYearSeeder extends Seeder
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
                'name' => '2018-2022'
            ],
            [
                'name' => '2017-2021'
            ],
            [
                'name' => '2016-2019'
            ],
        ];

        foreach ($data as $val) {
            DB::table('school_years')->insert($val);
        }
    }
}
