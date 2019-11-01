<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->id = 1;
        $user->name = "admin";
        $user->user_type = "admin";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt('secret');
        $user->save();
    }
}
