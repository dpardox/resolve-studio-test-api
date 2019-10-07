<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function index() {
        $users = User::orderBy('id','desc')->get();
        return response()->json($users);
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return response()->json($user);
    }

    public function show(User $user) {
        return response()->json($user);
    }

    public function edit(User $user) {
        //
    }

    public function update(Request $request, User $user) {
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return response()->json($user);
    }

    public function destroy(User $user) {
        $user->delete();
        return response()->json($user);
    }
}
