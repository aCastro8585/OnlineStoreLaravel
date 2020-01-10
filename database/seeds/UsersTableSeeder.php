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
        DB::table('users')->insert([
            'name' => "juan",
            'email' => "juan".'@gmail.com',
            'password' => bcrypt('colombia'),
            'is_admin' =>false,
        ]);

        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin".'@gmail.com',
            'password' => bcrypt('admin'),
            'is_admin' =>true,
        ]);
    }
}
