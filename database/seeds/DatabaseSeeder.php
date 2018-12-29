<?php
use Carbon\Carbon;
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

      for($i = 0; $i < 100; $i++){
          App\Product::create([
            'user_id' => 1,
            'title' => $faker->title,
            'desc' => str_random(25),
            'image' => "/ps4.jpg",
            'currentprice' => 199,
            'newprice' => 90,
            'category_id' => 1,
            'couponcode' => null,
            'advertboolean' => 0,
            'clicks' => 0 ,
            'expired_date' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'url' => 'https://www.google.com'
          ]);
      }
    }
}
