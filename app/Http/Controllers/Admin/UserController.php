<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Request as FacadesRequest;

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

    public function Edit($id)
    {
        $user = User::findOrFail($id);
        return view('Dashboard.users.edit', compact('user'));
    }

    public function Update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function Delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
