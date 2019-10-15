<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UserTableSeeder extends Seeder {
    public function run() {
        $user = new User();
        $user->name = 'Super';
        $user->lastname = 'Admin';
        $user->phone = '5555555';
        $user->birthday = Carbon::parse('1999-12-31')->toDateString();
        $user->role = 'superadmin';
        $user->email = 'superadmin@example.com';
        $user->password = bcrypt('superadmin');
        $user->save();

        $user = new User();
        $user->name = 'Admin';
        $user->lastname = 'Admin';
        $user->phone = '3333333';
        $user->birthday = Carbon::parse('1999-12-31')->toDateString();
        $user->role = 'admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('admin');
        $user->save();
    }
}
