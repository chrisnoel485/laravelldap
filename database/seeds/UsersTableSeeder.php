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
        //
        User::create([
            'name' => 'chrisnoel',
            'email' => 'chrisnoel@parratusan.com',
            'password' => bcrypt('admin'),
            'status' => true
        ]);
    }
}
