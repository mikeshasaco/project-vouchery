<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0; $i < 100; $i++){
            App\Product::create([
                'user_id' => 1,
                'title' => $faker->title,
                'desc' => str_random(50),
                'image' => public_path('fryer.jpg',240,180),
                'category_id' => 1,
                'currentprice' => 300,
                'newprice' => 100,
                'couponcode' => 'abiwefa',
                'advertboolean' => 0,
                'url' => 'https://www.google.com/',
                'clicks' => 0

            ]);
        }
    }
}
