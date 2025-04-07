<style>
body {
    font-family: 'Times New Roman', Times, serif;
    margin: 0;
    padding: 0;
}

table {
    width: 100%;
    border-collapse: collapse;
}

td {
    padding: 3px;
    font-size: 15px;
    border: 1px solid black;
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

.header-title {
    text-align: center;
    font-weight: bold;
}

.center {
    text-align: center;
}

.left {
    text-align: left;
}

.bg-gray {
    background-color: #f2f2f2;
}
</style>

<?php
if (!function_exists('formatDateIndo')) {
    function formatDateIndo($date) {
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $tanggal = explode('-', $date);
        return $tanggal[2] . ' ' . $bulan[(int)$tanggal[1]] . ' ' . $tanggal[0];
    }
}

$jumlah = count($data_nilai);
$no_rows = 1;

foreach ($data_nilai as $data) :
    $groupNilaiRaporByMapel = [];
    $groupNilaiUjianByMapel = [];
    $no_rows++;

    foreach ($data as $value) {
        if ($value['tipe_nilai'] == '1') {
            $groupNilaiRaporByMapel[$value['id_mapel']][] = $value;
        } else {
            $groupNilaiUjianByMapel[$value['id_mapel']][] = $value;
        }
    }

    // Initialize variables for averages
    $averageNilaiByMapel = [];
    $jumlah_nilai = array_fill(1, 6, 0);
    $jumlah_data = array_fill(1, 6, 0);
    $jumlah_nilai_ujian = 0;
    $jumlah_data_ujian = 0;

    // Header Section
    ?>
<img src="<?= $imageSrc ?>" alt="Logo" style="width: 100%; text-align: center;">
<table style="margin-top: 3px;">
    <tr>
        <td style="width: 25%"></td>
        <td style="width: 50%;" class="header-title">
            <h4>TRANSKRIP NILAI</h4>
        </td>
        <td style="width: 25%"></td>
    </tr>
</table>
<div class="container" style="margin-top: 2px;">
    <table style="margin: 3px 10px;">
        <tr>
            <td style="width: 15%;">Nama</td>
            <td>:</td>
            <td style="width: 38%;"><?= ucwords(strtolower($data[0]['nama_lengkap_data_dapodik'])) ?></td>
            <td></td>
            <td style="width: 12%;">Kelas</td>
            <td>:</td>
            <td style="width: 31%;"><?= $data[0]['kelas_data_dapodik'] ?></td>
        </tr>
        <tr>
            <td>NIS / NISN</td>
            <td>:</td>
            <td><?= $data[0]['nis_data_dapodik'] ?> / <?= $data[0]['id_data_dapodik'] ?></td>
            <td></td>
            <td>Sekolah</td>
            <td>:</td>
            <td>SMA Negeri 1 Pekalongan</td>
        </tr>
    </table>

    <table style="margin-top: 3px;">
        <tr>
            <td class="center" colspan="2" rowspan="3">Mata Pelajaran</td>
            <td class="center" colspan="6">Nilai Semester</td>
            <td class="center" rowspan="3">Nilai Ujian</td>
            <td class="center" rowspan="3">Rata-rata</td>
        </tr>
        <tr>
            <td class="center" colspan="2">Kelas X</td>
            <td class="center" colspan="2">Kelas XI</td>
            <td class="center" colspan="2">Kelas XII</td>
        </tr>
        <tr>
            <?php for ($i = 1; $i <= 6; $i++): ?>
            <td class="center">SMT <?= $i ?></td>
            <?php endfor; ?>
        </tr>
        <tr>
            <td class="center" colspan="10" style="font-weight: bold;">Kelompok Mata Pelajaran Umum</td>
        </tr>
        <?php
            $no = 1;
            foreach ($urutan_mapel_umum as $value) {
                if (isset($groupNilaiRaporByMapel[$value['id_mapel']])) {
                    $smt = array_fill(1, 6, 0);
                    foreach ($groupNilaiRaporByMapel[$value['id_mapel']] as $value2) {
                        $semester = (int)$value2['nama_semester'];
                        $tahun = (int)substr($value2['tahun_ajaran'], 0, 4) - 2022;
                        $smt[$tahun * 2 + $semester - 1] = $value2['nilai_rapor'];
                        $jumlah_nilai[$tahun * 2 + $semester - 1] += $value2['nilai_rapor'];
                        $jumlah_data[$tahun * 2 + $semester - 1]++;
                    }
                    $ujian = isset($groupNilaiUjianByMapel[$value['id_mapel']]) ? $groupNilaiUjianByMapel[$value['id_mapel']][0]['nilai_rapor'] : 0;
                    $jumlah_nilai_ujian += $ujian;
                    $jumlah_data_ujian++;

                    // Display row
                    echo '<tr>';
                    echo '<td class="center">' . $no . '</td>';
                    echo '<td class="left">' . $value['nama_mapel'] . '</td>';
                    foreach ($smt as $index => $nilai) {
                        echo '<td class="center ' . ($nilai == 0 ? 'bg-gray' : '') . '">' . ($nilai == 0 ? '-' : number_format($nilai, 2, '.', '')) . '</td>';
                    }
                    echo '<td class="center ' . ($ujian == 0 ? 'bg-gray' : '') . '">' . ($ujian == 0 ? '-' : number_format($ujian, 2, '.', '')) . '</td>';
                    
                    // Calculate average
                    $jumlah_nilai_total = array_filter($smt);
                    $jumlah_nilai_total[] = $ujian;
                    $rata_rata = count($jumlah_nilai_total) > 0 ? array_sum($jumlah_nilai_total) / count($jumlah_nilai_total) : 0;
                    echo '<td class="center">' . number_format($rata_rata, 2, '.', '') . '</td>';
                    echo '</tr>';
                    $no++;
                }
            }
            ?>
        <tr>
            <td class="center" colspan="10" style="font-weight: bold;">Kelompok Mata Pelajaran Pilihan</td>
        </tr>
        <?php
            $no = 1;
            foreach ($urutan_mapel_pilihan as $value) {
                if (isset($groupNilaiRaporByMapel[$value['id_mapel']])) {
                    $smt = array_fill(1, 6, 0);
                    foreach ($groupNilaiRaporByMapel[$value['id_mapel']] as $value2) {
                        $semester = (int)$value2['nama_semester'];
                        $tahun = (int)substr($value2['tahun_ajaran'], 0, 4) - 2022;
                        $smt[$tahun * 2 + $semester - 1] = $value2['nilai_rapor'];
                        $jumlah_nilai[$tahun * 2 + $semester - 1] += $value2['nilai_rapor'];
                        $jumlah_data[$tahun * 2 + $semester - 1]++;
                    }
                    $ujian = isset($groupNilaiUjianByMapel[$value['id_mapel']]) ? $groupNilaiUjianByMapel[$value['id_mapel']][0]['nilai_rapor'] : 0;
                    $jumlah_nilai_ujian += $ujian;
                    $jumlah_data_ujian++;

                    // Display row
                    echo '<tr>';
                    echo '<td class="center">' . $no . '</td>';
                    echo '<td class="left">' . $value['nama_mapel'] . '</td>';
                    foreach ($smt as $index => $nilai) {
                        echo '<td class="center ' . ($nilai == 0 ? 'bg-gray' : '') . '">' . ($nilai == 0 ? '-' : number_format($nilai, 2, '.', '')) . '</td>';
                    }
                    echo '<td class="center ' . ($ujian == 0 ? 'bg-gray' : '') . '">' . ($ujian == 0 ? '-' : number_format($ujian, 2, '.', '')) . '</td>';
                    
                    // Calculate average
                    $jumlah_nilai_total = array_filter($smt);
                    $jumlah_nilai_total[] = $ujian;
                    $rata_rata = count($jumlah_nilai_total) > 0 ? array_sum($jumlah_nilai_total) / count($jumlah_nilai_total) : 0;
                    echo '<td class="center">' . number_format($rata_rata, 2, '.', '') . '</td>';
                    echo '</tr>';
                    $no++;
                }
            }
            ?>
        <tr>
            <td class="center" colspan="10" style="font-weight: bold;">Muatan Lokal</td>
        </tr>
        <?php
            $no = 1;
            foreach ($urutan_mapel_lokal as $value) {
                if (isset($groupNilaiRaporByMapel[$value['id_mapel']])) {
                    $smt = array_fill(1, 6, 0);
                    foreach ($groupNilaiRaporByMapel[$value['id_mapel']] as $value2) {
                        $semester = (int)$value2['nama_semester'];
                        $tahun = (int)substr($value2['tahun_ajaran'], 0, 4) - 2022;
                        $smt[$tahun * 2 + $semester - 1] = $value2['nilai_rapor'];
                        $jumlah_nilai[$tahun * 2 + $semester - 1] += $value2['nilai_rapor'];
                        $jumlah_data[$tahun * 2 + $semester - 1]++;
                    }
                    $ujian = isset($groupNilaiUjianByMapel[$value['id_mapel']]) ? $groupNilaiUjianByMapel[$value['id_mapel']][0]['nilai_rapor'] : 0;
                    $jumlah_nilai_ujian += $ujian;
                    $jumlah_data_ujian++;

                    // Display row
                    echo '<tr>';
                    echo '<td class="center">' . $no . '</td>';
                    echo '<td class="left">' . $value['nama_mapel'] . '</td>';
                    foreach ($smt as $index => $nilai) {
                        echo '<td class="center ' . ($nilai == 0 ? 'bg-gray' : '') . '">' . ($nilai == 0 ? '-' : number_format($nilai, 2, '.', '')) . '</td>';
                    }
                    echo '<td class="center ' . ($ujian == 0 ? 'bg-gray' : '') . '">' . ($ujian == 0 ? '-' : number_format($ujian, 2, '.', '')) . '</td>';
                    
                    // Calculate average
                    $jumlah_nilai_total = array_filter($smt);
                    $jumlah_nilai_total[] = $ujian;
                    $rata_rata = count($jumlah_nilai_total) > 0 ? array_sum($jumlah_nilai_total) / count($jumlah_nilai_total) : 0;
                    echo '<td class="center">' . number_format($rata_rata, 2, '.', '') . '</td>';
                    echo '</tr>';
                    $no++;
                }
            }

            // Calculate overall averages
            $average_all = array_sum($jumlah_nilai) / array_sum($jumlah_data);
            ?>
        <tr>
            <td class="center" colspan="2" style="font-weight: bold;">Rata-rata Nilai</td>
            <?php foreach ($jumlah_nilai as $index => $total) : ?>
            <td class="center" style="font-weight: bold;">
                <?= ($jumlah_data[$index] > 0 ? number_format($total / $jumlah_data[$index], 2, '.', '') : '-') ?>
            </td>
            <?php endforeach; ?>
            <td class="center" style="font-weight: bold;">
                <?= ($jumlah_data_ujian > 0 ? number_format($jumlah_nilai_ujian / $jumlah_data_ujian, 2, '.', '') : '-') ?>
            </td>
        </tr>
        <tr>
            <td class="center" colspan="2" style="font-weight: bold;">IP Kumulatif</td>
            <td class="left" colspan="8"><?= number_format($average_all, 2, '.', '') ?></td>
        </tr>
    </table>

    <table style="margin-top: 3px;">
        <tr>
            <td style="width: 45%"></td>
            <td style="width: 20%; margin-right: 20px;"></td>
            <td style="width: 28%; text-align: left;" id="ttd">
                <p>Pekalongan,</p>
                <p>Kepala Sekolah</p><br><br><br><br><br>
                <p style="text-decoration: underline; font-weight: bold; font-size: 13px;">Drs. ABDUR ROZAK</p>
                <p style="font-weight: bold; font-size: 13px;">NIP. 19650802 199203 1 008</p>
            </td>
        </tr>
    </table>
</div>
<?php if ($no_rows < $jumlah) : ?>
<div style="page-break-after: always;"></div>
<?php endif; ?>
<?php endforeach; ?>

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