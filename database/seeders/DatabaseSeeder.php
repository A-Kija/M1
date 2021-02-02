<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker::create('lt_LT');
        
        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('1'),
        ]);

        DB::table('users')->insert([
            'name' => 'Zebras',
            'email' => 'zebras@gmail.com',
            'password' => Hash::make('1'),
        ]);

        foreach(range(1,40) as $_) {
            DB::table('authors')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'photo' => rand(10, 54).'.jpg'
            ]);
        }


        foreach(range(1,400) as $__) {
            DB::table('books')->insert([
                // 'name' => $faker->firstName,
                // 'surname' => $faker->lastName,
                'title' => $faker->words(rand(1, 7), true),
                'isbn' => $faker->isbn13,
                'pages' => rand(5, 600),
                'about' => $faker->paragraphs(rand(1, 7), true),
                'author_id' => rand(1,40),
            ]);
        }


    }
}
