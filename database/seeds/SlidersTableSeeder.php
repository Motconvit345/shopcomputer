<?php

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::truncate();
        DB::table('sliders')->insert([
            [
                'image' => '58e70867e9311.jpg',
                'order' => 1,
                'description' => 'asdasd',
            ],
            [
                'image' => '4856577_orig.jpg',
                'order' => 2,
                'description' => 'asdasd',
            ],
            [
                'image' => 'computer_shop_banner_by_w3soul-d5pdkj3.jpg',
                'order' => 3,
                'description' => 'asdasd',
            ]
        ]);
    }
}
