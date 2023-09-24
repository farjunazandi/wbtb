@include('admin/partials/header')
@include('admin/partials/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ubah Alternatif</h1>
          </div>
        </div>
        @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success'); }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link {{ (session('altEdit')) == 'Formulir' ? 'active' : '' }}" 
                    id="custom-tabs-four-messages-tab" data-toggle="pill" href="#formulir" role="tab" aria-controls="custom-tabs-four-formulir" aria-selected="false">Formulir</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (session('altEdit')) == 'Person' ? 'active' : '' }}" id="custom-tabs-four-person-tab" data-toggle="pill" href="#person" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Orang</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (session('altEdit')) == 'Foto_Video' ? 'active' : '' }}" id="custom-tabs-four-foto_video-tab" data-toggle="pill" href="#foto_video" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Foto & Video</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (session('altEdit')) == 'Kajian' ? 'active' : '' }}" id="custom-tabs-four-kajian-tab" data-toggle="pill" href="#kajian" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Kajian</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (session('altEdit')) == 'Pengelolaan' ? 'active' : '' }}" id="custom-tabs-four-pengelolaan-tab" data-toggle="pill" href="#pengelolaan" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Pengelolaan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (session('altEdit')) == 'Substansi' ? 'active' : '' }}" id="custom-tabs-four-pengelolaan-tab" data-toggle="pill" href="#substansi" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Substansi</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show {{ (session('altEdit')) == 'Formulir' ? 'active' : '' }}" id="formulir" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <div class="form col-12">
                              <div style="float: left">
                                <!-- Button Model Tambah Data -->
                                <a href="/admin/alternatif" class="btn btn-secondary"><i class="fas fa-left-arrow"> Kembali</i></a>
                              </div>
                              <div style="float: right">
                                <h6>(<span style="color: red">*</span>)wajib terisi dan penting<br>(<span style="color: red">**</span>)wajib terisi</h6>
                              </div>
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <form action="/admin/alternatif/{{ $details->id }}" method="post">
                            @method('put')
                            @csrf
                            <input type="hidden" name="id" value="{{ $details->id }}">
                            <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                            <label for="nama">1. Kode Pencatatan (*diisi oleh Kementerian)<span style="color: red">**</span></label>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $details->tahun }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nomor">Nomor</label>
                                        <input type="text" class="form-control" id="nomor" name="nomor" value="{{ $details->nomor }}">
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="nama">2. a. Nama Karya Budaya (Isi nama yang paling umum dipakai)<span style="color: red">**</span></label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $details->nama }}">
                            </div>
                            <div class="form-group">
                              <label for="nama_lain">2. b. Nama-nama Lain Karya Budaya (varian atau alias nama karya budaya) <span style="color: red">**</span></label>
                                <input type="text" class="form-control" id="nama_lain" name="nama_lain" value="{{ $details->nama_lain }}">
                            </div>
                            <label for="nama">3. Tempat dan Tanggal Laporan Karya Budaya<span style="color: red">**</span></label>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tempat">Tempat</label>
                                            <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $details->tempat }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $details->tanggal }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="persetujuan_pencatatan">4. Persetujuan Pencatatan Karya Budaya dari (a) komunitas/organisasi/ asosiasi/badan, (b) kelompok sosial atau (c) perseorangan<span style="color: red">**</span></label>
                                <textarea class="form-control" rows="3" name="persetujuan_pencatatan">{{ $details->persetujuan_pencatatan }}</textarea>
                            </div>
                            <div class="form-group">
                              <label for="sejarah_singkat">5. Sejarah Singkat Karya Budaya (sumber tertulis, buku, prasasti, arsip, kesaksian narasumber terpercaya, dsb)<span style="color: red">*</span></label>
                                <textarea class="form-control" rows="3" name="sejarah_singkat">{{ $details->sejarah_singkat }}</textarea>
                            </div>
                            <label for="nama">6. Lokasi Karya Budaya (lokasi utama, dan lokasi lain juga disebutkan)<span style="color: red">*</span></label>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="provinsi">Provinsi</label>
                                            <select class="form-control" name="provinsi">
                                                @foreach ($provinsis as $provinsi)
                                                <option value="{{ $provinsi->id }}" {{ $details->alt_provinsi->id == $provinsi->id ? 'selected' : ''}}>{{ $provinsi->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="kab_kota">Kabupaten/Kota</label>
                                            <select class="form-control" name="kab_kota">
                                                @foreach ($kab_kotas as $kab_kota)
                                                <option value="{{ $kab_kota->id }}" {{ $details->alt_kab_kota->id == $kab_kota->id ? 'selected' : ''}}>{{ $kab_kota->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="kecamatan">Kecamatan</label>
                                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $details->kecamatan }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="kelurahan">Kelurahan</label>
                                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="{{ $details->kelurahan }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="latitude">Latitude</label>
                                            <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $details->latitude }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="longitude">Longitude</label>
                                            <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $details->longitude }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_penting">Alamat-alamat Penting</label>
                                    <textarea class="form-control" rows="3" name="alamat_penting">{{ $details->alamat_penting }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="kodepos">Kode Pos</label>
                                    <input type="text" class="form-control" id="kodepos" name="kodepos" value="{{ $details->kodepos }}">
                                </div>
                            </div>
                            <label for="nama">7. Kategori Karya Budaya (pilih satu atau lebih)<span style="color: red">**</span></label>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="kategori1" {{ $details->kategori1 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(01) tradisi dan ekspresi lisan, termasuk bahasa sebagai wahana warisan budaya takbenda, termasuk cerita rakyat, naskah kuno, permainan tradisional;</label>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="kategori2"  {{ $details->kategori2 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">
                                        <label class="form-check-label">(02) seni pertunjukan, termasuk seni visual, seni teater, seni suara, seni tari, seni musik, film;</label>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="kategori3"  {{ $details->kategori3 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">
                                        <label class="form-check-label">(03) adat istiadat masyarakat, ritus dan perayaan-perayaan, etem ekonomi tradisional, sistem organisasi sosial, upacara tradisional;</label>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="kategori4"  {{ $details->kategori4 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">
                                        <label class="form-check-label">(04) pengetahuan dan kebiasaan perilaku mengenai alam dan semesta, termasuk pengetahuan tradisional, kearifan lokal, pengobatan tradisional;</label>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="kategori5"  {{ $details->kategori5 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">
                                        <label class="form-check-label">(05) kemahiran kerajinan tradisional, termasuk seni lukis, seni pahat/ukir, arsitektur tradisional, pakaian tradisional, aksesoris tradisional, makanan/minuman tradisional, moda transportasi tradisional;</label>
                                      </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="deskripsi">8. Uraian/Deskripsi Singkat Karya Budaya (Apa? Siapa? Dimana? Bagaimana? Kapan? Bagaimana prosesnya? Serta bagaimana fungsi sosial karya budaya yang bersangkutan)<span style="color: red">*</span></label>
                                <textarea class="form-control" rows="3" name="deskripsi" >{{ $details->deskripsi }}</textarea>
                            </div>
                            <div class="form-group">
                              <label>9. Kondisi Karya Budaya Saat Ini (pilih salah satu)<span style="color: red">*</span></label>
                              <select class="form-control" name="kondisi" >
                                <option value="0" {{ $details->kondisi == 0 ? 'selected' : ''}}>Sedang Berkembang</option>
                                <option value="1" {{ $details->kondisi == 1 ? 'selected' : ''}}>Masih Bertahan</option>
                                <option value="2" {{ $details->kondisi == 2 ? 'selected' : ''}}>Sudah Berkurang</option>
                                <option value="3" {{ $details->kondisi == 3 ? 'selected' : ''}}>Terancam Punah</option>
                                <option value="4" {{ $details->kondisi == 4 ? 'selected' : ''}}>Sudah Punah / Tidak Berfungsi Lagi dalam Masyarakat</option>
                              </select>
                            </div>
                            <label for="nama">10. Upaya Pelestarian / Promosi Karya Budaya Selama Ini (pilih satu atau lebih)<span style="color: red">*</span></label>
                            <div class="card-body">
                              <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="promosi1"  {{ $details->promosi1 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(a) Promosi langsung, promosi lisan (mulut ke mulut);</label>
                                    </div>
                              </div>
                              <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="promosi2"  {{ $details->promosi2 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(b) Pertunjukan seni, pameran, peragaan / demonstrasi;</label>
                                    </div>
                              </div>
                              <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="promosi3"  {{ $details->promosi3 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(c) Selebaran, poster, surat kabar, majalah, media luar ruang;</label>
                                    </div>
                              </div>
                              <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="promosi4"  {{ $details->promosi4 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(d) Radio, televisi, film;</label>
                                    </div>
                              </div>
                              <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="promosi5"  {{ $details->promosi5 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(e) Internet;</label>
                                    </div>
                              </div>
                              <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="promosi6"  {{ $details->promosi6 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(f) Belum ada upaya untuk pelestarian / promosi karya budaya ybs;</label>
                                    </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="best_practices">11. Cara Terbaik Untuk Melestarikan dan Mengembangkan Karya Budaya yang Bersangkutan (mohon diisi secara singkat)<span style="color: red">**</span></label>
                                <textarea class="form-control" rows="3" name="best_practices" >{{ $details->best_practices }}</textarea>
                            </div>
                            <label for="nama">12. Dokumentasi, diisi sesuai dengan jenis format dokumentasi (pilih satu atau lebih)<span style="color: red">*</span></label>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi1"  {{ $details->dokumentasi1 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(a) Naskah</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi9"  {{ $details->dokumentasi9 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(i) Peta</label>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi2"  {{ $details->dokumentasi2 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(b) Buku</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi10"  {{ $details->dokumentasi10 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(j) Kaset Audio</label>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi3"  {{ $details->dokumentasi3 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(c) Mikrofilm</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi11"  {{ $details->dokumentasi11 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(k) CD Audio</label>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi4"  {{ $details->dokumentasi4 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(d) Foto Biasa</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi12"  {{ $details->dokumentasi12 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(l) CD Data</label>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi5"  {{ $details->dokumentasi5 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(e) Slide</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi13"  {{ $details->dokumentasi13 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(m) VCD / DVD</label>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi6"  {{ $details->dokumentasi6 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(f) Foto Digital (JPEG, dsb)</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi14"  {{ $details->dokumentasi14 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(n) Kaset Beta</label>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi7"  {{ $details->dokumentasi7 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(g) Album</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi15"  {{ $details->dokumentasi15 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(o) Film Seluloid</label>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi8"  {{ $details->dokumentasi8 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(h) Gambar</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="dokumentasi16"  {{ $details->dokumentasi16 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(p) dan Lain-lain (sebutkan)</label>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="referensi">13. Referensi (Nama Penulis, Tahun, Judul Buku, Tempat Terbit, Penerbit, dll)<span style="color: red">*</span></label>
                                <textarea class="form-control" rows="3" name="referensi" >{{ $details->referensi }}</textarea>
                            </div>
                            <label for="nama">14. Khusus di isi pengelola website yang berisi karya budaya. Pengelola website berisi karya budaya dan bersedia menjalin hubungan meta data dengan pencatatan warisan budaya tak benda.<span style="color: red">**</span></label>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nama_domain">Nama Domain</label>
                                            <input type="text" class="form-control" id="nama_domain" name="nama_domain" value="{{ $details->nama_domain }}" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nama_pengelola_website">Nama Pengelola Website</label>
                                            <input type="text" class="form-control" id="nama_pengelola_website" name="nama_pengelola_website" value="{{ $details->nama_pengelola_website }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_pengelola_website">Alamat Pengelola Website</label>
                                    <textarea class="form-control" rows="3" name="alamat_pengelola_website" >{{ $details->alamat_pengelola_website }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="kodepos_pengelola_website">Kode Pos Pengelola Website</label>
                                    <input type="text" class="form-control" id="kodepos_pengelola_website" name="kodepos_pengelola_website" value="{{ $details->kodepos_pengelola_website }}" >
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                            </form>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                  </div>
                  <div class="tab-pane fade tab-pane fade show {{ (session('altEdit')) == 'Person' ? 'active' : '' }}" id="person" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card" style="margin-bottom: 50px">
                          <div class="card-header">
                            <label for="nama">13. Nama Orang yang Melaporkan Karya budaya</label> (kalau dari instansi, sebutkan nama instansi, bagian dan jabatan)<span style="color: red">**</span>
                            <div class="form col-3">
                              <!-- Button Model Tambah Data -->
                              <a href="#tambah" class="btn btn-primary" data-toggle="modal"><i class="fas fa-plus"> Tambah</i></a>
                            </div>
          
                            <!-- Modal Tambah Data -->
                            <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pelapor Karya Budaya</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <form action="/admin/alternatifPerson" method="POST">
                                            @csrf
                                              <input type="hidden" name="type" value="edit">
                                              <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                              <input type="hidden" name="category" value="0">
                                              <div class="form-group">
                                                  <label for="nama">Nama</label>
                                                  <input type="text" class="form-control" id="nama" name="nama" autofocus required>
                                              </div>
                                              <div class="form-group">
                                                  <label for="no_phone">No. Telp</label>
                                                  <input type="text" class="form-control" id="no_phone" name="no_phone">
                                              </div>
                                              <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea class="form-control" rows="3" name="alamat" ></textarea>
                                              </div>
                                              <div class="form-group">
                                                <label for="kode_pos">Kode Pos</label>
                                                <input type="text" class="form-control" id="kode_pos" name="kode_pos">
                                              </div>
                                              <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" name="email">
                                              </div>
                                              <div class="form-group">
                                                <label for="website">Website</label>
                                                <input type="text" class="form-control" id="website" name="website">
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="submit" class="btn btn-primary">Tambah</button>
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <!-- End Modal -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th style="width: 10px">No.</th>
                                  <th>Nama</th>
                                  <th>No. Telp</th>
                                  <th>Alamat</th>
                                  <th>Kode Pos</th>
                                  <th>Email</th>
                                  <th>Website</th>
                                  <th style="text-align: center">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($pelapors as $pelapor)
                                <tr>
                                  <td>{{ $loop->iteration }}.</td>
                                  <td>{{ $pelapor->nama }}</td>
                                  <td>{{ $pelapor->no_phone }}</td>
                                  <td>{{ $pelapor->alamat }}</td>
                                  <td>{{ $pelapor->kode_pos }}</td>
                                  <td>{{ $pelapor->email }}</td>
                                  <td>{{ $pelapor->website }}</td>
                                  <td style="text-align: center;">
                                    <!-- Button Model Ubah Data -->
                                    <a href="#ubah{{ $pelapor->id }}" class="btn btn-success" data-toggle="modal"><i class="fas fa-pen"> Ubah</i></a>
    
                                    <!-- Modal Ubah Data -->
                                    <div class="modal fade" id="ubah{{ $pelapor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Ubah Data Pelapor Karya Budaya</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  <form action="/admin/alternatifPerson/{{ $pelapor->id }}" method="post">
                                                    @method('put')
                                                    @csrf
                                                    <input type="hidden" name="type" value="edit">
                                                    <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                                    <input type="hidden" name="id" value="{{ $pelapor->id }}">
                                                      <div class="form-group">
                                                          <label for="nama">Nama</label>
                                                          <input type="text" class="form-control" id="nama" name="nama" autofocus required value="{{ $pelapor->nama }}">
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="no_phone">No. Telp</label>
                                                          <input type="text" class="form-control" id="no_phone" name="no_phone" value="{{ $pelapor->no_phone }}">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <textarea class="form-control" rows="3" name="alamat" value="{{ $pelapor->alamat }}">{{ $pelapor->alamat }}</textarea>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="kode_pos">Kode Pos</label>
                                                        <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="{{ $pelapor->kode_pos }}">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" class="form-control" id="email" name="email" value="{{ $pelapor->email }}">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="website">Website</label>
                                                        <input type="text" class="form-control" id="website" name="website" value="{{ $pelapor->website }}">
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <!-- End Modal -->
    
                                    <!-- Button Model Hapus Data -->
                                    <a href="#hapus{{ $pelapor->id }}" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash"> Hapus</i></a>
    
                                    <!-- Modal Hapus Data -->
                                    <div class="modal fade" id="hapus{{ $pelapor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pelapor Karya Budaya</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                <form action="/admin/alternatifPerson/{{ $pelapor->id }}" method="post">
                                                  @method('delete')
                                                  @csrf
                                                      <input type="hidden" class="form-control" name="id" value="{{ $pelapor->id }}">
                                                      <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                                      <input type="hidden" name="type" value="edit">
                                                      <h4>Apakah anda yakin untuk menghapus data ini?</h4>
                                                      <div class="modal-footer">
                                                          <button type="submit" class="btn btn-danger">Hapus</button>
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <!-- End Modal -->
                                 </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="card">
                          <div class="card-header" style="margin-bottom: 50px">
                            <label for="nama">14. Nama Penanggung Jawab</label> (komunitas / organisasi / asosiasi / badan / paguyuban / kelompok sosial / atau perorangan)<span style="color: red">*</span>
                            <div class="form col-3">
                              <!-- Button Model Tambah Data -->
                              <a href="#tambahpj" class="btn btn-primary" data-toggle="modal"><i class="fas fa-plus"> Tambah</i></a>
                            </div>
          
                            <!-- Modal Tambah Data -->
                            <div class="modal fade" id="tambahpj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penanggung Jawab Karya Budaya</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="/admin/alternatifPerson" method="POST">
                                          @csrf
                                            <input type="hidden" name="type" value="edit">
                                            <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                              <input type="hidden" name="category" value="1">
                                              <div class="form-group">
                                                  <label for="nama">Nama</label>
                                                  <input type="text" class="form-control" id="nama" name="nama" autofocus required>
                                              </div>
                                              <div class="form-group">
                                                  <label for="no_phone">No. Telp</label>
                                                  <input type="text" class="form-control" id="no_phone" name="no_phone">
                                              </div>
                                              <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea class="form-control" rows="3" name="alamat" ></textarea>
                                              </div>
                                              <div class="form-group">
                                                <label for="kode_pos">Kode Pos</label>
                                                <input type="text" class="form-control" id="kode_pos" name="kode_pos">
                                              </div>
                                              <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" name="email">
                                              </div>
                                              <div class="form-group">
                                                <label for="website">Website</label>
                                                <input type="text" class="form-control" id="website" name="website">
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="submit" class="btn btn-primary">Tambah</button>
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <!-- End Modal -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th style="width: 10px">No.</th>
                                  <th>Nama</th>
                                  <th>No. Telp</th>
                                  <th>Alamat</th>
                                  <th>Kode Pos</th>
                                  <th>Email</th>
                                  <th>Website</th>
                                  <th style="text-align: center">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($pjs as $pj)
                                <tr>
                                  <td>{{ $loop->iteration }}.</td>
                                  <td>{{ $pj->nama }}</td>
                                  <td>{{ $pj->no_phone }}</td>
                                  <td>{{ $pj->alamat }}</td>
                                  <td>{{ $pj->kode_pos }}</td>
                                  <td>{{ $pj->email }}</td>
                                  <td>{{ $pj->website }}</td>
                                  <td style="text-align: center;">
                                    <!-- Button Model Ubah Data -->
                                    <a href="#ubahpj{{ $pj->id }}" class="btn btn-success" data-toggle="modal"><i class="fas fa-pen"> Ubah</i></a>
    
                                    <!-- Modal Ubah Data -->
                                    <div class="modal fade" id="ubahpj{{ $pj->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Ubah Data Penanggung Jawab Karya Budaya</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                <form action="/admin/alternatifPerson/{{ $pj->id }}" method="post">
                                                  @method('put')
                                                  @csrf
                                                  <input type="hidden" name="type" value="edit">
                                                  <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                                    <input type="hidden" name="id" value="{{ $pj->id }}">
                                                      <div class="form-group">
                                                          <label for="nama">Nama</label>
                                                          <input type="text" class="form-control" id="nama" name="nama" autofocus required value="{{ $pj->nama }}">
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="no_phone">No. Telp</label>
                                                          <input type="text" class="form-control" id="no_phone" name="no_phone" value="{{ $pj->no_phone }}">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <textarea class="form-control" rows="3" name="alamat" value="{{ $pj->alamat }}">{{ $pj->alamat }}</textarea>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="kode_pos">Kode Pos</label>
                                                        <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="{{ $pj->kode_pos }}">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" class="form-control" id="email" name="email" value="{{ $pj->email }}">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="website">Website</label>
                                                        <input type="text" class="form-control" id="website" name="website" value="{{ $pj->website }}">
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <!-- End Modal -->
    
                                    <!-- Button Model Hapus Data -->
                                    <a href="#hapuspj{{ $pj->id }}" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash"> Hapus</i></a>
    
                                    <!-- Modal Hapus Data -->
                                    <div class="modal fade" id="hapuspj{{ $pj->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data Penanggung Jawab Karya Budaya</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                <form action="/admin/alternatifPerson/{{ $pj->id }}" method="post">
                                                  @method('delete')
                                                  @csrf
                                                      <input type="hidden" class="form-control" name="id" value="{{ $pj->id }}">
                                                      <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                                      <input type="hidden" name="type" value="edit">
                                                      <h4>Apakah anda yakin untuk menghapus data ini?</h4>
                                                      <div class="modal-footer">
                                                          <button type="submit" class="btn btn-danger">Hapus</button>
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <!-- End Modal -->
                                 </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="card">
                          <div class="card-header">
                            <label for="nama">15. Guru budaya / maestro</label> (diisi nama orang-orang yang memiliki pengetahuan dan keterampilan tentang karya budaya tersebut dan usia yang bersangkutan)<span style="color: red">*</span>
                            <div class="form col-3">
                              <!-- Button Model Tambah Data -->
                              <a href="#tambahgb" class="btn btn-primary" data-toggle="modal"><i class="fas fa-plus"> Tambah</i></a>
                            </div>
          
                            <!-- Modal Tambah Data -->
                            <div class="modal fade" id="tambahgb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru Budaya / Maestro</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="/admin/alternatifPerson" method="POST">
                                          @csrf
                                            <input type="hidden" name="type" value="edit">
                                            <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                              <input type="hidden" name="category" value="2">
                                              <div class="form-group">
                                                  <label for="nama">Nama</label>
                                                  <input type="text" class="form-control" id="nama" name="nama" autofocus required>
                                              </div>
                                              <div class="form-group">
                                                  <label for="no_phone">No. Telp</label>
                                                  <input type="text" class="form-control" id="no_phone" name="no_phone">
                                              </div>
                                              <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea class="form-control" rows="3" name="alamat" ></textarea>
                                              </div>
                                              <div class="form-group">
                                                <label for="kode_pos">Kode Pos</label>
                                                <input type="text" class="form-control" id="kode_pos" name="kode_pos">
                                              </div>
                                              <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" name="email">
                                              </div>
                                              <div class="form-group">
                                                <label for="website">Website</label>
                                                <input type="text" class="form-control" id="website" name="website">
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="submit" class="btn btn-primary">Tambah</button>
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <!-- End Modal -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th style="width: 10px">No.</th>
                                  <th>Nama</th>
                                  <th>No. Telp</th>
                                  <th>Alamat</th>
                                  <th>Kode Pos</th>
                                  <th>Email</th>
                                  <th>Website</th>
                                  <th style="text-align: center">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($maestros as $maestro)
                                <tr>
                                  <td>{{ $loop->iteration }}.</td>
                                  <td>{{ $maestro->nama }}</td>
                                  <td>{{ $maestro->no_phone }}</td>
                                  <td>{{ $maestro->alamat }}</td>
                                  <td>{{ $maestro->kode_pos }}</td>
                                  <td>{{ $maestro->email }}</td>
                                  <td>{{ $maestro->website }}</td>
                                  <td style="text-align: center;">
                                    <!-- Button Model Ubah Data -->
                                    <a href="#ubahgb{{ $maestro->id }}" class="btn btn-success" data-toggle="modal"><i class="fas fa-pen"> Ubah</i></a>
    
                                    <!-- Modal Ubah Data -->
                                    <div class="modal fade" id="ubahgb{{ $maestro->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Ubah Data Guru Budaya / Maestro</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                <form action="/admin/alternatifPerson/{{ $maestro->id }}" method="post">
                                                  @method('put')
                                                  @csrf
                                                  <input type="hidden" name="type" value="edit">
                                                  <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                                    <input type="hidden" name="id" value="{{ $maestro->id }}">
                                                      <div class="form-group">
                                                          <label for="nama">Nama</label>
                                                          <input type="text" class="form-control" id="nama" name="nama" autofocus required value="{{ $maestro->nama }}">
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="no_phone">No. Telp</label>
                                                          <input type="text" class="form-control" id="no_phone" name="no_phone" value="{{ $maestro->no_phone }}">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <textarea class="form-control" rows="3" name="alamat" value="{{ $maestro->alamat }}">{{ $maestro->alamat }}</textarea>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="kode_pos">Kode Pos</label>
                                                        <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="{{ $maestro->kode_pos }}">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" class="form-control" id="email" name="email" value="{{ $maestro->email }}">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="website">Website</label>
                                                        <input type="text" class="form-control" id="website" name="website" value="{{ $maestro->website }}">
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <!-- End Modal -->
    
                                    <!-- Button Model Hapus Data -->
                                    <a href="#hapusgb{{ $maestro->id }}" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash"> Hapus</i></a>
    
                                    <!-- Modal Hapus Data -->
                                    <div class="modal fade" id="hapusgb{{ $maestro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data Guru Budaya / Maestro</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                <form action="/admin/alternatifPerson/{{ $maestro->id }}" method="post">
                                                  @method('delete')
                                                  @csrf
                                                      <input type="hidden" class="form-control" name="id" value="{{ $maestro->id }}">
                                                      <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                                      <input type="hidden" name="type" value="edit">
                                                      <h4>Apakah anda yakin untuk menghapus data ini?</h4>
                                                      <div class="modal-footer">
                                                          <button type="submit" class="btn btn-danger">Hapus</button>
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <!-- End Modal -->
                                 </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                  </div>
                  <div class="tab-pane fade show {{ (session('altEdit')) == 'Foto_Video' ? 'active' : '' }}" id="foto_video" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card" style="margin-bottom: 50px">
                          <div class="card-header">
                            <label for="nama">Foto</label>
                            <div class="form col-3">
                              <!-- Button Model Tambah Data -->
                              <a href="#tambahFoto" class="btn btn-primary" data-toggle="modal"><i class="fas fa-plus"> Tambah</i></a>
                            </div>
          
                            <!-- Modal Tambah Data -->
                            <div class="modal fade" id="tambahFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Tambah Lampiran Foto</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <form action="/admin/alternatifFoto" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                            <input type="hidden" name="type" value="edit">
                                              <div class="form-group">
                                                  <label for="keterangan">Keterangan Singkat</label>
                                                  <input type="text" class="form-control" id="keterangan" name="keterangan" autofocus>
                                              </div>
                                              <div class="form-group">
                                                <label class="form-label">Foto (.jpg) Max 1 Mb</label>
                                                <input class="form-control" type="file" id="formFile" name="foto" accept=".jpg, .jpeg, .png" required>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="submit" class="btn btn-primary">Tambah</button>
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <!-- End Modal -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th style="width: 10px">No.</th>
                                  <th>Keterangan</th>
                                  <th>File Foto</th>
                                  <th style="text-align: center">Detail</th>
                                  <th style="text-align: center">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($fotos as $foto)
                                <tr>
                                  <td>{{ $loop->iteration }}.</td>
                                  <td>{{ $foto->keterangan }}</td>
                                  <td>{{ $foto->foto }}.</td>
                                  <td>
                                    <!-- Button Model View Data -->
                                    <a href="#viewFoto{{ $foto->id }}" class="btn btn-primary" data-toggle="modal"><i class="fas fa-eye"> Lihat</i></a>

                                    <!-- Modal View Data -->
                                    <div class="modal fade" id="viewFoto{{ $foto->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-xl" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">{{ $foto->keterangan }}</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                <div class="col-12">
                                                  <img src="{{ asset('storage/' . $foto->foto) }}" alt="Foto" width="100%">
                                                </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <!-- End Modal -->
                                  </td>
                                  <td style="text-align: center;">
                                    <!-- Button Model Ubah Data -->
                                    <a href="#ubahFoto{{ $foto->id }}" class="btn btn-success" data-toggle="modal"><i class="fas fa-pen"> Ubah</i></a>
    
                                    <!-- Modal Ubah Data -->
                                    <div class="modal fade" id="ubahFoto{{ $foto->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Ubah Lampiran Foto</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  <form action="/admin/alternatifFoto/{{ $foto->id }}" method="post" enctype="multipart/form-data">
                                                    @method('put')
                                                    @csrf
                                                    <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                                    <input type="hidden" name="type" value="edit">
                                                    <input type="hidden" name="id" value="{{ $foto->id }}">
                                                    <input type="hidden" name="oldImage" value="{{ $foto->foto }}" required>
                                                    <div class="form-group">
                                                      <label for="keterangan">Keterangan Singkat</label>
                                                      <input type="text" class="form-control" id="keterangan" name="keterangan" autofocus value="{{ $foto->keterangan }}">
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="form-label">Foto (.jpg) Max 1 Mb</label>
                                                      <input class="form-control" type="file" id="formFile" name="foto" accept=".jpg, .jpeg, .png">
                                                    </div>
                                                      <div class="modal-footer">
                                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <!-- End Modal -->
    
                                    <!-- Button Model Hapus Data -->
                                    <a href="#hapusFoto{{ $foto->id }}" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash"> Hapus</i></a>
    
                                    <!-- Modal Hapus Data -->
                                    <div class="modal fade" id="hapusFoto{{ $foto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Hapus Lampiran Foto</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  <form action="/admin/alternatifFoto/{{ $foto->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                      <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                                      <input type="hidden" name="type" value="edit">
                                                      <input type="hidden" class="form-control" name="id" value="{{ $foto->id }}">
                                                      <input type="hidden" class="form-control" name="oldImage" value="{{ $foto->foto }}">
                                                      <h4>Apakah anda yakin untuk menghapus data ini?</h4>
                                                      <div class="modal-footer">
                                                          <button type="submit" class="btn btn-danger">Hapus</button>
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <!-- End Modal -->
                                 </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="card">
                          <div class="card-header">
                            <label for="nama">Video</label>
                            
                            <div class="form col-3">
                              <!-- Button Model Tambah Data -->
                              <a href="#tambahVideo" class="btn btn-primary" data-toggle="modal"><i class="fas fa-plus"> Tambah</i></a>
                            </div>
          
                            <!-- Modal Tambah Data -->
                            <div class="modal fade" id="tambahVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Tambah Lampiran Video</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <form action="/admin/alternatifVideo" method="POST">
                                            @csrf
                                              <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                              <input type="hidden" name="type" value="edit">
                                              <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                              <div class="form-group">
                                                  <label for="keterangan">Keterangan</label>
                                                  <input type="text" class="form-control" id="keterangan" name="keterangan" autofocus>
                                              </div>
                                              <div class="form-group">
                                                  <label for="url">URL</label>
                                                  <input type="text" class="form-control" id="url" name="url" required>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="submit" class="btn btn-primary">Tambah</button>
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <!-- End Modal -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th style="width: 10px">No.</th>
                                  <th>Keterangan</th>
                                  <th>URL</th>
                                  <th style="text-align: center">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($videos as $video)
                                <tr>
                                  <td>{{ $loop->iteration }}.</td>
                                  <td>{{ $video->keterangan }}</td>
                                  <td><a href="{{ $video->url }}">{{ $video->url }}</a></td>
                                  <td style="text-align: center;">
                                    <!-- Button Model Ubah Data -->
                                    <a href="#ubahVideo{{ $video->id }}" class="btn btn-success" data-toggle="modal"><i class="fas fa-pen"> Ubah</i></a>
    
                                    <!-- Modal Ubah Data -->
                                    <div class="modal fade" id="ubahVideo{{ $video->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Ubah Lampiran Video</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  <form action="/admin/alternatifVideo/{{ $video->id }}" method="post">
                                                    @method('put')
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $video->id }}">
                                                    <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                                    <input type="hidden" name="type" value="edit">
                                                      <div class="form-group">
                                                          <label for="keterangan">Keterangan</label>
                                                          <input type="text" class="form-control" id="keterangan" name="keterangan" autofocus value="{{ $video->keterangan }}">
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="url">URL</label>
                                                          <input type="text" class="form-control" id="url" name="url" value="{{ $video->url }}" required>
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <!-- End Modal -->
    
                                    <!-- Button Model Hapus Data -->
                                    <a href="#hapusVideo{{ $video->id }}" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash"> Hapus</i></a>
    
                                    <!-- Modal Hapus Data -->
                                    <div class="modal fade" id="hapusVideo{{ $video->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Hapus Lampiran Video</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  <form action="/admin/alternatifVideo/{{ $video->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                      <input type="hidden" class="form-control" name="id" value="{{ $video->id }}">
                                                      <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                                      <input type="hidden" name="type" value="edit">
                                                      <h4>Apakah anda yakin untuk menghapus data ini?</h4>
                                                      <div class="modal-footer">
                                                          <button type="submit" class="btn btn-danger">Hapus</button>
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <!-- End Modal -->
                                 </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                  </div>
                  <div class="tab-pane fade show {{ (session('altEdit')) == 'Kajian' ? 'active' : '' }}" id="kajian" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <label for="nama">Kajian</label>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            @if (empty($kajian))
                              <form action="/admin/kajian" method="post" enctype="multipart/form-data">
                              @csrf
                                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="type" value="edit">
                                <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                <div class="form-group">
                                  <label class="form-label">File</label>
                                  <input class="form-control" type="file" id="formFile" name="fileKajian" accept=".pdf" required>
                                </div>
                                <div class="form-group">
                                  <label for="keterangan">Keterangan</label>
                                  <input type="text" class="form-control" id="keterangan" name="keterangan">
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                </div>
                              </form>
                              @else
                              <div class="btn-group col-4" role="group" aria-label="Basic example">
                                  <!-- Button Model Ubah Kajian -->
                                  <a href="#ubahKajian" class="btn btn-success" data-toggle="modal"><i class="fas fa-pen"> Ubah Kajian</i></a>
                                  <!-- Button Model Hapus Kajian -->
                                  <a href="#hapusKajian" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash"> Hapus Kajian</i></a>
                              </div>
            
                              <!-- Modal Ubah Kajian -->
                              <div class="modal fade" id="ubahKajian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Kajian</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/kajian/{{ $kajian->id }}" method="POST" enctype="multipart/form-data">
                                              @csrf
                                              @method('put')
                                                <input type="hidden" name="type" value="edit">
                                                <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                                <input type="hidden" name="id" value="{{ $kajian->id }}">
                                                <input type="hidden" name="oldFile" value="{{ $kajian->file }}">
                                                <div class="form-group">
                                                    <label for="keterangan">Keterangan</label>
                                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $kajian->keterangan }}" autofocus>
                                                </div>
                                                <div class="form-group">
                                                  <label class="form-label">File</label>
                                                  <input class="form-control" type="file" id="formFile" name="fileKajian" accept=".pdf">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <!-- End Modal -->

                              <!-- Modal Hapus Kajian -->
                              <div class="modal fade" id="hapusKajian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Kajian</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/kajian/{{ $kajian->id }}" method="post">
                                              @method('delete')
                                              @csrf
                                                <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                                <input type="hidden" name="type" value="edit">
                                                <input type="hidden" class="form-control" name="id" value="{{ $kajian->id }}">
                                                <input type="hidden" class="form-control" name="oldFile" value="{{ $kajian->file }}">
                                                <h4>Apakah anda yakin untuk menghapus data ini?</h4>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <!-- End Modal -->

                                <div class="form-group">
                                  <label for="namaFile">Nama File</label>
                                  <input type="text" class="form-control" id="fileKajian" name="namaFile" value="{{ $kajian->namaFile }}" readonly>
                                </div>
                                <div class="form-group">
                                  <label for="keterangan">Keterangan</label>
                                  <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $kajian->keterangan }}" readonly>
                                </div>
                              @endif
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                  </div>
                  <div class="tab-pane fade show {{ (session('altEdit')) == 'Pengelolaan' ? 'active' : '' }}" id="pengelolaan" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <label for="nama">Pengelolaan</label>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            @if (empty($pengelolaan))
                              <form action="/admin/pengelolaan" method="post" enctype="multipart/form-data">
                              @csrf
                                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="type" value="edit">
                                <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                <div class="form-group">
                                  <label class="form-label">File</label>
                                  <input class="form-control" type="file" id="formFile" name="filePengelolaan" accept=".pdf" required>
                                </div>
                                <div class="form-group">
                                  <label for="keterangan">Keterangan</label>
                                  <input type="text" class="form-control" id="keterangan" name="keterangan">
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                </div>
                              </form>
                              @else
                              <div class="btn-group col-5" role="group" aria-label="Basic example">
                                  <!-- Button Model Ubah Pengelolaan -->
                                  <a href="#ubahPengelolaan" class="btn btn-success" data-toggle="modal"><i class="fas fa-pen"> Ubah Pengelolaan</i></a>
                                  <!-- Button Model Hapus Pengelolaan -->
                                  <a href="#hapusPengelolaan" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash"> Hapus Pengelolaan</i></a>
                              </div>
            
                              <!-- Modal Ubah Pengelolaan -->
                              <div class="modal fade" id="ubahPengelolaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Pengelolaan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/pengelolaan/{{ $pengelolaan->id }}" method="POST" enctype="multipart/form-data">
                                              @csrf
                                              @method('put')
                                                <input type="hidden" name="type" value="edit">
                                                <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                                <input type="hidden" name="id" value="{{ $pengelolaan->id }}">
                                                <input type="hidden" name="oldFile" value="{{ $pengelolaan->file }}">
                                                <div class="form-group">
                                                    <label for="keterangan">Keterangan</label>
                                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $pengelolaan->keterangan }}" autofocus>
                                                </div>
                                                <div class="form-group">
                                                  <label class="form-label">File</label>
                                                  <input class="form-control" type="file" id="formFile" name="filePengelolaan" accept=".pdf">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <!-- End Modal -->

                              <!-- Modal Hapus Pengelolaan -->
                              <div class="modal fade" id="hapusPengelolaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Pengelolaan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/pengelolaan/{{ $pengelolaan->id }}" method="post">
                                              @method('delete')
                                              @csrf
                                                <input type="hidden" name="id_alternatif" value="{{ $details->id }}">
                                                <input type="hidden" name="type" value="edit">
                                                <input type="hidden" class="form-control" name="id" value="{{ $pengelolaan->id }}">
                                                <input type="hidden" class="form-control" name="oldFile" value="{{ $pengelolaan->file }}">
                                                <h4>Apakah anda yakin untuk menghapus data ini?</h4>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <!-- End Modal -->

                                <div class="form-group">
                                  <label for="namaFile">Nama File</label>
                                  <input type="text" class="form-control" id="fileKajian" name="namaFile" value="{{ $pengelolaan->namaFile }}" readonly>
                                </div>
                                <div class="form-group">
                                  <label for="keterangan">Keterangan</label>
                                  <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $pengelolaan->keterangan }}" readonly>
                                </div>
                              @endif
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                  </div>
                  <div class="tab-pane fade show {{ (session('altEdit')) == 'Substansi' ? 'active' : '' }}" id="substansi" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <form action="/admin/alternatif_substansi" method="post">
                          <div class="card-header">
                            <div style="float: left">
                              <label for="nama">Substansi</label>
                            </div>
                            <div style="float: right">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">
                            <div class="card-body">
                              <div class="row">
                                  <div class="col-sm-1">
                                      <div class="form-group">
                                          <label for="tempat">No</label>
                                      </div>
                                  </div>
                                  <div class="col-sm-10">
                                      <div class="form-group">
                                          <label for="tempat">Substansi</label>
                                      </div>
                                  </div>
                                  <div class="col-sm-1">
                                      <div class="form-group">
                                          <label for="tanggal">Status</label>
                                      </div>
                                  </div>
                              </div>
                              
                                @csrf
                                @foreach($substansis as $substansi)
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <h6>{{ $substansi->subs_substansi->sequence }}.</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <h6>{{ $substansi->subs_substansi->nama }}<span style="color: red">
                                              @if ($substansi->subs_substansi->keterangan == 0)
                                                  **
                                              @else
                                                  *
                                              @endif
                                            </span></h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group" style="margin-left: 50%">
                                          <input type="hidden" name="type" value="edit">
                                          <input type="hidden" name="id_alternatif" value="{{ $substansi->id_alternatif }}">
                                          <input class="form-check-input" type="checkbox" name="id[]" value="{{ $substansi->id }}" {{ $substansi->status == 1 ? 'checked' : ''}}>
                                        </div>
                                    </div>
                                </div>
                              @endforeach
                              
                            </div>
                          </div>
                          <!-- /.card-body -->
                          </form>
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @include('admin/partials/footer')
