<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'email' => 'admin@parratusan.com',
            'password' => bcrypt('admin'),
            'status' => true
        ]);
    }
}
