<?php

use Illuminate\Database\Seeder;
use App\Products;

class ProductGaleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $images = [];
        $listProducts = Products::all();
        foreach($listProducts as $item){
            $numberImg = rand(3, 5);
            for($i = 0; $i < $numberImg; $i++){
                $resource = [
                    'image_url' => $faker->imageUrl($width = 416, $height = 540, 'fashion'),
                    'product_id' => $item->id
                ];
                $images[] = $resource;
            }
        }
        DB::table('product_galery')->insert($images);
    }
}
