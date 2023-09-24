<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Ranking;
use Illuminate\Http\Request;
use PDF;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rankings = Ranking::orderBy('nilai_akhir', 'DESC')->get();
        $alternatifs = Alternatif::join('rankings', 'alternatifs.id', '=', 'rankings.id_alternatif')->orderBy('rankings.nilai_akhir', 'DESC')->get();

        return view('admin/ranking', compact('rankings', 'alternatifs'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ranking $ranking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ranking $ranking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ranking $ranking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ranking $ranking)
    {
        //
    }

    public function downloadPDF()
    {
        $alternatifs = Ranking::orderBy('nilai_akhir', 'DESC')->get();
           
        $pdf = PDF::loadView('admin/ranking_wbtb', compact('alternatifs'));
     
        return $pdf->setPaper('a4', 'landscape')->stream();
    }
}
