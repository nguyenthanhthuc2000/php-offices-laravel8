<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('vi_VN');
        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            $title = $faker->sentence(5);
            $code = substr(md5(microtime()),rand(0,5), 7);
            DB::table('news')->insert([
                'title'         => $title,
                'slug'          => Str::slug($title).'-'.$code,
                'content'       => $faker->paragraph(rand(20, 50)).'<br>'. $faker->paragraph(rand(20, 50)).'<br>'. $faker->paragraph(rand(20, 50)),
                'image' =>  $faker->image('public/upload', 400, 300, null, false),
            ]);
        }
    }
}
