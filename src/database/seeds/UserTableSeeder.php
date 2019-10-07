<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder {
    public function run() {
        $user = new User();
        $user->name = 'Steven Pardo';
        $user->email = 'dspardo6@gmail.com';
        $user->password = bcrypt('superadmin');
        $user->save();
    }
}
