@include('admin/partials/header')
@include('admin/partials/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kabupaten / Kota</h1>
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
            <div class="card">
              <div class="card-header">
                  <div class="form col-3">
                    <!-- Button Model Tambah Data -->
                    <a href="#tambah" class="btn btn-primary" data-toggle="modal"><i class="fas fa-plus"> Tambah</i></a>
                  </div>

                  <!-- Modal Tambah Data -->
                  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kabupaten / Kota</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/kab_kota" method="POST">
                                  @csrf
                                    <div class="form-group">
                                      <label>Provinsi</label>
                                      <select class="form-control" name="provinsi">
                                        @foreach ($provinsis as $provinsi)
                                        <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kabupaten / Kota" required autofocus>
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
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="text-align: center">
                    <th style="width: 30px">No.</th>
                    <th>Provinsi</th>
                    <th>Nama Kabupaten / Kota</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($kab_kotas as $kab_kota)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $kab_kota->provinsi->nama }}</td>
                            <td>{{ $kab_kota->nama }}</td>
                            <td style="text-align: center;">
                                <!-- Button Model Ubah Data -->
                                <a href="#ubah{{ $kab_kota->id }}" class="btn btn-success" data-toggle="modal"><i class="fas fa-pen"> Ubah</i></a>

                                <!-- Modal Ubah Data -->
                                <div class="modal fade" id="ubah{{ $kab_kota->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kabupaten / Kota</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <form action="/admin/kab_kota/{{ $kab_kota->id }}" method="post">
                                                @method('put')
                                                @csrf
                                                <input type="hidden" class="form-control" name="id" value="{{ $kab_kota->id }}">
                                                <div class="form-group">
                                                  <label>Provinsi</label>
                                                  <select class="form-control" name="provinsi">
                                                    @foreach ($provinsis as $provinsi)
                                                    <option value="{{ $provinsi->id }}" {{ $kab_kota->id_provinsi == $provinsi->id ? 'selected' : ''}}>{{ $provinsi->nama }}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama">Nama Kabupaten / Kota</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $kab_kota->nama }}" required autofocus>
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
                                <a href="#hapus{{ $kab_kota->id }}" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash"> Hapus</i></a>

                                <!-- Modal Hapus Data -->
                                <div class="modal fade" id="hapus{{ $kab_kota->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kabupaten / Kota</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <form action="/admin/kab_kota/{{ $kab_kota->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                  <input type="hidden" class="form-control" name="id" value="{{ $kab_kota->id }}">
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
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @include('admin/partials/footer')
