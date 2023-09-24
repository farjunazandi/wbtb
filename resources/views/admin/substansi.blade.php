@include('admin/partials/header')
@include('admin/partials/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Substansi</h1>
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Substansi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/substansi" method="POST">
                                  @csrf
                                    <div class="form-group">
                                        <label for="nama">No.</label>
                                        <input type="number" class="form-control" id="sequence" name="sequence" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Substansi" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Keterangan</label>
                                      <select class="form-control" name="keterangan" required>
                                        <option value="1">Sangat Penting</option>
                                        <option value="0">Penting</option>
                                      </select>
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
                    <th>Nama Substansi</th>
                    <th>Aktif</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($substansis as $substansi)
                        <tr>
                            <td>{{ $substansi->sequence }}.</td>
                            <td>{{ $substansi->nama }}</td>
                            <td>{{ $substansi->aktif }}</td>
                            <td style="text-align: center;">
                                <!-- Button Model Ubah Data -->
                                <a href="#ubah{{ $substansi->id }}" class="btn btn-success" data-toggle="modal"><i class="fas fa-pen"> Ubah</i></a>

                                <!-- Modal Ubah Data -->
                                <div class="modal fade" id="ubah{{ $substansi->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Ubah Data Substansi</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <form action="/admin/substansi/{{ $substansi->id }}" method="post">
                                                @method('put')
                                                @csrf
                                                <input type="hidden" class="form-control" name="id" value="{{ $substansi->id }}">
                                                <div class="form-group">
                                                    <label for="sequence">No.</label>
                                                    <input type="number" class="form-control" id="sequence" name="sequence" value="{{ $substansi->sequence }}" required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $substansi->nama }}" required>
                                                </div>
                                                <div class="form-group">
                                                  <label>Aktif</label>
                                                  <select class="form-control" name="aktif">
                                                    <option value="1" {{ $substansi->aktif == 1 ? 'selected' : ''}}>Aktif</option>
                                                    <option value="0" {{ $substansi->aktif == 0 ? 'selected' : ''}}>Tidak Aktif</option>
                                                  </select>
                                                </div>
                                                <div class="form-group">
                                                  <label>Keterangan</label>
                                                  <select class="form-control" name="keterangan">
                                                    <option value="1" {{ $substansi->keterangan == 1 ? 'selected' : ''}}>Sangat Penting</option>
                                                    <option value="0" {{ $substansi->keterangan == 0 ? 'selected' : ''}}>Penting</option>
                                                  </select>
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
                                <a href="#hapus{{ $substansi->id }}" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash"> Hapus</i></a>

                                <!-- Modal Hapus Data -->
                                <div class="modal fade" id="hapus{{ $substansi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Hapus Data Substansi</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <form action="/admin/substansi/{{ $substansi->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                  <input type="hidden" class="form-control" name="id" value="{{ $substansi->id }}">
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
