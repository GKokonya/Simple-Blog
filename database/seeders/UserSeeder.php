<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [ 'id' =>1 , 'name' => 'admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('12345678') ],
            [ 'id' =>2 , 'name' => 'author','email' => 'author@gmail.com', 'password' => Hash::make('12345678') ],
            [ 'id' =>3 , 'name' => 'regular', 'email' => 'regular@gmail.com', 'password' => Hash::make('12345678') ]
        ]);
    }
}
