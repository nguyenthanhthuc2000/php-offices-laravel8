<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $limit = 100;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'role' => 2,
                'password' =>  Hash::make(123456),
            ]);
        }
        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'role' => 3,
                'password' =>  Hash::make(123456),
            ]);
        }
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'password' =>  Hash::make(123456),
        ]);
    }
}
