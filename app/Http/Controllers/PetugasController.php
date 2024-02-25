<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // assuming you have a User model
use Illuminate\Support\Facades\Hash;
class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        $data = User::where('role', 'petugas')->get();
        return view('petugas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('petugas.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $petugas = new User;
        $petugas->name = $request->name;
        $petugas->email = $request->email;
        $petugas->role = $request->role;
        $petugas->password = Hash::make($request->password);
        $petugas->save();
        return redirect('petugas')->with('success', 'Penambahan Data Barang Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('petugas.edit')->with([
            'petugas' => User::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $petugas = User::findOrFail($id);
        $petugas->name = $request->name;
        $petugas->email = $request->email;
        $petugas->role = $request->role;
        $petugas->password = Hash::make($request->password);
        $petugas->save();
        
        return redirect('petugas')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
