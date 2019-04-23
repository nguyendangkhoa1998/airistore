<?php

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $banners = [];
        for($i = 0; $i < 4; $i++){
            $item = [
                'title' => $faker->name,
                'images' => $faker->imageUrl($width = 1760, $height = 850, 'fashion'),
                'link' =>null,
                'status' => 1,
            ];
            array_push($banners, $item);
        }
        DB::table('banners')->insert($banners);
    }
}
