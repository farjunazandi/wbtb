<?php

namespace App\Http\Controllers;

use App\Models\LampiranFile;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengelolaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        if ($request->type == 'add') {
            $id_alternatif = Alternatif::where('id_user', $request->id_user)->orderBy('created_at', 'DESC')->first();
            $id_alt = $id_alternatif->id;
        } elseif ($request->type == 'edit') {
            $id_alt = $request->id_alternatif;
        }

        $validateData = $request->validate(['filePengelolaan' => 'required']);

        $validateData['id_alternatif'] = $id_alt;
        $validateData['keterangan'] = $request->keterangan;
        $validateData['file'] = $request->file('filePengelolaan')->store('alternatif-doc');
        $validateData['namaFile'] = $request->file('filePengelolaan')->getClientOriginalName();
        $validateData['kategori'] = '1';

        LampiranFile::create($validateData);

        if ($request->type == 'add') {
            $request->session()->forget('altAdd');
            $request->session()->put(['altAdd' => 'Pengelolaan', 'id_alternatif' => $id_alternatif]);
            return redirect('/admin/alternatifCreate')->with('success', 'Lampiran pengelolaan berhasil ditambahkan');
        } elseif ($request->type == 'edit') {
            $request->session()->forget('altEdit');
            $request->session()->put(['altEdit' => 'Pengelolaan']);
            return redirect('/admin/alternatif/' . $id_alt . '/edit')->with('success', 'Lampiran pengelolaan berhasil diubah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LampiranFile $lampiranFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LampiranFile $lampiranFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LampiranFile $lampiranFile)
    {
        if ($request->type == 'add') {
            $id_alternatif = Alternatif::where('id_user', $request->id_user)->orderBy('created_at', 'DESC')->first();
            $id_alt = $id_alternatif->id;
        } elseif ($request->type == 'edit') {
            $id_alt = $request->id;
        }

        if ($request->file('filePengelolaan')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validateData['file'] = $request->file('filePengelolaan')->store('alternatif-doc');
            $validateData['namaFile'] = $request->file('filePengelolaan')->getClientOriginalName();
        }
        $validateData['keterangan'] = $request->keterangan;

        LampiranFile::where('id', $request->id)->update($validateData);

        if ($request->type == 'add') {
            $request->session()->forget('altAdd');
            $request->session()->put(['altAdd' => 'Pengelolaan']);
            return redirect('/admin/alternatifCreate');
        } elseif ($request->type == 'edit') {
            $request->session()->forget('altEdit');
            $request->session()->put(['altEdit' => 'Pengelolaan']);
            return redirect('/admin/alternatif/' . $request->id_alternatif . '/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LampiranFile $lampiranFile, Request $request)
    {
        if ($request->oldFile) {
            Storage::delete($request->oldFile);
        }

        LampiranFile::destroy($request->id);

        if ($request->type == 'add') {
            $request->session()->forget('altAdd');
            $request->session()->put(['altAdd' => 'Pengelolaan']);
            return redirect('/admin/alternatifCreate');
        } elseif ($request->type == 'edit') {
            $request->session()->forget('altEdit');
            $request->session()->put(['altEdit' => 'Pengelolaan']);
            return redirect('/admin/alternatif/' . $request->id_alternatif . '/edit');
        }
    }
}
