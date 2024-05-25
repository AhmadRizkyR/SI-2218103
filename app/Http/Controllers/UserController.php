<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(20);
        $test = Auth::user()->name;

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ],[
            'name' => [
                'required' => 'Harap isi nama user'
            ],
            'email' => [
                'required' => 'Harap isi email user',
                'unique' => 'Email sudah digunakan oleh pengguna lain'
            ],
            'password' => [
                'required' => 'Harap isi password user',
                'min' => 'Password minimal 8 digit'
            ]
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id)]
        ],[
            'name' => [
                'required' => 'Harap isi nama user'
            ],
            'email' => [
                'required' => 'Harap isi email user',
                'unique' => 'Email sudah digunakan oleh pengguna lain'
            ]
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password) ?? $user->password,
        ]);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        toast('Data berhasil dihapus', 'success');
        return redirect()->route('users.index');
    }
}
