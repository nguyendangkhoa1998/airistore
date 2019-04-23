<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            ['name' => 'Tops','active'=>1],
            ['name' => 'Pants','active'=>1],
            ['name' => 'Shoes','active'=>1],
        ];
        DB::table('category')->insert($category);
    }
}
