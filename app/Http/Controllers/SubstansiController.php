<?php

namespace App\Http\Controllers;

use App\Models\Substansi;
use Illuminate\Http\Request;

class SubstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/substansi', [
            'substansis' => Substansi::all()
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
        Substansi::create([
            'sequence' => $request->sequence,
            'nama' => $request->nama,
            'aktif' => 1,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/admin/substansi')->with('success', 'Data substansi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Substansi $substansi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Substansi $substansi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Substansi $substansi)
    {
        Substansi::where('id', $request->id)->update([
            'sequence' => $request->sequence,
            'nama' => $request->nama,
            'aktif' => $request->aktif,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/admin/substansi')->with('success', 'Data substansi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Substansi $substansi, Request $request)
    {
        Substansi::destroy($request->id);

        return redirect('/admin/substansi')->with('success', 'Data substansi berhasil dihapus!');
    }
}
