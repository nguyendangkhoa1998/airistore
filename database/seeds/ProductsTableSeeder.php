<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $products = [];
        for($i = 0; $i < 200; $i++){
            $item = [
                'category_id' => rand(1,3),
                'categories_child_id' => rand(1,10),
                'name' => $faker->name,
                'symbolic_image' => $faker->imageUrl($width = 416, $height = 540, 'fashion'),
                'unit_price' => rand(50,100),
                'quantity' => rand(50,100),
                'short_desciption' => $faker->realText($maxNbChars =20, $indexSize = 1),
                'desciption' => $faker->realText($maxNbChars = 200, $indexSize = 1),
                'stars' => rand(1, 5),
                'views' => rand(100,500),
                'is_new' => rand(0,1),
                'status' => rand(0,1)
            ];
            array_push($products, $item);
        }
        DB::table('products')->insert($products);
    }
}
