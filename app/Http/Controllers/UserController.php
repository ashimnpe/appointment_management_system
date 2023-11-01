<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('system.user.index', compact('users'));
    }

    public function create()
    {
        return view('system.user.create');
    }


    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('system.user.profile', ['users' => $users]);
    }


    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'status' => $request['status'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('user.index')->with('create', 'User Created Successfully');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('system.user.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
        ]);
        return redirect()->route('user.index')->with('update', 'User Updated Successfully');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('delete', 'User deleted successfully');
    }
}
