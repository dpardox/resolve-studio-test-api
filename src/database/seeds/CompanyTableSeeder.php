<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\User;

class CompanyTableSeeder extends Seeder {
    public function run() {
        $company = new Company();
        $company->user()->associate(User::where('role', 'admin')->first());
        $company->name = 'Empresa SAS';
        $company->address = 'Calle falsa 123';
        $company->phone = '5555555';
        $company->save();
    }
}
