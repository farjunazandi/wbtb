@include('admin/partials/header')
@include('admin/partials/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perhitungan</h1>
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
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr style="text-align: center">
                    <th style="width: 30px">No.</th>
                    <th>Parameter</th>
                    <th>Nilai</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Lengkap</td>
                        <td style="text-align: center">10</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Kurang Lengkap</td>
                        <td style="text-align: center">5</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Sangat Tidak Lengkap</td>
                        <td style="text-align: center">1</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <div style="float: left">
                      <h3><strong>Perhitungan</strong></h3>
                    </div>
                    <div style="float: right">
                      <!-- Button Model Tambah Data -->
                      <a href="/admin/updateSkoring" class="btn btn-primary">Lakukan Perhitungan</a>  
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr style="text-align: center">
                      <th style="width: 30px">No.</th>
                      <th>Alternatif</th>
                      <?php
                        $kritSkor = DB::table('kriterias')
                                      ->orderBy('id', 'asc')
                                      ->get();
                        foreach ($kritSkor as $ks) { ?>
                          <th>{{ $ks->kode_kriteria }}</th>
                        <?php } ?>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($alternatifs as $altSkor)
                      <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $altSkor->nama }}</td>
                          <?php
                            $id_altSkor = $altSkor->id;
                            $skors = DB::table('skorings')
                                      ->where('id_alternatif', $id_altSkor)
                                      ->orderBy('id_kriteria', 'asc')
                                      ->get();
                            foreach ($skors as $skor) {
                              ?>
                              <td style="text-align: center">{{ $skor->skor }}</td>
                              <?php
                            }
                            ?>
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
                  <div style="float: left">
                    <h3><strong>Normalisasi</strong></h3>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr style="text-align: center">
                    <th style="width: 30px">No.</th>
                    <th>Alternatif</th>
                    <?php
                      $kritNorm = DB::table('kriterias')
                                    ->orderBy('id', 'asc')
                                    ->get();
                      foreach ($kritNorm as $kn) { ?>
                        <th>{{ $kn->kode_kriteria }}</th>
                      <?php } ?>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($alternatifs as $altNorm)
                    <tr>
                      <td>{{ $loop->iteration }}.</td>
                      <td>{{ $altNorm->nama }}</td>
                        <?php
                          $id_altNorm = $altNorm->id;
                          $normalisasi = DB::table('normalisasis')
                                    ->where('id_alternatif', $id_altNorm)
                                    ->orderBy('id_kriteria', 'asc')
                                    ->get();
                          foreach ($normalisasi as $norm) {
                            ?>
                            <td style="text-align: center">{{ number_format($norm->normalisasi, 4) }}</td>
                            <?php
                          }
                          ?>
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
                  <div style="float: left">
                    <h3><strong>Pembobotan</strong></h3>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr style="text-align: center">
                    <th style="width: 30px">No.</th>
                    <th>Alternatif</th>
                    <?php
                      $kritBobot = DB::table('kriterias')
                                    ->orderBy('id', 'asc')
                                    ->get();
                      foreach ($kritBobot as $kb) { ?>
                        <th>{{ $kb->kode_kriteria }}</th>
                      <?php } ?>
                      <th>Nilai Akhir</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($alternatifs as $altBobot)
                    <tr>
                      <td>{{ $loop->iteration }}.</td>
                      <td>{{ $altBobot->nama }}</td>
                        <?php
                          $id_altBobot = $altBobot->id;
                          $nilai_akhir = DB::table('rankings')
                                  ->where('id_alternatif', $id_altBobot)
                                  ->first();
                          $pembobotan = DB::table('pembobotans')
                                    ->where('id_alternatif', $id_altBobot)
                                    ->orderBy('id_kriteria', 'asc')
                                    ->get();
                          foreach ($pembobotan as $bobot) {
                            ?>
                            <td style="text-align: center">{{ number_format($bobot->bobot, 4) }}</td>
                            <?php
                          }
                          ?>
                          <td style="text-align: center">
                            <?php if ($nilai_akhir != null) { ?>
                              {{ number_format($nilai_akhir->nilai_akhir, 4) }}
                            <?php }  else { ?>
                                0
                            <?php } ?>
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
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @include('admin/partials/footer')
