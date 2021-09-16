<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'rahim',
            'email' => 'rahim@gmail.com',
            'password' => Hash::make('123456789')
        ]);
        $faker = Factory::create();
        for ($i = 1; $i < 20; $i++) {
                DB::table('categories')->insert([
                    'name' => $faker->sentence(2),
                    'description' => $faker->sentence(10),
                    'slug' => Str::slug($faker->sentence(5)),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
               
            }
        $category = Category::pluck('id')->take(3)->toArray();
        for ($i = 1; $i < 20; $i++) {
                DB::table('sub_categories')->insert([
                    'name' => $faker->sentence(2),
                    'description' => $faker->sentence(10),
                    'slug' => Str::slug($faker->sentence(5)),
                    'category_id' => $category[array_rand($category)] ,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
               
            }
    }



}
