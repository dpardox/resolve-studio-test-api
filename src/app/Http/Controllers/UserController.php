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
        // $user = new User();
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->password = bcrypt('superadmin');
        // $user->save();

        // $teacher = new Teacher;
        // $teacher->classroom()->associate($request->input('classroom'));
        // $teacher->duration = $request->input('duration');
        // $teacher->save();

        // $teacher->subjects()->attach($request->input('subjects'));

        // $user = new User;
        // $user->teacher()->associate($teacher);
        // $user->document()->associate($request->input('document_type'));
        // $user->document = $request->input('document');
        // $user->name = $request->input('name');
        // $user->lastname = $request->input('lastname');
        // $user->email = $request->input('email');
        // $user->password = bcrypt($request->input('password'));
        // $user->save();

        // return redirect()->route('teachers.index');
    }

    public function show(User $user) {
        //
    }

    public function edit(User $user) {
        //
    }

    public function update(Request $request, User $user) {
        //
    }

    public function destroy(User $user) {
        //
    }
}
