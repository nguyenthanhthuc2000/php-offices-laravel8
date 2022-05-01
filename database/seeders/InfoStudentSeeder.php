<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('vi_VN');
        $limit = 220;

        for ($i = 110; $i < $limit; $i++) {
            DB::table('info')->insert([
                'user_id' => $i,
                'birth_date' => $faker->date(),
                'ethnic' => 1,
                'religion' => 1,
                'date_join_tncshcm' => $faker->date(),
                'date_join_csvn' =>  $faker->date(),
                'sex' => rand(0,1),
                'district' => 610,
                'province' => 53,
                'ward' => 9665,
                'place_birth' => 53,
                'identity_card_number' => $i.time(),
                'student_code' => $i.time(),
                'phone' => '036'.$faker->numerify('#######'),
            ]);
        }
    }
}
