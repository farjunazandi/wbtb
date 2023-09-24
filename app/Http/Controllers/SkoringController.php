<?php

namespace App\Http\Controllers;

use App\Models\Skoring;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\LampiranFile;
use App\Models\LampiranFoto;
use App\Models\LampiranVideo;
use App\Models\Normalisasi;
use App\Models\Pembobotan;
use App\Models\Person;
use App\Models\Ranking;
use App\Models\Substansi;
use App\Models\SubstansiAlternatif;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class SkoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatifs = Alternatif::all();

        return view('admin/skoring', compact('alternatifs'));
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
    public function show(Skoring $skoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skoring $skoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skoring $skoring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skoring $skoring)
    {
        //
    }

    public function skoring()
    {
        DB::table('rankings')->truncate();
        DB::table('pembobotans')->truncate();
        DB::table('normalisasis')->truncate();
        DB::table('skorings')->truncate();

        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();

        $countAlt = count($alternatif);
        $countKrt = count($kriteria);

        for ($i = 0; $i < $countAlt; $i++) {
            $j = 1;

            //Menghitung Skor Formulir
            if ($alternatif[$i]->sejarah_singkat != null) {
                $j += 1;
            }

            if ($alternatif[$i]->provinsi != null && $alternatif[$i]->kab_kota != null && $alternatif[$i]->kecamatan != null && $alternatif[$i]->kelurahan != null && $alternatif[$i]->latitude != null && $alternatif[$i]->longitude != null && $alternatif[$i]->alamat_penting != null && $alternatif[$i]->kodepos != null) {
                $j += 1;
            }

            if ($alternatif[$i]->deskripsi != null) {
                $j += 1;
            }

            $promosi = $alternatif[$i]->promosi1 + $alternatif[$i]->promosi2 + $alternatif[$i]->promosi3 + $alternatif[$i]->promosi4 + $alternatif[$i]->promosi5 + $alternatif[$i]->promosi6;

            $dokumentasi = $alternatif[$i]->dokumentasi1 + $alternatif[$i]->dokumentasi2 + $alternatif[$i]->dokumentasi3 + $alternatif[$i]->dokumentasi4 + $alternatif[$i]->dokumentasi5 + $alternatif[$i]->dokumentasi6 + $alternatif[$i]->dokumentasi7 + $alternatif[$i]->dokumentasi8 + $alternatif[$i]->dokumentasi9 + $alternatif[$i]->dokumentasi10 + $alternatif[$i]->dokumentasi11 + $alternatif[$i]->dokumentasi12 + $alternatif[$i]->dokumentasi13 + $alternatif[$i]->dokumentasi14 + $alternatif[$i]->dokumentasi15 + $alternatif[$i]->dokumentasi16;

            if ($alternatif[$i]->referensi != null) {
                $j += 1;
            }

            $pj = Person::where('id_alternatif', $alternatif[$i]->id)
                ->where('category', '1')
                ->get();
            if (count($pj) > 0) {
                $j += 1;
            }

            $maestro = Person::where('id_alternatif', $alternatif[$i]->id)
                ->where('category', '2')
                ->get();
            if (count($maestro) > 0) {
                $j += 1;
            }

            if ($promosi > 0) {
                $skorPromosi = 1;
            } else {
                $skorPromosi = 0;
            }

            if ($dokumentasi > 0) {
                $skorDokumentasi = 1;
            } else {
                $skorDokumentasi = 0;
            }

            $formulir = $j + $skorPromosi + $skorDokumentasi;
            if ($formulir == 9) {
                $skorFormulir = 10;
            } elseif ($formulir < 9 && $formulir != 0) {
                $skorFormulir = 5;
            } elseif ($formulir == 0) {
                $skorFormulir = 1;
            }
            //End 

            //Menghitung skor Foto 
            $foto = LampiranFoto::where('id_alternatif', $alternatif[$i]->id)->get();
            if (count($foto) > 0) {
                $skorFoto = 10;
            } else {
                $skorFoto = 1;
            }
            //End

            //Menghitung skor Video 
            $video = LampiranVideo::where('id_alternatif', $alternatif[$i]->id)->get();
            if (count($video) > 0) {
                $skorVideo = 10;
            } else {
                $skorVideo = 1;
            }
            //End

            //Menghitung skor Kajian 
            $kajian = LampiranFile::where('id_alternatif', $alternatif[$i]->id)->where('kategori', '0')->get();
            if (count($kajian) > 0) {
                $skorKajian = 10;
            } else {
                $skorKajian = 1;
            }
            //End

            //Menghitung skor Pengelolaan 
            $pengelolaan = LampiranFile::where('id_alternatif', $alternatif[$i]->id)->where('kategori', '1')->get();
            if (count($pengelolaan) > 0) {
                $skorPengelolaan = 10;
            } else {
                $skorPengelolaan = 1;
            }
            //End

            //Menghitung skor Substansi 
            $substansi = SubstansiAlternatif::join('substansis', 'substansis.id', '=', 'substansi_alternatifs.id_substansi')->where('id_alternatif', $alternatif[$i]->id)->where('status', 1)->get();
            $subs = count($substansi);
            if ($subs >= 10) {
                $skorSubstansi = 10;
            } elseif ($subs < 10 && $subs != 0) {
                $skorSubstansi = 5;
            } elseif ($subs == 0) {
                $skorSubstansi = 1;
            }
            //End

            for ($k = 0; $k < $countKrt; $k++) {
                if ($kriteria[$k]->kode_kriteria == "C1") {
                    $skor = $skorFormulir;
                } elseif ($kriteria[$k]->kode_kriteria == "C2") {
                    $skor = $skorFoto;
                } elseif ($kriteria[$k]->kode_kriteria == "C3") {
                    $skor = $skorVideo;
                } elseif ($kriteria[$k]->kode_kriteria == "C4") {
                    $skor = $skorKajian;
                } elseif ($kriteria[$k]->kode_kriteria == "C5") {
                    $skor = $skorPengelolaan;
                } elseif ($kriteria[$k]->kode_kriteria == "C6") {
                    $skor = $skorSubstansi;
                }

                Skoring::create([
                    'id_alternatif' => $alternatif[$i]->id,
                    'id_kriteria' => $kriteria[$k]->id,
                    'skor' => $skor
                ]);
            }
        }
        return $this->normalisasi();
    }

    public function normalisasi()
    {
        $skoring = Skoring::all();
        $count = count($skoring);
        $max = $skoring->max('skor');
        $min = $skoring->min('skor');

        for ($i = 0; $i < $count; $i++) {

            $normalisasi = ($skoring[$i]->skor - $min) / ($max - $min);

            Normalisasi::create([
                'id_alternatif' => $skoring[$i]->id_alternatif,
                'id_kriteria' => $skoring[$i]->id_kriteria,
                'normalisasi' => $normalisasi
            ]);
        }
        return $this->pembobotan();
    }

    public function pembobotan()
    {
        $normalisasi = Normalisasi::all();

        $count = count($normalisasi);
        for ($i = 0; $i < $count; $i++) {
            $kriteria = Kriteria::where('id', $normalisasi[$i]->id_kriteria)->first();

            $bobot = $normalisasi[$i]->normalisasi * ($kriteria->bobot_kriteria / 100);

            Pembobotan::create([
                'id_alternatif' => $normalisasi[$i]->id_alternatif,
                'id_kriteria' => $normalisasi[$i]->id_kriteria,
                'bobot' => $bobot
            ]);
        }
        return $this->ranking();
    }

    public function ranking()
    {
        $bobot = Pembobotan::select("id_alternatif", DB::raw('SUM(bobot) as nilai_akhir'))
            ->groupBy("id_alternatif")
            ->get();

        $count = count($bobot);
        for ($i = 0; $i < $count; $i++) {
            if ($bobot[$i]->nilai_akhir == 1) {
                $keterangan = "Direkomendasi";
            } else {
                $keterangan = "Data dukung tidak lengkap";
            }

            Ranking::create([
                'id_alternatif' => $bobot[$i]->id_alternatif,
                'nilai_akhir' => $bobot[$i]->nilai_akhir,
                'keterangan' => $keterangan
            ]);
        }

        return redirect('/admin/skoring');
    }
}
