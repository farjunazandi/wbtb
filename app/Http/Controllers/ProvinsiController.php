<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/provinsi', [
            'provinsis' => Provinsi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Provinsi::create([
            'nama' => $request->nama
        ]);

        return redirect('/admin/provinsi')->with('success', 'Data provinsi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Provinsi $provinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provinsi $provinsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provinsi $provinsi)
    {
        Provinsi::where('id', $request->id)->update(['nama' => $request->nama]);

        return redirect('/admin/provinsi')->with('success', 'Data provinsi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provinsi $provinsi, Request $request)
    {
        Provinsi::destroy($request->id);

        return redirect('/admin/provinsi')->with('success', 'Data provinsi berhasil dihapus!');
    }
}
