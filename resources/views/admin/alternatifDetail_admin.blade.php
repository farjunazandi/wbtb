@include('admin/partials/header')
@include('admin/partials/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Alternatif</h1>
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
                    <a class="nav-link active" id="custom-tabs-four-formulir-tab" data-toggle="pill" href="#formulir" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Formulir</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-person-tab" data-toggle="pill" href="#person" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Orang</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-foto_video-tab" data-toggle="pill" href="#foto" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Foto</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-foto_video-tab" data-toggle="pill" href="#video" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Video</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-kajian-tab" data-toggle="pill" href="#kajian" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Kajian</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-pengelolaan-tab" data-toggle="pill" href="#pengelolaan" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Pengelolaan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-pengelolaan-tab" data-toggle="pill" href="#substansi" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Substansi</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="formulir" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
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
                            <label for="nama">1. Kode Pencatatan (*diisi oleh Kementerian)<span style="color: red">**</span></label>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $details->tahun }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nomor">Nomor</label>
                                        <input type="text" class="form-control" id="nomor" name="nomor" value="{{ $details->nomor }}" readonly>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="nama">2. a. Nama Karya Budaya (Isi nama yang paling umum dipakai)<span style="color: red">**</span></label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $details->nama }}" readonly>
                            </div>
                            <div class="form-group">
                              <label for="nama_lain">2. b. Nama-nama Lain Karya Budaya (varian atau alias nama karya budaya) <span style="color: red">**</span></label>
                                <input type="text" class="form-control" id="nama_lain" name="nama_lain" value="{{ $details->nama_lain }}" readonly>
                            </div>
                            <label for="nama">3. Tempat dan Tanggal Laporan Karya Budaya<span style="color: red">**</span></label>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tempat">Tempat</label>
                                            <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $details->tempat }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $details->tanggal }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="persetujuan_pencatatan">4. Persetujuan Pencatatan Karya Budaya dari (a) komunitas/organisasi/ asosiasi/badan, (b) kelompok sosial atau (c) perseorangan<span style="color: red">**</span></label>
                                <textarea class="form-control" rows="3" name="persetujuan_pencatatan" readonly>{{ $details->persetujuan_pencatatan }}</textarea>
                            </div>
                            <div class="form-group">
                              <label for="sejarah_singkat">5. Sejarah Singkat Karya Budaya (sumber tertulis, buku, prasasti, arsip, kesaksian narasumber terpercaya, dsb)<span style="color: red">*</span></label>
                                <textarea class="form-control" rows="3" name="sejarah_singkat" readonly>{{ $details->sejarah_singkat }}</textarea>
                            </div>
                            <label for="nama">6. Lokasi Karya Budaya (lokasi utama, dan lokasi lain juga disebutkan)<span style="color: red">*</span></label>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="provinsi">Provinsi</label>
                                            <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $details->alt_provinsi->nama }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="kab_kota">Kabupaten/Kota</label>
                                            <input type="text" class="form-control" id="kab_kota" name="kab_kota" value="{{ $details->alt_kab_kota->nama }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="kecamatan">Kecamatan</label>
                                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $details->kecamatan }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="kelurahan">Kelurahan</label>
                                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="{{ $details->kelurahan }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="latitude">Latitude</label>
                                            <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $details->latitude }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="longitude">Longitude</label>
                                            <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $details->longitude }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_penting">Alamat-alamat Penting</label>
                                    <textarea class="form-control" rows="3" name="alamat_penting" readonly>{{ $details->alamat_penting }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="kodepos">Kode Pos</label>
                                    <input type="text" class="form-control" id="kodepos" name="kodepos" value="{{ $details->kodepos }}" readonly>
                                </div>
                            </div>
                            <label for="nama">7. Kategori Karya Budaya (pilih satu atau lebih)<span style="color: red">**</span></label>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="kategori1" disabled {{ $details->kategori1 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">(01) tradisi dan ekspresi lisan, termasuk bahasa sebagai wahana warisan budaya takbenda, termasuk cerita rakyat, naskah kuno, permainan tradisional;</label>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="kategori2" disabled {{ $details->kategori2 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">
                                        <label class="form-check-label">(02) seni pertunjukan, termasuk seni visual, seni teater, seni suara, seni tari, seni musik, film;</label>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="kategori3" disabled {{ $details->kategori3 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">
                                        <label class="form-check-label">(03) adat istiadat masyarakat, ritus dan perayaan-perayaan, etem ekonomi tradisional, sistem organisasi sosial, upacara tradisional;</label>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="kategori4" disabled {{ $details->kategori4 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">
                                        <label class="form-check-label">(04) pengetahuan dan kebiasaan perilaku mengenai alam dan semesta, termasuk pengetahuan tradisional, kearifan lokal, pengobatan tradisional;</label>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="kategori5" disabled {{ $details->kategori5 == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label">
                                        <label class="form-check-label">(05) kemahiran kerajinan tradisional, termasuk seni lukis, seni pahat/ukir, arsitektur tradisional, pakaian tradisional, aksesoris tradisional, makanan/minuman tradisional, moda transportasi tradisional;</label>
                                      </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="deskripsi">8. Uraian/Deskripsi Singkat Karya Budaya (Apa? Siapa? Dimana? Bagaimana? Kapan? Bagaimana prosesnya? Serta bagaimana fungsi sosial karya budaya yang bersangkutan)<span style="color: red">*</span></label>
                                <textarea class="form-control" rows="3" name="deskripsi" readonly>{{ $details->deskripsi }}</textarea>
                            </div>
                            <div class="form-group">
                              <label>9. Kondisi Karya Budaya Saat Ini (pilih salah satu)<span style="color: red">*</span></label>
                              <select class="form-control" name="kondisi" disabled>
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
                                      <input class="form-check-input" type="checkbox" name="promosi1" disabled {{ $details->promosi1 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(a) Promosi langsung, promosi lisan (mulut ke mulut);</label>
                                    </div>
                              </div>
                              <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="promosi2" disabled {{ $details->promosi2 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(b) Pertunjukan seni, pameran, peragaan / demonstrasi;</label>
                                    </div>
                              </div>
                              <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="promosi3" disabled {{ $details->promosi3 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(c) Selebaran, poster, surat kabar, majalah, media luar ruang;</label>
                                    </div>
                              </div>
                              <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="promosi4" disabled {{ $details->promosi4 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(d) Radio, televisi, film;</label>
                                    </div>
                              </div>
                              <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="promosi5" disabled {{ $details->promosi5 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(e) Internet;</label>
                                    </div>
                              </div>
                              <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="promosi6" disabled {{ $details->promosi6 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(f) Belum ada upaya untuk pelestarian / promosi karya budaya ybs;</label>
                                    </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="best_practices">11. Cara Terbaik Untuk Melestarikan dan Mengembangkan Karya Budaya yang Bersangkutan (mohon diisi secara singkat)<span style="color: red">**</span></label>
                              <textarea class="form-control" rows="3" name="best_practices" readonly>{{ $details->best_practices }}</textarea>
                          </div>
                          <label for="nama">12. Dokumentasi, diisi sesuai dengan jenis format dokumentasi (pilih satu atau lebih)<span style="color: red">*</span></label>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi1" disabled {{ $details->dokumentasi1 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(a) Naskah</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi9" disabled {{ $details->dokumentasi9 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(i) Peta</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi2" disabled {{ $details->dokumentasi2 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(b) Buku</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi10" disabled {{ $details->dokumentasi10 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(j) Kaset Audio</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi3" disabled {{ $details->dokumentasi3 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(c) Mikrofilm</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi11" disabled {{ $details->dokumentasi11 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(k) CD Audio</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi4" disabled {{ $details->dokumentasi4 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(d) Foto Biasa</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi12" disabled {{ $details->dokumentasi12 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(l) CD Data</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi5" disabled {{ $details->dokumentasi5 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(e) Slide</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi13" disabled {{ $details->dokumentasi13 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(m) VCD / DVD</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi6" disabled {{ $details->dokumentasi6 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(f) Foto Digital (JPEG, dsb)</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi14" disabled {{ $details->dokumentasi14 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(n) Kaset Beta</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi7" disabled {{ $details->dokumentasi7 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(g) Album</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi15" disabled {{ $details->dokumentasi15 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(o) Film Seluloid</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi8" disabled {{ $details->dokumentasi8 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(h) Gambar</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="dokumentasi16" disabled {{ $details->dokumentasi16 == 1 ? 'checked' : ''}}>
                                      <label class="form-check-label">(p) dan Lain-lain (sebutkan)</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="referensi">13. Referensi (Nama Penulis, Tahun, Judul Buku, Tempat Terbit, Penerbit, dll)<span style="color: red">*</span></label>
                            <textarea class="form-control" rows="3" name="referensi" readonly>{{ $details->referensi }}</textarea>
                          </div>
                          <label for="nama">14. Khusus di isi pengelola website yang berisi karya budaya. Pengelola website berisi karya budaya dan bersedia menjalin hubungan meta data dengan pencatatan warisan budaya tak benda.<span style="color: red">**</span></label>
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="nama_domain">Nama Domain</label>
                                          <input type="text" class="form-control" id="nama_domain" name="nama_domain" value="{{ $details->nama_domain }}" readonly>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="nama_pengelola_website">Nama Pengelola Website</label>
                                          <input type="text" class="form-control" id="nama_pengelola_website" name="nama_pengelola_website" value="{{ $details->nama_pengelola_website }}" readonly>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="alamat_pengelola_website">Alamat Pengelola Website</label>
                                  <textarea class="form-control" rows="3" name="alamat_pengelola_website" readonly>{{ $details->alamat_pengelola_website }}</textarea>
                              </div>
                              <div class="form-group">
                                  <label for="kodepos_pengelola_website">Kode Pos Pengelola Website</label>
                                  <input type="text" class="form-control" id="kodepos_pengelola_website" name="kodepos_pengelola_website" value="{{ $details->kodepos_pengelola_website }}" readonly>
                              </div>
                          </div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                  </div>
                  <div class="tab-pane fade" id="person" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card" style="margin-bottom: 50px">
                          <div class="card-header">
                            <label for="nama">13. Nama Orang yang Melaporkan Karya budaya</label> (kalau dari instansi, sebutkan nama instansi, bagian dan jabatan)<span style="color: red">**</span>
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
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="card" style="margin-bottom: 50px">
                          <div class="card-header">
                            <label for="nama">14. Nama Penanggung Jawab</label> (komunitas / organisasi / asosiasi / badan / paguyuban / kelompok sosial / atau perorangan)<span style="color: red">*</span>
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
                  <div class="tab-pane fade" id="foto" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <label for="nama">Foto</label>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">
                            <div class="post">
                              <div class="row mb-3">
                                @foreach ($fotos as $foto)
                                <?php 
                                  if ($loop->iteration == 4 || $loop->iteration == 8 || $loop->iteration == 12 || $loop->iteration == 16 || $loop->iteration == 20 || $loop->iteration == 24 || $loop->iteration == 28) { ?>
                                    </div> <div class="row mb-3">
                                  <?php } ?>
                                <div class="col-sm-4">
                                  <img class="img-fluid" src="{{ asset('storage/'.$foto->foto) }}" alt="Photo">
                                </div>
                                @endforeach
                                <!-- /.col -->
                              </div>
                              <!-- /.row -->
                            </div>
                            <!-- /.post -->
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                  </div>
                  <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <label for="nama">Video</label>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th style="width: 10px">No.</th>
                                  <th>Keterangan</th>
                                  <th>URL</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($videos as $video)
                                <tr>
                                  <td>{{ $loop->iteration }}.</td>
                                  <td>{{ $video->keterangan }}</td>
                                  <td><a href="{{ $video->url }}">{{ $video->url }}</a></td>
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
                  <div class="tab-pane fade" id="kajian" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <label for="nama">Kajian</label>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            @if (empty($kajian))
                            <div class="form-group">
                              <label for="namaFile">Nama File</label>
                              <input type="text" class="form-control" id="namaFile" name="namaFile" value="" readonly>
                            </div>
                            <div class="form-group">
                              <label for="keterangan">Keterangan</label>
                              <input type="text" class="form-control" id="keterangan" name="keterangan" value="" readonly>
                            </div>
                            @else
                            <div class="form-group">
                              <label for="namaFile">Nama File</label>
                              <input type="text" class="form-control" id="namaFile" name="namaFile" value="{{ $kajian->namaFile }}" readonly>
                            </div>
                            <div class="form-group">
                              <label for="keterangan">Keterangan</label>
                              <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $kajian->keterangan }}" readonly>
                            </div>
                            <div class="card">
                              <object data="{{ asset('storage/'.$kajian->file) }}" type="application/pdf" style="height: 700px; width: 100%;">
                                <embed src="{{ asset('storage/'.$kajian->file) }}" type="application/pdf">
                              </object>
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
                  <div class="tab-pane fade" id="pengelolaan" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <label for="nama">Pengelolaan</label>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            @if (empty($pengelolaan))
                            <div class="form-group">
                              <label for="namaFile">Nama File</label>
                              <input type="text" class="form-control" id="namaFile" name="namaFile" value="" readonly>
                            </div>
                            <div class="form-group">
                              <label for="keterangan">Keterangan</label>
                              <input type="text" class="form-control" id="keterangan" name="keterangan" value="" readonly>
                            </div>
                            @else
                            <div class="form-group">
                              <label for="namaFile">Nama File</label>
                              <input type="text" class="form-control" id="namaFile" name="namaFile" value="{{ $pengelolaan->namaFile }}" readonly>
                            </div>
                            <div class="form-group">
                              <label for="keterangan">Keterangan</label>
                              <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $pengelolaan->keterangan }}" readonly>
                            </div>
                            <div class="card">
                              <object data="{{ asset('storage/'.$pengelolaan->file) }}" type="application/pdf" style="height: 700px; width: 100%;">
                                <embed src="{{ asset('storage/'.$pengelolaan->file) }}" type="application/pdf">
                              </object>
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
                  <div class="tab-pane fade" id="substansi" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <div style="float: left">
                              <label for="nama">Substansi</label>
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
                                          <input type="hidden" name="type" value="add">
                                          <input type="hidden" name="id_alternatif" value="{{ $substansi->id_alternatif }}">
                                          <input class="form-check-input" type="checkbox" name="id[]" value="{{ $substansi->id }}" {{ $substansi->status == 1 ? 'checked' : ''}} disabled>
                                        </div>
                                    </div>
                                </div>
                              @endforeach
                            </div>
                          </div>
                          <!-- /.card-body -->
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
