<?php

namespace App\Http\Controllers;

use App\Models\LampiranFoto;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LampiranFotoController extends Controller
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

        $validateData = $request->validate(['foto' => 'required|image|file|max:1024']);

        $validateData['id_alternatif'] = $id_alt;
        $validateData['keterangan'] = $request->keterangan;
        $validateData['foto'] = $request->file('foto')->store('alternatif-images');

        LampiranFoto::create($validateData);

        if ($request->type == 'add') {
            $request->session()->forget('altAdd');
            $request->session()->put(['altAdd' => 'Foto_Video']);
            return redirect('/admin/alternatifCreate');
        } elseif ($request->type == 'edit') {
            $request->session()->forget('altEdit');
            $request->session()->put(['altEdit' => 'Foto_Video']);
            return redirect('/admin/alternatif/' . $id_alt . '/edit');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LampiranFoto $lampiranFoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LampiranFoto $lampiranFoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LampiranFoto $lampiranFoto)
    {
        $validateData = $request->validate(['foto' => 'image|file|max:1024']);

        if ($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['foto'] = $request->file('foto')->store('alternatif-images');
        }

        $validateData['keterangan'] = $request->keterangan;

        LampiranFoto::where('id', $request->id)->update($validateData);

        if ($request->type == 'add') {
            $request->session()->forget('altAdd');
            $request->session()->put(['altAdd' => 'Foto_Video']);
            return redirect('/admin/alternatifCreate');
        } elseif ($request->type == 'edit') {
            $request->session()->forget('altEdit');
            $request->session()->put(['altEdit' => 'Foto_Video']);
            return redirect('/admin/alternatif/' . $request->id_alternatif . '/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LampiranFoto $lampiranFoto, Request $request)
    {
        if ($request->oldImage) {
            Storage::delete($request->oldImage);
        }

        LampiranFoto::destroy($request->id);

        if ($request->type == 'add') {
            $request->session()->forget('altAdd');
            $request->session()->put(['altAdd' => 'Foto_Video']);
            return redirect('/admin/alternatifCreate');
        } elseif ($request->type == 'edit') {
            $request->session()->forget('altEdit');
            $request->session()->put(['altEdit' => 'Foto_Video']);
            return redirect('/admin/alternatif/' . $request->id_alternatif . '/edit');
        }
    }
}
