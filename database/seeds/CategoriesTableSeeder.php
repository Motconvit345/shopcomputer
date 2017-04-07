<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        DB::table('categories')->insert([
            [
                'name' => 'Laptop, Link Kiện',
                'alias' => str_random(10).'-alias',
                'parent_id' => '0',
            ],
            [
                'name' => 'Laptop',
                'alias' => str_random(10).'-alias',
                'parent_id' => '1',
            ],
            [
                'name' => 'Link Kiện',
                'alias' => str_random(10).'-alias',
                'parent_id' => '1',
            ],
            [
                'name' => 'Laptop Dell',
                'alias' => str_random(10).'-alias',
                'parent_id' => '2',
            ],
            [
                'name' => 'Laptop Toshiba',
                'alias' => str_random(10).'-alias',
                'parent_id' => '2',
            ],
            [
                'name' => 'PC, Thiết bị lưu trữ',
                'alias' => str_random(10).'-alias',
                'parent_id' => '0',
            ],
            [
                'name' => 'PC',
                'alias' => str_random(10).'-alias',
                'parent_id' => '6',
            ],
            [
                'name' => 'PC Dell',
                'alias' => str_random(10).'-alias',
                'parent_id' => '7',
            ]
        ]);
    }
}
