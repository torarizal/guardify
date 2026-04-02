<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'petugas')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'no_hp' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petugas'
        ]);

        Petugas::create([
            'user_id' => $user->id,
            'no_hp' => $request->no_hp
        ]);


        return redirect()->route('users.index');
    }

    public function edit(user $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        if ($user->petugas) {
            $user->petugas->update([
                'no_hp' => $request->no_hp
            ]);
        }

        return redirect()->route('users.index');
    }

    public function destroy(user $user)
    {

        if ($user->petugas) {
            $user->petugas->delete();
        }

        $user->delete();

        return redirect()->route('users.index');
    }
}
