@include('admin/partials/header')
@include('admin/partials/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Alternatif</h1>
          </div>
        </div>
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
                  @if ((session('altAdd')) == 'Formulir')
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#Formulir" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Formulir</a>
                    </li>
                  @endif
                  @if ((session('altAdd')) != 'Formulir')
                    <li class="nav-item">
                      <a class="nav-link {{ (session('altAdd')) == 'Person' ? 'active' : '' }}" 
                      id="custom-tabs-four-messages-tab" data-toggle="pill" href="#Persons" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Orang</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ (session('altAdd')) == 'Foto_Video' ? 'active' : '' }}"
                      id="custom-tabs-four-messages-tab" data-toggle="pill" href="#foto_video" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Foto & Video</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ (session('altAdd')) == 'Kajian' ? 'active' : '' }}"
                      id="custom-tabs-four-messages-tab" data-toggle="pill" href="#kajian" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Kajian</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ (session('altAdd')) == 'Pengelolaan' ? 'active' : '' }}"
                      id="custom-tabs-four-messages-tab" data-toggle="pill" href="#pengelolaan" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Pengelolaan</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ (session('altAdd')) == 'Substansi' ? 'active' : '' }}"
                      id="custom-tabs-four-messages-tab" data-toggle="pill" href="#substansi" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Substansi</a>
                    </li>
                  @endif
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  @if (session('altAdd') == 'Formulir')
                    <div class="tab-pane fade show active" id="Formulir" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                              <div class="form col-12">
                                <div style="float: left">
                                  <!-- Button Model Tambah Data -->
                                  <a href="/admin/alternatif" class="btn btn-secondary"><i class="fas fa-left-arrow"> Batal</i></a>
                                </div>
                                <div style="float: right">
                                  <h6>(<span style="color: red">*</span>)wajib terisi dan penting<br>(<span style="color: red">**</span>)wajib terisi</h6>
                                </div>
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <form action="/admin/alternatifStore" method="post">
                                  @csrf
                                  <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                  <label for="nama">1. Kode Pencatatan (*diisi oleh Kementerian)<span style="color: red">**</span></label>
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="tahun">Tahun</label>
                                                  <input type="number" class="form-control" id="tahun" name="tahun" value="" autofocus>
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="nomor">Nomor</label>
                                                  <input type="text" class="form-control" id="nomor" name="nomor" value="">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="nama">2. a. Nama Karya Budaya (Isi nama yang paling umum dipakai)<span style="color: red">**</span></label>
                                      <input type="text" class="form-control" id="nama" name="nama" value="" >
                                  </div>
                                  <div class="form-group">
                                      <label for="nama_lain">2. b. Nama-nama Lain Karya Budaya (varian atau alias nama karya budaya) <span style="color: red">**</span></label>
                                      <input type="text" class="form-control" id="nama_lain" name="nama_lain" value="" >
                                  </div>
                                  <label for="nama">3. Tempat dan Tanggal Laporan Karya Budaya<span style="color: red">**</span></label>
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="tempat">Tempat</label>
                                                  <input type="text" class="form-control" id="tempat" name="tempat" value="" >
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="tanggal">Tanggal</label>
                                                  <input type="date" class="form-control" id="tanggal" name="tanggal" value="" >
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="persetujuan_pencatatan">4. Persetujuan Pencatatan Karya Budaya dari (a) komunitas/organisasi/ asosiasi/badan, (b) kelompok sosial atau (c) perseorangan<span style="color: red">**</span></label>
                                      <textarea class="form-control" rows="3" name="persetujuan_pencatatan" ></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="sejarah_singkat">5. Sejarah Singkat Karya Budaya (sumber tertulis, buku, prasasti, arsip, kesaksian narasumber terpercaya, dsb)<span style="color: red">*</span></label>
                                      <textarea class="form-control" rows="3" name="sejarah_singkat" ></textarea>
                                  </div>
                                  <label for="nama">6. Lokasi Karya Budaya (lokasi utama, dan lokasi lain juga disebutkan)<span style="color: red">*</span></label>
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <label>Provinsi</label>
                                              <select class="form-control" name="provinsi">
                                                @foreach ($provinsis as $provinsi)
                                                <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <label>Kabupaten / Kota</label>
                                              <select class="form-control" name="kab_kota">
                                                @foreach ($kab_kotas as $kab_kota)
                                                <option value="{{ $kab_kota->id }}">{{ $kab_kota->nama }}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="kecamatan">Kecamatan</label>
                                                  <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="" >
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="kelurahan">Kelurahan</label>
                                                  <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="" >
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="latitude">Latitude</label>
                                                  <input type="text" class="form-control" id="latitude" name="latitude" value="" >
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="longitude">Longitude</label>
                                                  <input type="text" class="form-control" id="longitude" name="longitude" value="" >
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="alamat_penting">Alamat-alamat Penting</label>
                                          <textarea class="form-control" rows="3" name="alamat_penting" ></textarea>
                                      </div>
                                      <div class="form-group">
                                          <label for="kodepos">Kode Pos</label>
                                          <input type="text" class="form-control" id="kodepos" name="kodepos" value="" >
                                      </div>
                                  </div>
                                  <label for="nama">7. Kategori Karya Budaya (pilih satu atau lebih)<span style="color: red">**</span></label>
                                  <div class="card-body">
                                      <div class="form-group">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="kategori1">
                                              <label class="form-check-label">(01) tradisi dan ekspresi lisan, termasuk bahasa sebagai wahana warisan budaya takbenda, termasuk cerita rakyat, naskah kuno, permainan tradisional;</label>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="kategori2">
                                              <label class="form-check-label">(02) seni pertunjukan, termasuk seni visual, seni teater, seni suara, seni tari, seni musik, film;</label>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="kategori3">
                                              <label class="form-check-label">(03) adat istiadat masyarakat, ritus dan perayaan-perayaan, etem ekonomi tradisional, sistem organisasi sosial, upacara tradisional;</label>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="kategori4">
                                              <label class="form-check-label">(04) pengetahuan dan kebiasaan perilaku mengenai alam dan semesta, termasuk pengetahuan tradisional, kearifan lokal, pengobatan tradisional;</label>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="kategori5">
                                              <label class="form-check-label">(05) kemahiran kerajinan tradisional, termasuk seni lukis, seni pahat/ukir, arsitektur tradisional, pakaian tradisional, aksesoris tradisional, makanan/minuman tradisional, moda transportasi tradisional;</label>
                                            </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="deskripsi">8. Uraian/Deskripsi Singkat Karya Budaya (Apa? Siapa? Dimana? Bagaimana? Kapan? Bagaimana prosesnya? Serta bagaimana fungsi sosial karya budaya yang bersangkutan)<span style="color: red">*</span></label>
                                      <textarea class="form-control" rows="3" name="deskripsi" ></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label>9. Kondisi Karya Budaya Saat Ini (pilih salah satu)<span style="color: red">*</span></label>
                                      <select class="form-control" name="kondisi">
                                        <option value="0">Sedang Berkembang</option>
                                        <option value="1">Masih Bertahan</option>
                                        <option value="2">Sudah Berkurang</option>
                                        <option value="3">Terancam Punah</option>
                                        <option value="4">Sudah Punah / Tidak Berfungsi Lagi dalam Masyarakat</option>
                                      </select>
                                  </div>
                                  <label for="nama">10. Upaya Pelestarian / Promosi Karya Budaya Selama Ini (pilih satu atau lebih)<span style="color: red">*</span></label>
                                    <div class="card-body">
                                      <div class="form-group">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="promosi1">
                                              <label class="form-check-label">(a) Promosi langsung, promosi lisan (mulut ke mulut);</label>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="promosi2">
                                              <label class="form-check-label">(b) Pertunjukan seni, pameran, peragaan / demonstrasi;</label>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="promosi3">
                                              <label class="form-check-label">(c) Selebaran, poster, surat kabar, majalah, media luar ruang;</label>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="promosi4">
                                              <label class="form-check-label">(d) Radio, televisi, film;</label>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="promosi5">
                                              <label class="form-check-label">(e) Internet;</label>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="promosi6">
                                              <label class="form-check-label">(f) Belum ada upaya untuk pelestarian / promosi karya budaya ybs;</label>
                                            </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="best_practices">11. Cara Terbaik Untuk Melestarikan dan Mengembangkan Karya Budaya yang Bersangkutan (mohon diisi secara singkat)<span style="color: red">**</span></label>
                                      <textarea class="form-control" rows="3" name="best_practices" ></textarea>
                                  </div>
                                  <label for="nama">12. Dokumentasi, diisi sesuai dengan jenis format dokumentasi (pilih satu atau lebih)<span style="color: red">*</span></label>
                                  <div class="card-body">
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi1">
                                                <label class="form-check-label">(a) Naskah</label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi9">
                                                <label class="form-check-label">(i) Peta</label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi2">
                                                <label class="form-check-label">(b) Buku</label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi10">
                                                <label class="form-check-label">(j) Kaset Audio</label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi3">
                                                <label class="form-check-label">(c) Mikrofilm</label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi11">
                                                <label class="form-check-label">(k) CD Audio</label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi4">
                                                <label class="form-check-label">(d) Foto Biasa</label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi12">
                                                <label class="form-check-label">(l) CD Data</label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi5">
                                                <label class="form-check-label">(e) Slide</label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi13">
                                                <label class="form-check-label">(m) VCD / DVD</label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi6">
                                                <label class="form-check-label">(f) Foto Digital (JPEG, dsb)</label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi14">
                                                <label class="form-check-label">(n) Kaset Beta</label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi7">
                                                <label class="form-check-label">(g) Album</label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi15">
                                                <label class="form-check-label">(o) Film Seluloid</label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi8">
                                                <label class="form-check-label">(h) Gambar</label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dokumentasi16">
                                                <label class="form-check-label">(p) dan Lain-lain (sebutkan)</label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="referensi">13. Referensi (Nama Penulis, Tahun, Judul Buku, Tempat Terbit, Penerbit, dll)<span style="color: red">*</span></label>
                                    <textarea class="form-control" rows="3" name="referensi" ></textarea>
                                  </div>
                                  <label for="nama">14. Khusus di isi pengelola website yang berisi karya budaya. Pengelola website berisi karya budaya dan bersedia menjalin hubungan meta data dengan pencatatan warisan budaya tak benda.<span style="color: red">**</span></label>
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="nama_domain">Nama Domain</label>
                                                  <input type="text" class="form-control" id="nama_domain" name="nama_domain" value="" >
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="nama_pengelola_website">Nama Pengelola Website</label>
                                                  <input type="text" class="form-control" id="nama_pengelola_website" name="nama_pengelola_website" value="" >
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="alamat_pengelola_website">Alamat Pengelola Website</label>
                                          <textarea class="form-control" rows="3" name="alamat_pengelola_website" ></textarea>
                                      </div>
                                      <div class="form-group">
                                          <label for="kodepos_pengelola_website">Kode Pos Pengelola Website</label>
                                          <input type="text" class="form-control" id="kodepos_pengelola_website" name="kodepos_pengelola_website" value="" >
                                      </div>
                                  </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Lanjutkan</button>
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
                  @endif
                  @if (session('altAdd') != 'Formulir')
                    <div class="tab-pane fade show {{ (session('altAdd')) == 'Person' ? 'active' : '' }}" id="Persons" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
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
                                                <input type="hidden" name="type" value="add">
                                                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
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
                                                      <input type="hidden" name="type" value="add">
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
                                                        <input type="hidden" name="type" value="add">
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
                          <div class="card" style="margin-bottom: 50px">
                            <div class="card-header">
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
                                              <input type="hidden" name="type" value="add">
                                              <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
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
                                                    <input type="hidden" name="type" value="add">
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
                                                  <form action="/admin/alternatifPerson/{{ $pelapor->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                        <input type="hidden" class="form-control" name="id" value="{{ $pj->id }}">
                                                        <input type="hidden" name="type" value="add">
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
                                                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="category" value="2">
                                                <input type="hidden" name="type" value="add">
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
                                                      <input type="hidden" name="type" value="add">
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
                                                  <form action="/admin/alternatifPerson/{{ $pelapor->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                        <input type="hidden" name="type" value="add">
                                                        <input type="hidden" class="form-control" name="id" value="{{ $maestro->id }}">
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
                    <div class="tab-pane fade show {{ (session('altAdd')) == 'Foto_Video' ? 'active' : '' }}" id="foto_video" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
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
                                              <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                              <input type="hidden" name="type" value="add">
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
                                    <th>Detail</th>
                                    <th style="text-align: center">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($fotos as $foto)
                                  <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $foto->keterangan }}</td>
                                    <td>{{ $foto->foto }}</td>
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
                                                      <input type="hidden" name="type" value="add">
                                                      <input type="hidden" name="id" value="{{ $foto->id }}">
                                                      <input type="hidden" name="oldImage" value="{{ $foto->foto }}">
                                                      <div class="form-group">
                                                        <label for="keterangan">Keterangan Singkat</label>
                                                        <input type="text" class="form-control" id="keterangan" name="keterangan" autofocus value="{{ $foto->keterangan }}">
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="form-label">Foto (.jpg) Max 1 Mb</label>
                                                        <input class="form-control" type="file" id="formFile" name="foto" accept=".jpg, .jpeg, .png" required>
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
                                                      <input type="hidden" name="type" value="add">
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
                                                <input type="hidden" name="type" value="add">
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
                                    <td>{{ $video->url }}</td>
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
                                                    <form action="/admin/alternatifVideo" method="post">
                                                      @csrf
                                                      @method('put')
                                                      <input type="hidden" name="id" value="{{ $video->id }}">
                                                      <input type="hidden" name="type" value="add">
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
                                                    <form action="/admin/alternatifVideo" method="post">
                                                      @csrf
                                                      @method('delete')
                                                        <input type="hidden" class="form-control" name="id" value="{{ $video->id }}">
                                                        <input type="hidden" name="type" value="add">
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
                    <div class="tab-pane fade show {{ (session('altAdd')) == 'Kajian' ? 'active' : '' }}" id="kajian" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                              <label for="nama">Kajian</label>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <form action="/admin/kajian" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="type" value="add">
                                @if (empty($kajian))
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
                                @else
                                  <div class="form-group">
                                    <label for="namaFile">Nama File</label>
                                    <input type="text" class="form-control" id="fileKajian" name="namaFile" value="{{ $kajian->namaFile }}" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $kajian->keterangan }}" readonly>
                                  </div>
                                @endif
                              </form>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                        <!-- /.col -->
                      </div>
                    </div>
                    <div class="tab-pane fade show {{ (session('altAdd')) == 'Pengelolaan' ? 'active' : '' }}" id="pengelolaan" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                              <label for="nama">Pengelolaan</label>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <form action="/admin/pengelolaan" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="type" value="add">
                                @if (empty($pengelolaan))
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
                                @else
                                  <div class="form-group">
                                    <label for="namaFile">Nama File</label>
                                    <input type="text" class="form-control" id="namaFile" name="namaFile" value="{{ $pengelolaan->namaFile }}" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $pengelolaan->keterangan }}" readonly>
                                  </div>
                                  <div class="modal-footer">
                                    <a href="/admin/alternatif" class="btn btn-primary">Selesai</a>
                                  </div>
                                @endif
                              </form>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                        <!-- /.col -->
                      </div>
                    </div>
                    <div class="tab-pane fade show {{ (session('altAdd')) == 'Substansi' ? 'active' : '' }}" id="substansi" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
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
                                            <input type="hidden" name="type" value="add">
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
                  @endif
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
