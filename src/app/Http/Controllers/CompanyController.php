<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller {
    public function index() {
        $companies = Company::orderBy('id','desc')->get();
        return response()->json($companies);
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        $company = new Company();
        $company->name = $request->input('name');
        $company->address = $request->input('address');
        $company->phone = $request->input('phone');
        $company->save();

        return response()->json($company);
    }

    public function show(Company $company) {
        return response()->json($company);
    }

    public function edit(Company $company) {
        //
    }

    public function update(Request $request, Company $company) {
        $company->name = $request->input('name');
        $company->address = $request->input('address');
        $company->phone = $request->input('phone');
        $company->save();

        return response()->json($company);
    }

    public function destroy(Company $company) {
        $company->delete();
        return response()->json($company);
    }
}
