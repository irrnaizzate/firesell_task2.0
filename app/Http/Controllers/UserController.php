<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class UserController extends Controller
{
    public function index()
    {
        $users = Users::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $users = new Users([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => md5($request->post('password')),
            'role' => $request->post('role')
        ]);
        $users->save();

        return response()->json('Successfully added!');
    }

    public function show($id)
    {
        $users = Users::find($id);
        return response()->json($users);
    }

    // public function edit($id)
    // {
    //     $user = Users::find($id);
    //     return response()->json($user);
    // }

    public function update(Request $request, $id)
    {
        $users = Users::find($id);
        $users->name = $request->post('name');
        $users->email = $request->post('email');
       //$users->password = md5($request->post('password'));
        $users->role = $request->post('role');
        $users->save();

        return response()->json('Successfully updated!');
    }

    public function destroy($id)
    {
        $users = Users::find($id);
        $users->delete();

        return response()->json('Successfully deleted!');
    }
}
