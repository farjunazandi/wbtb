<?php

namespace App\Http\Controllers;

use App\Models\LampiranVideo;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class LampiranVideoController extends Controller
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

        LampiranVideo::create([
            'id_alternatif' => $id_alt,
            'keterangan' => $request->keterangan,
            'url' => $request->url
        ]);

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
    public function show(LampiranVideo $lampiranVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LampiranVideo $lampiranVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LampiranVideo $lampiranVideo)
    {
        LampiranVideo::where('id', $request->id)->update([
            'keterangan' => $request->keterangan,
            'url' => $request->url
        ]);

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
    public function destroy(LampiranVideo $lampiranVideo, Request $request)
    {
        LampiranVideo::destroy($request->id);

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
