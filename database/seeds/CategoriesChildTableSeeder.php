<?php

use Illuminate\Database\Seeder;

class CategoriesChildTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories_child = [
            [
                'name' => 'Coats',
                'category_id'=>1,
                'active'=>1
            ],
            [
                'name' => 'Jackets',
                'category_id'=>1,
                'active'=>1
            ],
            [
                'name' => 'Shirts',
                'category_id'=>1,
                'active'=>1
            ],
            [
                'name' => 'T-shirts',
                'category_id'=>1,
                'active'=>1
            ],
            [
                'name' => 'Jeans',
                'category_id'=>2,
                'active'=>1
            ],
            [
                'name' => 'Shorts',
                'category_id'=>2,
                'active'=>1
            ],
            [
                'name' => 'Trousers',
                'category_id'=>2,
                'active'=>1
            ],
            [
                'name' => 'Sneakers',
                'category_id'=>3,
                'active'=>1
            ],
            [
                'name' => 'Boots',
                'category_id'=>3,
                'active'=>1
            ],
            [
                'name' => 'sandals',
                'category_id'=>3,
                'active'=>1
            ],
        ];
        DB::table('categories_child')->insert($categories_child);
    }
}
