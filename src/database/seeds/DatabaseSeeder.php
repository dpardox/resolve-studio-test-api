<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run() {
        // factory(App\User::class)->create();
        $this->call(UserTableSeeder::class);
    }
}
