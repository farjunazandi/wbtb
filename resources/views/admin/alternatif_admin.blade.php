@include('admin/partials/header')
@include('admin/partials/sidebar')

  <!-- Content Wrapper. Contains page contents -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Alternatif</h1>
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
                    <a href="/admin/alternatifCreate" class="btn btn-primary"><i class="fas fa-plus"> Tambah</i></a>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="text-align: center">
                    <th style="width: 30px">No.</th>
                    <th>Nama</th>
                    <th>Kabupaten / Kota</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($alternatifs as $alternatif)
                        <tr>
                          <td>{{ $loop->iteration }}.</td>
                          <td>{{ $alternatif->nama }}</td>
                          <td>{{ $alternatif->alt_kab_kota->nama }}</td>
                          <td>{{ $alternatif->latitude }}</td>
                          <td>{{ $alternatif->longitude }}</td>
                          <td style="text-align: center;">
                              <!-- Button Model Lihat Data -->
                              <a href="/admin/alternatif/{{ $alternatif->id }}" class="btn btn-primary"><i class="fas fa-eye"> Detail</i></a>
                          </td>
                          <td style="text-align: center;">
                              <!-- Button Model Ubah Data -->
                              <a href="/admin/alternatif/{{ $alternatif->id }}/edit" class="btn btn-success"><i class="fas fa-pen"> Ubah</i></a>

                              <!-- Button Model Hapus Data -->
                              <a href="#hapus{{ $alternatif->id }}" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash"> Hapus</i></a>

                              <!-- Modal Hapus Data -->
                              <div class="modal fade" id="hapus{{ $alternatif->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Alternatif</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/alternatif/{{ $alternatif->id }}" method="post">
                                              @method('delete')
                                              @csrf
                                                <input type="hidden" class="form-control" name="id" value="{{ $alternatif->id }}">
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
