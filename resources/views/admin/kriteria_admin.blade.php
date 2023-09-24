@include('admin/partials/header')
@include('admin/partials/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>KRITERIA</h1>
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
        @if(session()->has('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error'); }}
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
                    <a class="nav-link" id="custom-tabs-four-home-tab" data-toggle="pill" href="#umum" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Umum</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#bobot" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Bobot</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#normalisasi" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Normalisasi</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade" id="umum" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                              <thead>
                              <tr style="text-align: center">
                                <th style="width: 30px">No.</th>
                                <th style="width: 120px">Kode Kriteria</th>
                                <th>Nama Kriteria</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach ($kriterias as $kriteria)
                                  <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td style="text-align: center">{{ $kriteria->kode_kriteria }}</td>
                                    <td>{{ $kriteria->nama_kriteria }}</td>
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
                  <div class="tab-pane fade show active" id="bobot" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <?php if (auth()->user()->role == 'Admin') { ?>
                            <div class="form col-12">
                              <div style="float: left">
                                <!-- Button Model Tambah Data -->
                                <a href="#tambah" class="btn btn-primary" data-toggle="modal"><i class="fas fa-plus"> Tambah</i></a>
                              </div>
                              <div style="float: right">
                                <!-- Button Model Tambah Data -->
                                <a href="#ubahBobot" class="btn btn-primary" data-toggle="modal"><i class="fas fa-pen"> Atur Bobot</i></a>
                              </div>
                            </div>
                            <?php } ?>

                            <!-- Modal Tambah Data -->
                            <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <form action="/admin/kriteria" method="POST">
                                            @csrf
                                              <div class="form-group">
                                                  <label for="kode_kriteria">Kode Kriteria</label>
                                                  <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" placeholder="Kode Kriteria" required>
                                              </div>
                                              <div class="form-group">
                                                  <label for="nama_kriteria">Nama Kriteria</label>
                                                  <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" placeholder="Nama Kriteria" required>
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

                            <!-- Modal Ubah Data -->
                            <div class="modal fade" id="ubahBobot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kriteria</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <form action="/admin/ubahBobotKriteria" method="post">
                                            @csrf
                                            <div class="row">
                                              <div class="col-sm-2">
                                                  <div class="form-group">
                                                    <label for="kode_kriteria">Kode Kriteria</label>
                                                  </div>
                                              </div>
                                              <div class="col-sm-8">
                                                  <div class="form-group">
                                                    <label for="nama_kriteria">Nama Kriteria</label>
                                                  </div>
                                              </div>
                                              <div class="col-sm-2">
                                                <div class="form-group">
                                                  <label for="bobot_kriteria">Bobot Kriteria</label>
                                                </div>
                                              </div>
                                            </div>
                                            @foreach ($kriterias as $krt)
                                              <input type="hidden" name="id_kriteria[]" value="{{ $krt->id }}">
                                              <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                      <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria[]" value="{{ $krt->kode_kriteria }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                      <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria[]" value="{{ $krt->nama_kriteria }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                  <div class="form-group">
                                                    <input type="number" class="form-control" id="bobot_kriteria" name="bobot_kriteria[]" value="{{ $krt->bobot_kriteria }}" required>
                                                  </div>
                                                </div>
                                              </div>
                                            @endforeach
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
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                              <thead>
                              <tr style="text-align: center">
                                <th style="width: 30px">No.</th>
                                <th style="width: 120px">Kode Kriteria</th>
                                <th>Nama Kriteria</th>
                                <th>Nilai Bobot</th>
                                <?php if (auth()->user()->role == 'Admin') { ?>
                                  <th>Aksi</th>
                                <?php } ?>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach ($kriterias as $kriteria)
                                  <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td style="text-align: center">{{ $kriteria->kode_kriteria }}</td>
                                    <td>{{ $kriteria->nama_kriteria }}</td>
                                    <td style="text-align: center">{{ $kriteria->bobot_kriteria }}%</td>
                                    <?php if (auth()->user()->role == 'Admin') { ?>
                                      <td style="text-align: center;">
                                        <!-- Button Model Ubah Data -->
                                        <a href="#ubah{{ $kriteria->id }}" class="btn btn-success" data-toggle="modal"><i class="fas fa-pen"> Ubah</i></a>
  
                                        <!-- Modal Ubah Data -->
                                        <div class="modal fade" id="ubah{{ $kriteria->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kriteria</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <form action="/admin/kriteria/{{ $kriteria->id }}" method="post">
                                                        @method('put')
                                                        @csrf
                                                          <input type="hidden" class="form-control" name="id" value="{{ $kriteria->id }}">
                                                          <div class="form-group">
                                                              <label for="kode_kriteria">Kode Kriteria</label>
                                                              <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" value="{{ $kriteria->kode_kriteria }}" required>
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="nama_kriteria">Nama Kriteria</label>
                                                              <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="{{ $kriteria->nama_kriteria }}" required>
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="bobot_kriteria">Bobot Kriteria</label>
                                                              <input type="number" class="form-control" id="bobot_kriteria" name="bobot_kriteria" value="{{ $kriteria->bobot_kriteria }}" readonly>
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
                                        <a href="#hapus{{ $kriteria->id }}" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash"> Hapus</i></a>
  
                                        <!-- Modal Hapus Data -->
                                        <div class="modal fade" id="hapus{{ $kriteria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kriteria</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <form action="/admin/kriteria/{{ $kriteria->id }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                          <input type="hidden" class="form-control" name="id" value="{{ $kriteria->id }}">
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
                                    <?php } ?>
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
                  <div class="tab-pane fade" id="normalisasi" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">
                              <thead>
                              <tr style="text-align: center">
                                <th style="width: 30px">No.</th>
                                <th style="width: 120px">Kode Kriteria</th>
                                <th>Nama Kriteria</th>
                                <th>Nilai Bobot</th>
                                <th>Normalisasi</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach ($kriterias as $kriteria)
                                  <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td style="text-align: center">{{ $kriteria->kode_kriteria }}</td>
                                    <td>{{ $kriteria->nama_kriteria }}</td>
                                    <td style="text-align: center">{{ $kriteria->bobot_kriteria }}%</td>
                                    <td style="text-align: center">{{ $kriteria->bobot_kriteria/100 }}</td>
                                  </tr>    
                                @endforeach
                              </tbody>
                              <tfoot>
                                <tr style="text-align: center">
                                  <th colspan="3"></th>
                                  <th>{{ $sumbobot }}</th>
                                  <th>{{ $sumbobot/100 }}</th>
                                </tr>
                              </tfoot>
                            </table>
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
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @include('admin/partials/footer')
