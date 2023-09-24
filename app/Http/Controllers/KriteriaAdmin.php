<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;


class KriteriaAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias = Kriteria::all();
        $sumbobot = collect($kriterias)->sum('bobot_kriteria');

        return view('admin/kriteria_admin', compact('kriterias', 'sumbobot'));
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
        $request->validate([
            'nama_kriteria' => 'required|unique:kriterias',
            'kode_kriteria' => 'required|unique:kriterias'
        ]);

        // Kriteria::create([$validateData]);

        Kriteria::create([
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria
        ]);

        return redirect('/admin/kriteria')->with('success', 'Data kriteria berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $Kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $Kriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kriteria $Kriteria)
    {
        // return $a = [$request->id, $request->kode_kriteria, $request->nama_kriteria, $request->bobot_kriteria];

        Kriteria::where('id', $request->id)->update([
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'bobot_kriteria' => $request->bobot_kriteria
        ]);

        return redirect('/admin/kriteria')->with('success', 'Data kriteria berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $Kriteria, Request $request)
    {
        Kriteria::destroy($request->id);

        return redirect('/admin/kriteria')->with('success', 'Data kriteria berhasil dihapus!');
    }

    public function ubahBobot(Request $request)
    {
        $count = count($request->id_kriteria);

        $sum = 0;
        for ($a = 0; $a < $count; $a++) {
            $cek = $request->bobot_kriteria[$a];
            if ($cek < 0 || $cek > 100) {
                return redirect('/admin/kriteria')->with('error', 'NIlai bobot tidak boleh kurang dari 0 dan lebih dari 100!');
            }
            $sum += $cek;
        }

        if ($sum != 100) {
            return redirect('/admin/kriteria')->with('error', 'Jumlah bobot tidak sama dengan 100!');
        }

        for ($i = 0; $i < $count; $i++) {
            $id = $request->id_kriteria[$i];
            $bobot = $request->bobot_kriteria[$i];
            Kriteria::where('id', $id)->update(['bobot_kriteria' => $bobot]);
        }

        return redirect('/admin/kriteria')->with('success', 'Bobot kriteria berhasil diubah!');
    }
}
