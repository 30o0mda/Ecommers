<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;





class UserController extends Controller
{
    public function User()
    {
        $users = User::latest()->get();
        return view('Dashboard.users.index', compact('users'));
    }

    public function Show($id)
    {
        $user = User::findOrFail($id);
        return view('Dashboard.users.show', compact('user'));
    }

    public function EditUser($id)
    {
        $user = User::findOrFail($id);
        return view('Dashboard.users.edituser', compact('user'));
    }

    public function UpdateUser(Request $request, $id)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'nullable',
        'role' => 'required',
        'is_blocked' => 'required|boolean',
    ]);
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function DeleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
