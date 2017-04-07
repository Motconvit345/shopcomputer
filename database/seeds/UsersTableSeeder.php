<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        factory(User::class)->states('admin')->create([
            'email' => 'bach.trung.kien@framgia.com',
            'name' => 'Bach Trung Kien',
            'password' => '123456',
            'confirmed' => 1,
            'role_id' => 1,
            'isSupper' => 1
        ]);
        DB::table('users')->insert([
            [
                'email' => 'seller@framgia.com',
                'name' => 'Seller',
                'password' => Hash::make(123456),
                'role_id' => 2,
                'confirmed' => 1,
            ],
            [
                'email' => 'shipper@framgia.com',
                'name' => 'shipper',
                'password' => Hash::make(123456),
                'role_id' => 3,
                'confirmed' => 1,
            ],
            [
                'email' => 'member@framgia.com',
                'name' => 'member',
                'password' => Hash::make(123456),
                'role_id' => 4,
                'confirmed' => 1,
            ],
        ]);
    }
}
