<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert as Alert;

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


    public function store(Request $request)
    {
        $validatedData = $request->all();

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image');
        $fileName = uniqid() . '_' . $imagePath->getClientOriginalName();
        $imagePath->storeAs('public/img', $fileName);
        $image = 'storage/img/' . $fileName;
    }

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
            'status' => $validatedData['status'],
            'image' => $image ?? null,
            'password' => Hash::make($validatedData['password']),
        ]);

        Alert::success('Success!','User Created Successfully');
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
        Alert::success('Edit!','User Updated Successfully');
        return redirect()->route('user.index')->with('update', 'User Updated Successfully');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Alert::success('Delete!','User Deleted Successfully');
        return redirect()->route('user.index')->with('delete', 'User deleted successfully');
    }
}
