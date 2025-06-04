<style>
body {
    font-family: 'Arial', ;
    margin: 0;
    padding: 0;
}

table {
    width: 100%;
}

td {
    padding: 3px;
    font-size: 15px;
}

p {
    font-size: 15px;
    margin: 0;
    padding: 0;
}


.container {
    text-align: justify;
    margin: 0 45px;
    padding: 0;
}


#header-SKL {
    margin: 0;
    height: 13px;
}

#header-SKL td {
    padding: 0;
    font-size: 15px;
}

#header-SKL th {
    padding: 0;
    font-size: 15px;
}
</style>
<?php if ( !function_exists('formatDateIndo')) {
    function formatDateIndo($date) {
        $bulan=[ 1=>'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
        ];
        $tanggal=explode('-', $date);
        return $tanggal[2].' '.$bulan[(int)$tanggal[1]].' '.$tanggal[0];
    }
}


    $groupNilaiRaporByMapel = array();
    $groupNilaiUjianByMapel = array();
    $groupAverageNilaiAkhirByMapel = array();
    $total_nilai_akhir = 0;
    $jumlah_mapel = 0;
    // dd($data_nilai);
    foreach ($data_nilai as $key => $value) {
        if ($value['tipe_nilai'] == '1') {
            $groupNilaiRaporByMapel[$value['id_mapel']][] = $value;
        } else{
            $groupNilaiUjianByMapel[$value['id_mapel']][] = $value;
        }
    }
    // dd($groupNilaiRaporByMapel);
    // average nilai rapor 
    foreach ($groupNilaiRaporByMapel as $key => $value) {
        $total = 0;
        $count = 0;
        foreach ($value as $item) {
            $total += $item['nilai_rapor'];
            $count++;
        }
        $averageNilaiRapor = $total / $count;
        // check key exist in array ujian
        if (array_key_exists($key, $groupNilaiUjianByMapel)) {
            $totalUjian = 0;
            $countUjian = 0;
            foreach ($groupNilaiUjianByMapel[$key] as $item) {
                $totalUjian += $item['nilai_rapor'];
                $countUjian++;
            }
            $averageNilaiUjian = $totalUjian / $countUjian;
            // calculate average nilai akhir
            $averageNilaiAkhir = (number_format($averageNilaiRapor, 2) + $averageNilaiUjian) / 2;
        } else {
            // jika tidak ada nilai ujian, gunakan nilai rapor saja
            $averageNilaiAkhir = $averageNilaiRapor;
        }
        $jumlah_mapel++;
        $total_nilai_akhir += number_format($averageNilaiAkhir, 2);
        // dd($averageNilaiRapor);
        $groupAverageNilaiAkhirByMapel[$key] = array(
            'id_mapel' => $key,
            'nilai_akhir' => number_format($averageNilaiAkhir, 2, '.', ''),
        );
    }
    // dd($groupAverageNilaiAkhirByMapel);
    // dd($total_nilai_akhir, $jumlah_mapel, $groupAverageNilaiAkhirByMapel);
    $averageNilai = $total_nilai_akhir / $jumlah_mapel;  
    // dd($averageNilai);
?>

<img src="<?= $imageSrc ?>" alt="Logo" style="width: 100%; text-align: center;">
<table style="margin-top: 1px;">
    <tr>
        <td style="width: 25%"></td>
        <td style="width: 50%; text-align: center;">
            <h4 style="font-weight: bold;">SURAT KETERANGAN LULUS</h4>
            <p>Nomor : 421.3/0177/V/2025</p>
        </td>
        <td style="width: 25%"></td>
    </tr>
</table>
<div class="container" style="margin-top: 2px;">
    <p>Yang bertanda tangan di bawah ini, Kepala SMA Negeri 1
        Pekalongan Kota Pekalongan, Provinsi Jawa Tengah menerangkan bahwa:</p>
    <table style="margin-top:3px;" id="header-SKL">
        <tr style="height:13px">
            <td style="width: 38%; height: 10px;">Satuan Pendidikan</td>
            <td style="width: 2%; height: 10px;">:</td>
            <td style="width: 60%; height: 10px;">SMA Negeri 1 Pekalongan</td>
        </tr>
        <tr style="height:13px">
            <td style="width: 38%; height: 10px;">Nomor Pokok Sekolah Nasional</td>
            <td style="width: 2%; height: 10px;">:</td>
            <td style="width: 60%; height: 10px;">20329517</td>
        </tr>
        <tr style="height:13px">
            <td style="width: 38%; height: 10px;">Nama Lengkap</td>
            <td style="width: 2%; height: 10px;">:</td>
            <td style="width: 60%; height: 10px; font-weight: bold;">
                <?= $data_nilai[0]['nama_lengkap_data_siswa'] ?></td>
        </tr>
        <tr style="height:13px">
            <td>Tempat, Tanggal Lahir</td>
            <td>:</td>
            <td><?= ucwords(strtolower($data_nilai[0]['tempat_lahir_data_dapodik'])) ?>,
                <?= formatDateIndo($data_nilai[0]['tanggal_lahir_data_dapodik']) ?></td>
        </tr>

        <tr style="height:13px">
            <td>Nomor Induk Siswa Nasional</td>
            <td>:</td>
            <td><?= $data_nilai[0]['id_data_dapodik'] ?></td>
        </tr>
        <tr style="height:13px">
            <td>Nomor Ijazah</td>
            <td>:</td>
            <td>-</td>
        </tr>
        <tr style="height:13px">
            <td>Tanggal Kelulusan</td>
            <td>:</td>
            <td>05 Mei 2025</td>
        </tr>
    </table>
    <p style="margin-top: 3px;">
        Dinyatakan <b>LULUS</b> dari satuan pendidikan berdasarkan kriteria kelulusan SMA Negeri 1 Pekalongan Kota
        Pekalongan
        Tahun
        Ajaran 2024/2025 dengan nilai sebagai berikut:
    </p>
    <table style="margin-top: 3px; border-collapse: collapse; border: 1px solid black; height: 20px;">
        <tr>
            <th style="border: 1px solid black; width: 5%; text-align: center; height: 20px;">No</th>
            <th style="border: 1px solid black; width: 75%; text-align: center;">Mata Pelajaran</th>
            <th style="border: 1px solid black; width: 20%; text-align: center;">Nilai</th>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: left; font-weight: bold; height: 20px;" colspan="3">
                Kelompok Mata Pelajaran Umum
            </td>
        </tr>
        <?php 
        $no = 1;
        foreach ($urutan_mapel_umum as $key => $value) {
            // check if mapel exist in groupAverageNilaiAkhirByMapel
            if (array_key_exists($value['id_mapel'], $groupAverageNilaiAkhirByMapel)) {
                $mapel = $value['nama_mapel'];
                if($value['kode_mapel'] == 'PAB'){
                    $mapel = 'Pendidikan Agama '. ucwords(strtolower($data_nilai[0]['agama_data_dapodik'])) . ' dan Budi Pekerti';
                }
                $id_mapel = $value['id_mapel'];
                $averageNilaiAkhir = $groupAverageNilaiAkhirByMapel[$id_mapel]['nilai_akhir'];
                echo '<tr>';
                echo '<td style="border: 1px solid black; text-align: center;  height: 15px;">' . $no . '</td>';
                echo '<td style="border: 1px solid black; text-align: left;  height: 15px;">' . $mapel . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;  height: 15px;">' . $averageNilaiAkhir . '</td>';
                echo '</tr>';
                $no++;
            } else {
                continue; // skip if mapel not exist in groupAverageNilaiAkhirByMapel
            }
        }
        ?>
        <tr>
            <td style="border: 1px solid black; text-align: left; font-weight: bold; height: 20px;" colspan="3">
                Kelompok Mata Pelajaran Pilihan
            </td>
        </tr>
        <?php
        $no = 1;
        foreach ($urutan_mapel_pilihan as $key => $value) {
            // check if mapel exist in groupAverageNilaiAkhirByMapel
            if (array_key_exists($value['id_mapel'], $groupAverageNilaiAkhirByMapel)) {
                $mapel = $value['nama_mapel'];
                $id_mapel = $value['id_mapel'];
                $averageNilaiAkhir = $groupAverageNilaiAkhirByMapel[$id_mapel]['nilai_akhir'];
                echo '<tr>';
                echo '<td style="border: 1px solid black; text-align: center;  height: 15px;">' . $no . '</td>';
                echo '<td style="border: 1px solid black; text-align: left;  height: 15px;">' . $mapel . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;  height: 15px;">' . $averageNilaiAkhir . '</td>';
                echo '</tr>';
                $no++;
            } else {
                continue; // skip if mapel not exist in groupAverageNilaiAkhirByMapel
            }
        }
        ?>
        <tr>
            <td style="border: 1px solid black; text-align: left; font-weight: bold; height: 20px;" colspan="3">
                Muatan Lokal
            </td>
        </tr>
        <?php
        $no = 1;
        foreach ($urutan_mapel_lokal as $key => $value) {
            // check if mapel exist in groupAverageNilaiAkhirByMapel
            if (array_key_exists($value['id_mapel'], $groupAverageNilaiAkhirByMapel)) {
                $mapel = $value['nama_mapel'];
                $id_mapel = $value['id_mapel'];
                $averageNilaiAkhir = $groupAverageNilaiAkhirByMapel[$id_mapel]['nilai_akhir'];
                echo '<tr>';
                echo '<td style="border: 1px solid black; text-align: center;  height: 15px;">' . $no . '</td>';
                echo '<td style="border: 1px solid black; text-align: left;  height: 15px;">' . $mapel . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;  height: 15px;">' . $averageNilaiAkhir . '</td>';
                echo '</tr>';
                $no++;
            } else {
                continue; // skip if mapel not exist in groupAverageNilaiAkhirByMapel
            }
        }
        ?>
        <tr>
            <td colspan="2" style="border: 1px solid black; text-align: center; font-weight: bold;">Rata-Rata
            </td>
            <td style="border: 1px solid black; text-align: center; font-weight: bold;">
                <?= number_format($averageNilai, 2, '.', '') ?></td>
        </tr>
    </table>
    <p style="margin-top: 5px;">Surat Keterangan Lulus ini berlaku sementara sampai dengan
        diterbitkannya Ijazah Tahun Ajaran 2024/2025, untuk menjadikan maklum bagi yang berkepentingan.</p>

    <table style="margin-top: 3px;">
        <tr>
            <td style="width: 45%"></td>
            <td style="width: 20%; margin-right: 20px; "></td>
            <td style="width: 28%; text-align: left;" id="ttd">
                <p style="">Pekalongan, 05 Mei 2025</p>
                <p style="">Kepala Sekolah</p><br><br><br><br><br>
                <p style="text-decoration: underline; font-weight: bold; font-size: 13px;">Drs. Abdur Rozak</p>
                <p style="font-weight: bold; font-size: 13px;">NIP. 19650802 199203 1 008</p>
            </td>
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">
function formatDateIndo(date) {
    var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    var date = new Date(date);
    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();

    return day + ' ' + monthNames[monthIndex] + ' ' + year;
}
</script>