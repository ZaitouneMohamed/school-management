<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Classe::getData();
        return view('admin.class.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        Classe::create([
            'name' => $validatedData['name'],
            'created_by' => auth()->user()->id
        ]);
        return redirect()->route('admin.class.index')->with('success', 'Classe created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $class)
    {
        return view('admin.class.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classe $class)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $class->update([
            'name' => $validatedData['name'],
        ]);
        return redirect()->route('admin.class.index')->with('success', 'Classe updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $class)
    {
        $class->delete();
        return redirect()->route('admin.class.index')->with('success', 'Classe deleted successfully');
    }
}
