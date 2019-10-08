<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanyTableSeeder extends Seeder {
    public function run() {
        $company = new Company();
        $company->name = 'Empresa SAS';
        $company->address = 'Calle falsa 123';
        $company->phone = '5555555';
        $company->save();
    }
}
