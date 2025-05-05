<style>
body {
    font-family: 'Arial', sans-serif;
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
    // dd($data);
    foreach ($data_nilai as $key => $value) {
        if ($value['tipe_nilai'] == '1') {
            $groupNilaiRaporByMapel[$value['id_mapel']][] = $value;
        } else{
            $groupNilaiUjianByMapel[$value['id_mapel']][] = $value;
        }
    }

    $groupNilaiKelasX = array();
    $groupNilaiKelasXI = array();
    $groupNilaiKelasXII = array();
    $averageNilaiByMapel = 0;
    // dd($groupNilaiRaporByMapel, $groupNilaiUjianByMapel);

?>

<img src="<?= $imageSrc ?>" alt="Logo" style="width: 100%; text-align: center;">
<table style="margin-top: 3px;">
    <tr>
        <td style="width: 25%"></td>
        <td style="width: 50%; text-align: center;">
            <h3 style="font-weight: bold">TRANSKRIP NILAI</h3>
            <!-- <h4 style="font-weight: bold">TAHUN AJARAN 2024/2025</h4> -->
            <!-- <p>Nomor : 420 / 128.a</p> -->
        </td>
        <td style="width: 25%"></td>
    </tr>
</table>
<div class="container" style="margin-top: 2px;">
    <table style="margin-top: 3px; margin-right: 10px; margin-left: 10px;">
        <tr>
            <td style="width: 15%; min-width: 15%;">Nama </td>
            <td style="width: 8px;">:</td>
            <td style="width: 38%; min-width: 38%;">
                <?= ucwords(strtolower($data_nilai[0]['nama_lengkap_data_dapodik'])) ?>
            </td>
            <td style="width: 2%; min-width: 2%;"></td>
            <td style="width: 12%; min-width: 12%;">Kelas</td>
            <td style="width: 8px; min-width: 8px;">:</td>
            <td style="width: 31%; min-width: 31%;"><?= $data_nilai[0]['kelas_data_dapodik'] ?></td>
        </tr>
        <tr>
            <td style="width: 12%; min-width: 12%;">NIS / NISN</td>
            <td style="width: 8px;">:</td>
            <td style="width: 38%; min-width: 38%;"><?= $data_nilai[0]['nis_data_dapodik'] ?> /
                <?= $data_nilai[0]['id_data_dapodik'] ?></td>
            <td style="width: 2%; min-width: 2%;"></td>
            <td style="width: 12%; min-width: 12%;">Sekolah</td>
            <td style="width: 8px; min-width: 8px;">:</td>
            <td style="width: 31%; min-width: 31%;">SMA Negeri 1 Pekalongan</td>
        </tr>
    </table>

    <table style="margin-top: 3px; border-collapse: collapse; border: 1px solid black;">
        <tr>
            <td style="border: 1px solid black; text-align: center; font-weight: bold; max-width: 34%; width: 34%;"
                colspan="2" rowspan="3">
                Mata Pelajaran
            </td>

            <td style="border: 1px solid black; text-align: center; font-weight: bold; max-width: 48%; width: 48%;"
                colspan="6">
                Nilai Semester
            </td>
            <td style="border: 1px solid black; text-align: center; font-weight: bold; max-width: 8%; width: 8%;"
                rowspan="3">
                Nilai Ujian
            </td>
            <td style="border: 1px solid black; text-align: center; font-weight: bold; max-width: 8%; width: 8%;"
                rowspan="3">
                Rata-rata
            </td>
        </tr>

        <tr>
            <td style="border: 1px solid black; text-align: center; font-weight: bold; max-width: 16%; width: 16%;"
                colspan="2">
                Kelas X
            </td>
            <td style="border: 1px solid black; text-align: center; font-weight: bold; max-width: 16%; width: 16%;"
                colspan="2">
                Kelas XI
            </td>
            <td style="border: 1px solid black; text-align: center; font-weight: bold; max-width: 16%; width: 16%;"
                colspan="2">
                Kelas XII
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; max-width: 8%; width: 8%; font-size: 14px;">
                SMT 1
            </td>

            <td style="border: 1px solid black; text-align: center; max-width: 8%; width: 8%; font-size: 14px;">
                SMT 2
            </td>
            <td style="border: 1px solid black; text-align: center; max-width: 8%; width: 8%; font-size: 14px;">
                SMT 3
            </td>
            <td style="border: 1px solid black; text-align: center; max-width: 8%; width: 8%; font-size: 14px;">
                SMT 4
            </td>
            <td style="border: 1px solid black; text-align: center; max-width: 8%; width: 8%; font-size: 14px;">
                SMT 5
            </td>
            <td style="border: 1px solid black; text-align: center; max-width: 8%; width: 8%; font-size: 14px;">
                SMT 6
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; font-weight: bold; height: 26px;" colspan="10">
                Kelompok Mata Pelajaran Umum
            </td>
        </tr>
        <?php 
        $jumlah_nilai_smt_1 = 0;
        $jumlah_nilai_smt_2 = 0;
        $jumlah_nilai_smt_3 = 0;
        $jumlah_nilai_smt_4 = 0;
        $jumlah_nilai_smt_5 = 0;
        $jumlah_nilai_smt_6 = 0;
        $jumlah_data_ujian = 0;
        $jumlah_data_smt_1 = 0;
        $jumlah_data_smt_2 = 0;
        $jumlah_data_smt_3 = 0;
        $jumlah_data_smt_4 = 0;
        $jumlah_data_smt_5 = 0;
        $jumlah_data_smt_6 = 0;
        $jumlah_nilai_ujian = 0;
        $no = 1;
        
        foreach ($urutan_mapel_umum as $key => $value) {
            // check if mapel exist in groupNilaiRaporByMapel
            if (array_key_exists($value['id_mapel'], $groupNilaiRaporByMapel)) {
                $smt1 = 0;
                $smt2 = 0;
                $smt3 = 0;
                $smt4 = 0;
                $smt5 = 0;
                $smt6 = 0;
                $ujian = 0;
                $averageRess = 0;
                foreach ($groupNilaiRaporByMapel[$value['id_mapel']] as $key2 => $value2) {
                    if ($value2['tahun_ajaran'] == '2022/2023' && $value2['nama_semester'] == '1') {
                        $smt1 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_1 += $smt1;
                        $jumlah_data_smt_1++;
                    } elseif ($value2['tahun_ajaran'] == '2022/2023' && $value2['nama_semester'] == '2') {
                        $smt2 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_2 += $smt2;
                        $jumlah_data_smt_2++;
                    } elseif ($value2['tahun_ajaran'] == '2023/2024' && $value2['nama_semester'] == '1') {
                        $smt3 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_3 += $smt3;
                        $jumlah_data_smt_3++;
                    } elseif ($value2['tahun_ajaran'] == '2023/2024' && $value2['nama_semester'] == '2') {
                        $smt4 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_4 += $smt4;
                        $jumlah_data_smt_4++;
                    } elseif ($value2['tahun_ajaran'] == '2024/2025' && $value2['nama_semester'] == '1') {
                        $smt5 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_5 += $smt5;
                        $jumlah_data_smt_5++;
                    } elseif ($value2['tahun_ajaran'] == '2024/2025' && $value2['nama_semester'] == '2') {
                        $smt6 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_6 += $smt6;
                        $jumlah_data_smt_6++;
                    }
                }
                if (array_key_exists($value['id_mapel'], $groupNilaiUjianByMapel)) {
                    $ujian = $groupNilaiUjianByMapel[$value['id_mapel']][0]['nilai_rapor'];
                    $jumlah_nilai_ujian += $ujian;
                    $jumlah_data_ujian++;
                } else {
                    $ujian = 0;
                }
                echo '<tr>';
                echo '<td style="border: 1px solid black; text-align: center;">' . $no . '</td>';
                echo '<td style="border: 1px solid black; text-align: left;">' . $value['nama_mapel'] . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt1 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt1 == 0 ? '-' : number_format($smt1, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt2 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt2 == 0 ? '-' : number_format($smt2, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt3 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt3 == 0 ? '-' : number_format($smt3, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt4 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt4 == 0 ? '-' : number_format($smt4, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt5 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt5 == 0 ? '-' : number_format($smt5, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt6 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt6 == 0 ? '-' : number_format($smt6, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($ujian == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($ujian == 0 ? '-' : number_format($ujian, 2, '.', '')) . '</td>';
                // jumlah tidak kosong
                $jumlah_nilai = 0;
                if ($smt1 != 0) {
                    $jumlah_nilai++;
                }
                if ($smt2 != 0) {
                    $jumlah_nilai++;
                }
                if ($smt3 != 0) {
                    $jumlah_nilai++;
                }
                if ($smt4 != 0) {
                    $jumlah_nilai++;
                }
                if ($smt5 != 0) {
                    $jumlah_nilai++;
                }
                if ($smt6 != 0) {
                    $jumlah_nilai++;
                }

            
                // hitung rata-rata
                if ($jumlah_nilai > 0) {
                    $avgRapor = number_format(($smt1 + $smt2 + $smt3 + $smt4 + $smt5 + $smt6) / $jumlah_nilai,2);
                    $averageRess = ($ujian != 0) ? ($avgRapor + $ujian) / 2 : $avgRapor;
                } else {
                    $averageRess = 0;
                }
                
                $averageNilaiByMapel += number_format($averageRess, 2);
                echo '<td style="border: 1px solid black; text-align: center;">' . number_format($averageRess, 2, '.', '') . '</td>';
                echo '</tr>';
                $no++;
            } else {
                continue; // skip if mapel not exist in groupAverageNilaiAkhirByMapel
            }
        }
        ?>
        <tr>
            <td style="border: 1px solid black; text-align: center; font-weight: bold; height: 26px;" colspan="10">
                Kelompok Mata Pelajaran Pilihan
            </td>
        </tr>
        <?php
        $no = 1;
        foreach ($urutan_mapel_pilihan as $key => $value) {
            // check if mapel exist in groupNilaiRaporByMapel
            if (array_key_exists($value['id_mapel'], $groupNilaiRaporByMapel)) {
                $smt1 = 0;
                $smt2 = 0;
                $smt3 = 0;
                $smt4 = 0;
                $smt5 = 0;
                $smt6 = 0;
                $ujian = 0;
                $averageRess = 0;
                foreach ($groupNilaiRaporByMapel[$value['id_mapel']] as $key2 => $value2) {
                    if ($value2['tahun_ajaran'] == '2022/2023' && $value2['nama_semester'] == '1') {
                        $smt1 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_1 += $smt1;
                        $jumlah_data_smt_1++;
                    } elseif ($value2['tahun_ajaran'] == '2022/2023' && $value2['nama_semester'] == '2') {
                        $smt2 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_2 += $smt2;
                        $jumlah_data_smt_2++;
                    } elseif ($value2['tahun_ajaran'] == '2023/2024' && $value2['nama_semester'] == '1') {
                        $smt3 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_3 += $smt3;
                        $jumlah_data_smt_3++;
                    } elseif ($value2['tahun_ajaran'] == '2023/2024' && $value2['nama_semester'] == '2') {
                        $smt4 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_4 += $smt4;
                        $jumlah_data_smt_4++;
                    } elseif ($value2['tahun_ajaran'] == '2024/2025' && $value2['nama_semester'] == '1') {
                        $smt5 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_5 += $smt5;
                        $jumlah_data_smt_5++;
                    } elseif ($value2['tahun_ajaran'] == '2024/2025' && $value2['nama_semester'] == '2') {
                        $smt6 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_6 += $smt6;
                        $jumlah_data_smt_6++;
                    }
                }
                if (array_key_exists($value['id_mapel'], $groupNilaiUjianByMapel)) {
                    $ujian = $groupNilaiUjianByMapel[$value['id_mapel']][0]['nilai_rapor'];
                    $jumlah_nilai_ujian += $ujian;
                    $jumlah_data_ujian++;
                } else {
                    $ujian = 0;
                }
                echo '<tr>';
                echo '<td style="border: 1px solid black; text-align: center;">' . $no . '</td>';
                echo '<td style="border: 1px solid black; text-align: left;">' . $value['nama_mapel'] . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt1 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt1 == 0 ? '-' : number_format($smt1, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt2 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt2 == 0 ? '-' : number_format($smt2, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt3 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt3 == 0 ? '-' : number_format($smt3, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt4 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt4 == 0 ? '-' : number_format($smt4, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt5 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt5 == 0 ? '-' : number_format($smt5, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt6 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt6 == 0 ? '-' : number_format($smt6, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($ujian == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($ujian == 0 ? '-' : number_format($ujian, 2, '.', '')) . '</td>';
                // jumlah tidak kosong
                $jumlah_nilai = 0;
                if ($smt1 != 0) {
                    $jumlah_nilai++;
                }
                if ($smt2 != 0) {
                    $jumlah_nilai++;
                }
                if ($smt3 != 0) {
                    $jumlah_nilai++;
                }
                if ($smt4 != 0) {
                    $jumlah_nilai++;
                }
                if ($smt5 != 0) {
                    $jumlah_nilai++;
                }
                if ($smt6 != 0) {
                    $jumlah_nilai++;
                }
            
                // hitung rata-rata
                if ($jumlah_nilai > 0) {
                     $avgRapor = number_format(($smt1 + $smt2 + $smt3 + $smt4 + $smt5 + $smt6) / $jumlah_nilai,2);
                     $averageRess = ($ujian != 0) ? ($avgRapor + $ujian) / 2 : $avgRapor;
                } else {
                    $averageRess = 0;
                }
                
                $averageNilaiByMapel += number_format($averageRess, 2);
                echo '<td style="border: 1px solid black; text-align: center;">' . number_format($averageRess, 2, '.', '') . '</td>';
                echo '</tr>';
                $no++;
            } else {
                continue; // skip if mapel not exist in groupAverageNilaiAkhirByMapel
            }
        }
        ?>
        <tr>
            <td style="border: 1px solid black; text-align: center; font-weight: bold; height: 26px;" colspan="10">
                Muatan Lokal
            </td>
        </tr>
        <?php
        $no = 1;
        foreach ($urutan_mapel_lokal as $key => $value) {
            // check if mapel exist in groupNilaiRaporByMapel
            if (array_key_exists($value['id_mapel'], $groupNilaiRaporByMapel)) {
                $smt1 = 0;
                $smt2 = 0;
                $smt3 = 0;
                $smt4 = 0;
                $smt5 = 0;
                $smt6 = 0;
                $ujian = 0;
                $averageRess = 0;
                foreach ($groupNilaiRaporByMapel[$value['id_mapel']] as $key2 => $value2) {
                    if ($value2['tahun_ajaran'] == '2022/2023' && $value2['nama_semester'] == '1') {
                        $smt1 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_1 += $smt1;
                        $jumlah_data_smt_1++;
                    } elseif ($value2['tahun_ajaran'] == '2022/2023' && $value2['nama_semester'] == '2') {
                        $smt2 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_2 += $smt2;
                        $jumlah_data_smt_2++;
                    } elseif ($value2['tahun_ajaran'] == '2023/2024' && $value2['nama_semester'] == '1') {
                        $smt3 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_3 += $smt3;
                        $jumlah_data_smt_3++;
                    } elseif ($value2['tahun_ajaran'] == '2023/2024' && $value2['nama_semester'] == '2') {
                        $smt4 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_4 += $smt4;
                        $jumlah_data_smt_4++;
                    } elseif ($value2['tahun_ajaran'] == '2024/2025' && $value2['nama_semester'] == '1') {
                        $smt5 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_5 += $smt5;
                        $jumlah_data_smt_5++;
                    } elseif ($value2['tahun_ajaran'] == '2024/2025' && $value2['nama_semester'] == '2') {
                        $smt6 = $value2['nilai_rapor'];
                        $jumlah_nilai_smt_6 += $smt6;
                        $jumlah_data_smt_6++;
                    }
                }
                if (array_key_exists($value['id_mapel'], $groupNilaiUjianByMapel)) {
                    $ujian = $groupNilaiUjianByMapel[$value['id_mapel']][0]['nilai_rapor'];
                    $jumlah_nilai_ujian += $ujian;
                    $jumlah_data_ujian++;
                } else {
                    $ujian = 0;
                }
                echo '<tr>';
                echo '<td style="border: 1px solid black; text-align: center;">' . $no . '</td>';
                echo '<td style="border: 1px solid black; text-align: left;">' . $value['nama_mapel'] . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt1 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt1 == 0 ? '-' : number_format($smt1, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt2 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt2 == 0 ? '-' : number_format($smt2, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt3 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt3 == 0 ? '-' : number_format($smt3, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt4 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt4 == 0 ? '-' : number_format($smt4, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt5 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt5 == 0 ? '-' : number_format($smt5, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($smt6 == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($smt6 == 0 ? '-' : number_format($smt6, 2, '.', '')) . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;'.($ujian == 0 ? 'background-color: #f2f2f2;' : '').'">' . ($ujian == 0 ? '-' : number_format($ujian, 2, '.', '')) . '</td>';
                // jumlah tidak kosong
                $jumlah_nilai = 0;

                if ($smt1 != 0) {
                    $jumlah_nilai++;
                }

                if ($smt2 != 0) {
                    $jumlah_nilai++;
                }

                if ($smt3 != 0) {
                    $jumlah_nilai++;
                }

                if ($smt4 != 0) {
                    $jumlah_nilai++;
                }

                if ($smt5 != 0) {
                    $jumlah_nilai++;
                }

                if ($smt6 != 0) {
                    $jumlah_nilai++;
                }

            
                // hitung rata-rata
                if ($jumlah_nilai > 0) {
                     $avgRapor = number_format(($smt1 + $smt2 + $smt3 + $smt4 + $smt5 + $smt6) / $jumlah_nilai,2);
                     $averageRess = ($ujian != 0) ? ($avgRapor + $ujian) / 2 : $avgRapor;
                } else {
                    $averageRess = 0;
                }

                $averageNilaiByMapel += number_format($averageRess, 2);
                $IP_Kumulatif = $averageNilaiByMapel / 17;
                echo '<td style="border: 1px solid black; text-align: center;">' . number_format($averageRess, 2, '.', '') . '</td>';
                echo '</tr>';
                $no++;
            } else {
                continue; // skip if mapel not exist in groupAverageNilaiAkhirByMapel
            }
        }

       
        ?>

        <tr>
            <td style="border: 1px solid black; text-align: center; font-weight: bold; height: 26px;" colspan="2">
                IP Kumulatif
            </td>
            <td style="border: 1px solid black; text-align: left; font-weight: bold;" colspan="8">
                <?= number_format($IP_Kumulatif, 2, '.', '') ?>
            </td>
        </tr>
    </table>

    <table style="margin-top: 3px;">
        <tr>
            <td style="width: 45%"></td>
            <td style="width: 20%; margin-right: 20px; "></td>
            <td style="width: 28%; text-align: left;" id="ttd">
                <p style="">Pekalongan, <?= formatDateIndo(date('Y-m-d')) ?></p>
                <p style="">Kepala Sekolah</p><br><br><br><br><br>
                <p style="text-decoration: underline; font-weight: bold; font-size: 13px;">Drs. ABDUR ROZAK</p>
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