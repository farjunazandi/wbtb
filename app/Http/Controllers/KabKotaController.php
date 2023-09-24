<?php

namespace App\Http\Controllers;

use App\Models\Kab_Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KabKotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kab_kotas = Kab_Kota::with(['provinsi'])->get();
        $provinsis = Provinsi::all();

        return view('admin/kab_kota', compact('kab_kotas', 'provinsis'));
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
        Kab_Kota::create(['id_provinsi' => $request->provinsi, 'nama' => $request->nama]);

        return redirect('/admin/kab_kota')->with('success', 'Data Kabupaten / Kota berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kab_Kota $kab_Kota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kab_Kota $kab_Kota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kab_Kota $kab_Kota)
    {
        Kab_Kota::where('id', $request->id)->update([
            'id_provinsi' => $request->provinsi,
            'nama' => $request->nama
        ]);

        return redirect('/admin/kab_kota')->with('success', 'Data Kabupaten / Kota berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kab_Kota $kab_Kota, Request $request)
    {
        Kab_Kota::destroy($request->id);

        return redirect('/admin/kab_kota')->with('success', 'Data Kabupaten / Kota berhasil dihapus!');
    }
}
