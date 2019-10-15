<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;

class CompanyController extends Controller {

    public function list() {
        $companies = Company::with('user')->orderBy('id','desc')->get();
        return response()->json($companies);
    }

    public function store(Request $request) {
        $company = new Company();
        $company->user()->associate($request->input('user'));
        $company->name = $request->input('name');
        $company->address = $request->input('address');
        $company->phone = $request->input('phone');
        $company->save();

        return response()->json($company);
    }

    public function show(Company $company) {
        return response()->json($company);
    }

    public function update(Request $request, Company $company) {
        $company->user()->associate($request->input('user'));
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

    public function admin(User $user) {
        $companies = User::with('companies')->find($user->id)->companies;
        return response()->json($companies);
    }
}
