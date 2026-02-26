<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index() {
        $users = User::with('role')->latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }
    public function edit($id) {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }
    public function update($id, Request $request) {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
        ]);
        $user->update($data);
        return redirect()->route('admin.users.index')->with('success', 'User updated!');
    }
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted.');
    }
}
