<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            [
                'name' => 'nguyendangkhoa',
                'phone_number' => '0337615638',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'address' => 'Ha Noi',
                'role' => 101
            ],
            [
                'name' => 'nguyenthithuylinh',
                'phone_number' => '0337615638',
                'email' => 'linh@gmail.com',
                'password' => Hash::make('123456'),
                'address' => 'Ha Noi',
                'role' => 11
            ],
            [
                'name' => 'nguyenthimy',
                'phone_number' => '0337615638',
                'email' => 'mymy@gmail.com',
                'password' => Hash::make('123456'),
                'address' => 'Ha Noi',
                'role' => 1
            ],
        ];
        DB::table('users')->insert($users);
    }
}
