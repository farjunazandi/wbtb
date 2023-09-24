<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Generate PDF From View</title>
</head>
<style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 3px;
    }
    </style>
<body>
    <h2>Rekap Penilaian Usulan Warisan Budaya Takbenda Indonesia Tahun <?= date("Y"); ?> Provinsi Bengkulu</h2>
    <table>
        <thead>
            <th>No.</th>
            <th>Nama</th>
            <th>Provinsi</th>
            <th>Kabupaten / Kota</th>
            <th>Domain</th>
            <th>Kondisi</th>
            <th>Keterangan</th>
        </thead>
        <tbody>
            @foreach ($alternatifs as $alt)
            <tr>
                <td>{{ $loop->iteration }}.</td>
                <td>{{ $alt->rnk_alt->nama }}</td>
                <td>{{ $alt->rnk_alt->alt_provinsi->nama }}</td>
                <td>{{ $alt->rnk_alt->alt_kab_kota->nama }}</td>
                <td>
                    <?php
                    if ($alt->rnk_alt->kategori1 == 1)
                    {
                        echo 'Tradisi dan Ekspresi Lisan';
                    } else {
                        if ($alt->rnk_alt->kategori2 == 1) {
                            echo 'Seni Pertunjukan';
                        } else {
                            if ($alt->rnk_alt->kategori3 == 1) {
                                echo 'Adat Istiadat Masyarakat';
                            } else {
                                if ($alt->rnk_alt->kategori4 == 1) {
                                    echo 'Pengetahuan & Kebiasaan Perilaku';
                                } else {
                                    if ($alt->rnk_alt->kategori5 == 1) {
                                        echo 'Kemahiran Tradisional';
                                    }
                                }
                            }
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($alt->rnk_alt->kondisi == 0) {
                        echo 'Sedang Berkembang';
                    } elseif ($alt->rnk_alt->kondisi == 1) {
                        echo 'Masih Bertahan';
                    } elseif ($alt->rnk_alt->kondisi == 2) {
                        echo 'Sudah Berkurang';
                    } elseif ($alt->rnk_alt->kondisi == 3) {
                        echo 'Terancam Punah';
                    } else {
                        echo 'Sudah Punah';
                    }
                    ?>
                </td>
                <td>{{ $alt->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>