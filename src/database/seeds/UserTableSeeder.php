<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UserTableSeeder extends Seeder {
    public function run() {
        $user = new User();
        $user->name = 'Steven';
        $user->lastname = 'Pardo';
        $user->phone = '5555555';
        $user->birthday = Carbon::parse('1999-12-31')->toDateString();
        $user->email = 'dspardo6@gmail.com';
        $user->password = bcrypt('superadmin');
        $user->save();
    }
}
