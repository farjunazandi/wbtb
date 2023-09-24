<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\LampiranFile;
use App\Models\LampiranFoto;
use App\Models\LampiranVideo;
use App\Models\Person;
use App\Models\Provinsi;
use App\Models\Kab_Kota;
use App\Models\Substansi;
use App\Models\SubstansiAlternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->role == 'Admin') {
            $alternatifs = Alternatif::all();
        } else {
            $alternatifs = Alternatif::where('id_user', $user->id)->get();
        }

        session()->forget(['altAdd', 'id_alternatif']);

        return view('admin/alternatif_admin', ['alternatifs' => $alternatifs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $provinsis = Provinsi::all();
        $kab_kotas = Kab_Kota::all();

        //$request->session()->put('altAdd', 'Formulir');
        if ($request->session()->has('altAdd')) {
            $request->session()->get('altAdd');
        } else {
            $request->session()->put('altAdd', 'Formulir');
        }

        $id_alternatif = $request->session()->get('id_alternatif');

        if ($request->session()->has('id_alternatif')) {
            $id = $id_alternatif->id;
        } else {
            $id = 0;
        }

        $pelapors = Person::where('id_alternatif', $id)
            ->where('category', '0')
            ->get();
        $pjs = Person::where('id_alternatif', $id)
            ->where('category', '1')
            ->get();
        $maestros = Person::where('id_alternatif', $id)
            ->where('category', '2')
            ->get();

        $fotos = LampiranFoto::where('id_alternatif', $id)->get();
        $videos = LampiranVideo::where('id_alternatif', $id)->get();

        $kajian = LampiranFile::where('id_alternatif', $id)->where('kategori', '0')->first();
        $pengelolaan = LampiranFile::where('id_alternatif', $id)->where('kategori', '1')->first();

        $substansis = SubstansiAlternatif::where('id_alternatif', $id)->get();

        return view('admin/alternatif_adminCreate', compact('pelapors', 'pjs', 'maestros', 'fotos', 'videos', 'kajian', 'pengelolaan', 'provinsis', 'kab_kotas', 'substansis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->has('kategori1')) {
            $kategori1 = 1;
        } else {
            $kategori1 = 0;
        }
        if ($request->has('kategori2')) {
            $kategori2 = 1;
        } else {
            $kategori2 = 0;
        }
        if ($request->has('kategori3')) {
            $kategori3 = 1;
        } else {
            $kategori3 = 0;
        }
        if ($request->has('kategori4')) {
            $kategori4 = 1;
        } else {
            $kategori4 = 0;
        }
        if ($request->has('kategori5')) {
            $kategori5 = 1;
        } else {
            $kategori5 = 0;
        }

        if ($request->has('promosi1')) {
            $promosi1 = 1;
        } else {
            $promosi1 = 0;
        }
        if ($request->has('promosi2')) {
            $promosi2 = 1;
        } else {
            $promosi2 = 0;
        }
        if ($request->has('promosi3')) {
            $promosi3 = 1;
        } else {
            $promosi3 = 0;
        }
        if ($request->has('promosi4')) {
            $promosi4 = 1;
        } else {
            $promosi4 = 0;
        }
        if ($request->has('promosi5')) {
            $promosi5 = 1;
        } else {
            $promosi5 = 0;
        }
        if ($request->has('promosi6')) {
            $promosi6 = 1;
        } else {
            $promosi6 = 0;
        }

        if ($request->has('dokumentasi1')) {
            $dokumentasi1 = 1;
        } else {
            $dokumentasi1 = 0;
        }
        if ($request->has('dokumentasi2')) {
            $dokumentasi2 = 1;
        } else {
            $dokumentasi2 = 0;
        }
        if ($request->has('dokumentasi3')) {
            $dokumentasi3 = 1;
        } else {
            $dokumentasi3 = 0;
        }
        if ($request->has('dokumentasi4')) {
            $dokumentasi4 = 1;
        } else {
            $dokumentasi4 = 0;
        }
        if ($request->has('dokumentasi5')) {
            $dokumentasi5 = 1;
        } else {
            $dokumentasi5 = 0;
        }
        if ($request->has('dokumentasi6')) {
            $dokumentasi6 = 1;
        } else {
            $dokumentasi6 = 0;
        }
        if ($request->has('dokumentasi7')) {
            $dokumentasi7 = 1;
        } else {
            $dokumentasi7 = 0;
        }
        if ($request->has('dokumentasi8')) {
            $dokumentasi8 = 1;
        } else {
            $dokumentasi8 = 0;
        }
        if ($request->has('dokumentasi9')) {
            $dokumentasi9 = 1;
        } else {
            $dokumentasi9 = 0;
        }
        if ($request->has('dokumentasi10')) {
            $dokumentasi10 = 1;
        } else {
            $dokumentasi10 = 0;
        }
        if ($request->has('dokumentasi11')) {
            $dokumentasi11 = 1;
        } else {
            $dokumentasi11 = 0;
        }
        if ($request->has('dokumentasi12')) {
            $dokumentasi12 = 1;
        } else {
            $dokumentasi12 = 0;
        }
        if ($request->has('dokumentasi13')) {
            $dokumentasi13 = 1;
        } else {
            $dokumentasi13 = 0;
        }
        if ($request->has('dokumentasi14')) {
            $dokumentasi14 = 1;
        } else {
            $dokumentasi14 = 0;
        }
        if ($request->has('dokumentasi15')) {
            $dokumentasi15 = 1;
        } else {
            $dokumentasi15 = 0;
        }
        if ($request->has('dokumentasi16')) {
            $dokumentasi16 = 1;
        } else {
            $dokumentasi16 = 0;
        }

        Alternatif::create([
            'id_user' => $request->id_user,
            'tahun' => $request->tahun,
            'nomor' => $request->nomor,
            'nama' => $request->nama,
            'nama_lain' => $request->nama_lain,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'persetujuan_pencatatan' => $request->persetujuan_pencatatan,
            'sejarah_singkat' => $request->sejarah_singkat,
            'provinsi' => $request->provinsi,
            'kab_kota' => $request->kab_kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'alamat_penting' => $request->alamat_penting,
            'kodepos' => $request->kodepos,
            'kategori1' => $kategori1,
            'kategori2' => $kategori2,
            'kategori3' => $kategori3,
            'kategori4' => $kategori4,
            'kategori5' => $kategori5,
            'deskripsi' => $request->deskripsi,
            'kondisi' => $request->kondisi,
            'promosi1' => $promosi1,
            'promosi2' => $promosi2,
            'promosi3' => $promosi3,
            'promosi4' => $promosi4,
            'promosi5' => $promosi5,
            'promosi6' => $promosi6,
            'best_practices' => $request->best_practices,
            'dokumentasi1' => $dokumentasi1,
            'dokumentasi2' => $dokumentasi2,
            'dokumentasi3' => $dokumentasi3,
            'dokumentasi4' => $dokumentasi4,
            'dokumentasi5' => $dokumentasi5,
            'dokumentasi6' => $dokumentasi6,
            'dokumentasi7' => $dokumentasi7,
            'dokumentasi8' => $dokumentasi8,
            'dokumentasi9' => $dokumentasi9,
            'dokumentasi10' => $dokumentasi10,
            'dokumentasi11' => $dokumentasi11,
            'dokumentasi12' => $dokumentasi12,
            'dokumentasi13' => $dokumentasi13,
            'dokumentasi14' => $dokumentasi14,
            'dokumentasi15' => $dokumentasi15,
            'dokumentasi16' => $dokumentasi16,
            'referensi' => $request->referensi,
            'nama_domain' => $request->nama_domain,
            'nama_pengelola_website' => $request->nama_pengelola_website,
            'alamat_pengelola_website' => $request->alamat_pengelola_website,
            'kodepos_pengelola_website' => $request->kodepos_pengelola_website
        ]);

        return $this->createSubstansi($request);
    }

    public function createSubstansi(Request $request)
    {
        $id_alternatif = Alternatif::where('id_user', $request->id_user)->orderBy('created_at', 'DESC')->first();

        $substansis = Substansi::all();

        foreach ($substansis as $key => $id_substansi) {
            SubstansiAlternatif::create([
                'id_alternatif' => $id_alternatif->id,
                'id_substansi' => $id_substansi->id,
                'status' => 0
            ]);
        }

        $request->session()->forget('altAdd');
        $request->session()->put(['altAdd' => 'Person', 'id_alternatif' => $id_alternatif]);

        return redirect('/admin/alternatifCreate');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatif $alternatif)
    {
        $pelapors = Person::where('id_alternatif', $alternatif->id)
            ->where('category', '0')
            ->get();
        $pjs = Person::where('id_alternatif', $alternatif->id)
            ->where('category', '1')
            ->get();
        $maestros = Person::where('id_alternatif', $alternatif->id)
            ->where('category', '2')
            ->get();

        $fotos = LampiranFoto::where('id_alternatif', $alternatif->id)->get();
        $videos = LampiranVideo::where('id_alternatif', $alternatif->id)->get();

        $kajian = LampiranFile::where('id_alternatif', $alternatif->id)->where('kategori', '0')->first();
        $pengelolaan = LampiranFile::where('id_alternatif', $alternatif->id)->where('kategori', '1')->first();

        $substansis = SubstansiAlternatif::where('id_alternatif', $alternatif->id)->get();

        $details = Alternatif::where('id', $alternatif->id)->first();
        return view('admin/alternatifDetail_admin', compact('details', 'pelapors', 'pjs', 'maestros', 'fotos', 'videos', 'kajian', 'pengelolaan', 'substansis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternatif $alternatif, Request $request)
    {
        if ($request->session()->has('altEdit')) {
            $request->session()->get('altEdit');
        } else {
            $request->session()->put('altEdit', 'Formulir');
        }

        $pelapors = Person::where('id_alternatif', $alternatif->id)
            ->where('category', '0')
            ->get();
        $pjs = Person::where('id_alternatif', $alternatif->id)
            ->where('category', '1')
            ->get();
        $maestros = Person::where('id_alternatif', $alternatif->id)
            ->where('category', '2')
            ->get();

        $fotos = LampiranFoto::where('id_alternatif', $alternatif->id)->get();
        $videos = LampiranVideo::where('id_alternatif', $alternatif->id)->get();

        $kajian = LampiranFile::where('id_alternatif', $alternatif->id)->where('kategori', '0')->first();
        $pengelolaan = LampiranFile::where('id_alternatif', $alternatif->id)->where('kategori', '1')->first();

        $provinsis = Provinsi::all();
        $kab_kotas = Kab_Kota::all();

        $substansis = SubstansiAlternatif::where('id_alternatif', $alternatif->id)->get();

        $details = Alternatif::where('id', $alternatif->id)->first();
        return view('admin/alternatifEdit_admin', compact('details', 'pelapors', 'pjs', 'maestros', 'fotos', 'videos', 'kajian', 'pengelolaan', 'provinsis', 'kab_kotas', 'substansis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        if ($request->has('kategori1')) {
            $kategori1 = 1;
        } else {
            $kategori1 = 0;
        }
        if ($request->has('kategori2')) {
            $kategori2 = 1;
        } else {
            $kategori2 = 0;
        }
        if ($request->has('kategori3')) {
            $kategori3 = 1;
        } else {
            $kategori3 = 0;
        }
        if ($request->has('kategori4')) {
            $kategori4 = 1;
        } else {
            $kategori4 = 0;
        }
        if ($request->has('kategori5')) {
            $kategori5 = 1;
        } else {
            $kategori5 = 0;
        }

        if ($request->has('promosi1')) {
            $promosi1 = 1;
        } else {
            $promosi1 = 0;
        }
        if ($request->has('promosi2')) {
            $promosi2 = 1;
        } else {
            $promosi2 = 0;
        }
        if ($request->has('promosi3')) {
            $promosi3 = 1;
        } else {
            $promosi3 = 0;
        }
        if ($request->has('promosi4')) {
            $promosi4 = 1;
        } else {
            $promosi4 = 0;
        }
        if ($request->has('promosi5')) {
            $promosi5 = 1;
        } else {
            $promosi5 = 0;
        }
        if ($request->has('promosi6')) {
            $promosi6 = 1;
        } else {
            $promosi6 = 0;
        }

        if ($request->has('dokumentasi1')) {
            $dokumentasi1 = 1;
        } else {
            $dokumentasi1 = 0;
        }
        if ($request->has('dokumentasi2')) {
            $dokumentasi2 = 1;
        } else {
            $dokumentasi2 = 0;
        }
        if ($request->has('dokumentasi3')) {
            $dokumentasi3 = 1;
        } else {
            $dokumentasi3 = 0;
        }
        if ($request->has('dokumentasi4')) {
            $dokumentasi4 = 1;
        } else {
            $dokumentasi4 = 0;
        }
        if ($request->has('dokumentasi5')) {
            $dokumentasi5 = 1;
        } else {
            $dokumentasi5 = 0;
        }
        if ($request->has('dokumentasi6')) {
            $dokumentasi6 = 1;
        } else {
            $dokumentasi6 = 0;
        }
        if ($request->has('dokumentasi7')) {
            $dokumentasi7 = 1;
        } else {
            $dokumentasi7 = 0;
        }
        if ($request->has('dokumentasi8')) {
            $dokumentasi8 = 1;
        } else {
            $dokumentasi8 = 0;
        }
        if ($request->has('dokumentasi9')) {
            $dokumentasi9 = 1;
        } else {
            $dokumentasi9 = 0;
        }
        if ($request->has('dokumentasi10')) {
            $dokumentasi10 = 1;
        } else {
            $dokumentasi10 = 0;
        }
        if ($request->has('dokumentasi11')) {
            $dokumentasi11 = 1;
        } else {
            $dokumentasi11 = 0;
        }
        if ($request->has('dokumentasi12')) {
            $dokumentasi12 = 1;
        } else {
            $dokumentasi12 = 0;
        }
        if ($request->has('dokumentasi13')) {
            $dokumentasi13 = 1;
        } else {
            $dokumentasi13 = 0;
        }
        if ($request->has('dokumentasi14')) {
            $dokumentasi14 = 1;
        } else {
            $dokumentasi14 = 0;
        }
        if ($request->has('dokumentasi15')) {
            $dokumentasi15 = 1;
        } else {
            $dokumentasi15 = 0;
        }
        if ($request->has('dokumentasi16')) {
            $dokumentasi16 = 1;
        } else {
            $dokumentasi16 = 0;
        }

        Alternatif::where('id', $request->id)->update([
            'id_user' => $request->id_user,
            'tahun' => $request->tahun,
            'nomor' => $request->nomor,
            'nama' => $request->nama,
            'nama_lain' => $request->nama_lain,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'persetujuan_pencatatan' => $request->persetujuan_pencatatan,
            'sejarah_singkat' => $request->sejarah_singkat,
            'provinsi' => $request->provinsi,
            'kab_kota' => $request->kab_kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'alamat_penting' => $request->alamat_penting,
            'kodepos' => $request->kodepos,
            'kategori1' => $kategori1,
            'kategori2' => $kategori2,
            'kategori3' => $kategori3,
            'kategori4' => $kategori4,
            'kategori5' => $kategori5,
            'deskripsi' => $request->deskripsi,
            'kondisi' => $request->kondisi,
            'promosi1' => $promosi1,
            'promosi2' => $promosi2,
            'promosi3' => $promosi3,
            'promosi4' => $promosi4,
            'promosi5' => $promosi5,
            'promosi6' => $promosi6,
            'best_practices' => $request->best_practices,
            'dokumentasi1' => $dokumentasi1,
            'dokumentasi2' => $dokumentasi2,
            'dokumentasi3' => $dokumentasi3,
            'dokumentasi4' => $dokumentasi4,
            'dokumentasi5' => $dokumentasi5,
            'dokumentasi6' => $dokumentasi6,
            'dokumentasi7' => $dokumentasi7,
            'dokumentasi8' => $dokumentasi8,
            'dokumentasi9' => $dokumentasi9,
            'dokumentasi10' => $dokumentasi10,
            'dokumentasi11' => $dokumentasi11,
            'dokumentasi12' => $dokumentasi12,
            'dokumentasi13' => $dokumentasi13,
            'dokumentasi14' => $dokumentasi14,
            'dokumentasi15' => $dokumentasi15,
            'dokumentasi16' => $dokumentasi16,
            'referensi' => $request->referensi,
            'nama_domain' => $request->nama_domain,
            'nama_pengelola_website' => $request->nama_pengelola_website,
            'alamat_pengelola_website' => $request->alamat_pengelola_website,
            'kodepos_pengelola_website' => $request->kodepos_pengelola_website
        ]);

        $request->session()->forget('altEdit');
        $request->session()->put('altEdit', 'Formulir');

        return redirect('/admin/alternatif/' . $request->id . '/edit')->with('success', 'Formulir berhasil diubah!');
    }

    public function updateSubstansi(Request $request)
    {
        if (!empty($request->id)) {
            foreach ($request->id as $id) {
                $idd[] = $id;
            }
            SubstansiAlternatif::where('id_alternatif', $request->id_alternatif)->whereIn('id', $idd)->update(['status' => 1]);
            SubstansiAlternatif::where('id_alternatif', $request->id_alternatif)->whereNotIn('id', $idd)->update(['status' => 0]);
        } else {
            SubstansiAlternatif::where('id_alternatif', $request->id_alternatif)->update(['status' => 0]);
        }

        if ($request->type == 'add') {
            $request->session()->forget('altAdd');
            $request->session()->put(['altAdd' => 'Formulir', 'id_alternatif' => $request->id_alternatif]);
            return redirect('/admin/alternatif');
        } elseif ($request->type == 'edit') {
            $request->session()->forget('altEdit');
            $request->session()->put('altEdit', 'Formulir');
            return redirect('/admin/alternatif');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternatif $alternatif, Request $request)
    {
        Alternatif::destroy($request->id);

        return redirect('admin/alternatif')->with('success', 'Data alternatif berhasil dihapus!');
    }
}
