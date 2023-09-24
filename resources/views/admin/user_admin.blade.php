@include('admin/partials/header')
@include('admin/partials/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/user" method="POST">
                                  @csrf
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control" name="role">
                                          <option value="Admin" selected>Admin</option>
                                          <option value="User">User</option>
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
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Status Aktif</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td style="text-align: center">{{ $user->role }}</td>
                            @if($user->aktif == 0)         
                                <td style="text-align: center">
                                  <!-- Button Model activate Data -->
                                  <a href="#activate{{ $user->id }}" class="btn btn-secondary" data-toggle="modal">Nonaktif</a>

                                  <!-- Modal aktivate Data -->
                                  <div class="modal fade" id="activate{{ $user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Aktifkan Pengguna</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/user/activate" method="post">
                                                  @csrf
                                                    <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
                                                    <h4>Apakah anda yakin untuk mengaktifkan pengguna ini?</h4>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Ya</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <!-- End Modal -->
                                </td>         
                            @else
                                <td style="text-align: center">
                                  <!-- Button Model deactivate Data -->
                                  <a href="#deactivate{{ $user->id }}" class="btn btn-primary" data-toggle="modal">Aktif</a>

                                  <!-- Modal deactivate Data -->
                                  <div class="modal fade" id="deactivate{{ $user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Nonaktifkan Pengguna</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/user/deactivate" method="post">
                                                  @csrf
                                                    <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
                                                    <h4>Apakah anda yakin untuk nonaktifkan pengguna ini?</h4>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Ya</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <!-- End Modal -->
                                </td>       
                            @endif
                            <td style="text-align: center;">
                                <!-- Button Model Ubah Data -->
                                <a href="#ubah{{ $user->id }}" class="btn btn-success" data-toggle="modal"><i class="fas fa-pen"> Ubah</i></a>

                                <!-- Modal Ubah Data -->
                                <div class="modal fade" id="ubah{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kriteria</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <form action="/admin/user/{{ $user->id }}" method="post">
                                                @method('put')
                                                @csrf
                                                <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
                                                <div class="form-group">
                                                    <label for="name">Nama</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <select class="form-control" name="role">
                                                      <option value="Admin" selected>Admin</option>
                                                      <option value="User">User</option>
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
                                <a href="#hapus{{ $user->id }}" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash"> Hapus</i></a>

                                <!-- Modal Hapus Data -->
                                <div class="modal fade" id="hapus{{ $user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Hapus Data User</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <form action="/admin/user/{{ $user->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                  <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
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
