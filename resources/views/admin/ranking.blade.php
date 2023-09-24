@include('admin/partials/header')
@include('admin/partials/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ranking</h1>
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
            <div class="card col-6">
                <div class="card-header">
                    <div style="float: left">
                        <h3><strong>Peta</strong></h3>
                      </div>
                  </div>
                <div id="map" style="width:100%;height:600px;"></div>
            </div>
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <div style="float: left">
                    <h3><strong>Ranking</strong></h3>
                </div>
                <div style="float: right">
                  <div class="form col-12">
                    <!-- Button Model Tambah Data -->
                    <a href="/admin/downloadPDF" class="btn btn-primary" target="_blank">Download PDF</a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="text-align: center">
                    <th style="width: 30px">Ranking</th>
                    <th>Alternatif</th>
                    <th>Skor</th>
                    <th>Keterangan</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($rankings as $ranking)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $ranking->rnk_alt->nama }}</td>
                            <td style="text-align: center">{{ number_format($ranking->nilai_akhir, 4) }}</td>
                            <td>{{ $ranking->keterangan }}</td>
                            {{-- <td>
                              <?php
                                if ($loop->iteration == 1) {
                                  echo 'Direkomendasi';
                                } else {
                                  echo 'Data dukung tidak lengkap';
                                }
                                ?>
                            </td> --}}
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

        <div class="card">
            <div class="card-header">
                <div style="float: left">
                  <h3><strong>Detail Perhitungan</strong></h3>
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
                    $kriteria = DB::table('kriterias')
                                  ->orderBy('id', 'asc')
                                  ->get();
                    foreach ($kriteria as $krt) { ?>
                      <th>{{ $krt->kode_kriteria }}</th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                  @foreach ($alternatifs as $alt)
                  <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $alt->nama }}</td>
                        <?php
                            $id = $alt->id_alternatif;
                            $pembobotan = DB::table('pembobotans')
                                    ->where('id_alternatif', $id)
                                    ->orderBy('id_kriteria', 'asc')
                                    ->get();
                            foreach ($pembobotan as $bobot) { ?>
                                <td style="text-align: center">{{ number_format($bobot->bobot, 4) }}</td>
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
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
    function initMap() {
        const myLatLng = { lat: -3.8185668197994653, lng: 102.3115542807617 };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: myLatLng,
        });

        var locations = {{ Js::from($alternatifs) }};

        var infowindow = new google.maps.InfoWindow();

        var marker, i;
          
        for (i = 0; i < locations.length; i++) {  
              marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i]['latitude'], locations[i]['longitude']),
                map: map
              });
                
              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                  a = i + 1;
                  infowindow.setContent(a+'. '+locations[i]['nama']);
                  infowindow.open(map, marker);
                }
              })(marker, i));

        }
    }

    window.initMap = initMap;
</script>

<script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>
  
  @include('admin/partials/footer')
