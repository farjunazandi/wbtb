<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class PersonController extends Controller
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

        Person::create([
            'id_alternatif' => $id_alt,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            'no_phone' => $request->no_phone,
            'email' => $request->email,
            'website' => $request->website,
            'category' => $request->category
        ]);

        if ($request->type == 'add') {
            $request->session()->forget('altAdd');
            $request->session()->put(['altAdd' => 'Person', 'id_alternatif' => $id_alternatif]);
            return redirect('/admin/alternatifCreate');
        } elseif ($request->type == 'edit') {
            $request->session()->forget('altEdit');
            $request->session()->put(['altEdit' => 'Person']);
            return redirect('/admin/alternatif/' . $id_alt . '/edit');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        Person::where('id', $request->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            'no_phone' => $request->no_phone,
            'email' => $request->email,
            'website' => $request->website
        ]);

        if ($request->type == 'add') {
            $request->session()->forget('altAdd');
            $request->session()->put('altAdd', 'Person');
            return redirect('/admin/alternatifCreate');
        } elseif ($request->type == 'edit') {
            $request->session()->forget('altEdit');
            $request->session()->put('altEdit', 'Person');
            return redirect('/admin/alternatif/' . $request->id_alternatif . '/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person, Request $request)
    {
        Person::destroy($request->id);

        if ($request->type == 'add') {
            $request->session()->forget('altAdd');
            $request->session()->put('altAdd', 'Person');
            return redirect('/admin/alternatifCreate');
        } elseif ($request->type == 'edit') {
            $request->session()->forget('altEdit');
            $request->session()->put('altEdit', 'Person');
            return redirect('/admin/alternatif/' . $request->id_alternatif . '/edit');
        }
    }
}
