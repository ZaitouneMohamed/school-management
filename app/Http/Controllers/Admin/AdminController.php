<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::getData(1);
        return view('admin.admin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:249',
            'email' => 'required|email|unique:users,email|max:249',
            'password' => 'required|max:249'
        ]);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 1
        ]);
        return redirect()->route('admin.admin.index')->with([
            'message' => 'Admin created successfully',
        ]);
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
    public function edit(User $admin)
    {
        return view('admin.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin)
    {
        $data = $request->validate([
            'name' => 'required|max:249',
            'email' => 'required|email|max:249',
        ]);
        $admin->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
        return redirect()->route('admin.admin.index')->with([
            'message' => 'Admin updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admin.admin.index')->with([
            'message' => 'Admin deleted successfully',
        ]);
    }
}
