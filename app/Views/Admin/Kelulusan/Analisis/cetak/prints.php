<style>
body {
    font-family: 'Calibri';
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

.thead_mapel tr {
    font-size: 15px;
}

.container_tabel {
    text-align: justify;
    margin: 0 20px;
    padding: 0;
}
</style>
<table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
    <?php 
    if($data_mapel != null):
        ini_set('memory_limit', '256M');
        foreach ($data_nilai as $data) {
            $groupMapelAktif = array();
               
            // dd($data);
            foreach ($data as $key => $value) {
                if ($value['tipe_nilai'] == '1') {
                       $groupMapelAktif[$value['id_mapel']][] = $value;
                }
            }
        }
    // urut groupMapelAktif by kel_mapel DESC dan no_urutan_mapel ASC
    usort($groupMapelAktif, function ($a, $b) {
        // Sort by kel_mapel in descending order 
        if ($a[0]['kel_mapel'] == $b[0]['kel_mapel']) {
            return $a[0]['no_urutan_mapel'] <=> $b[0]['no_urutan_mapel'];
        } else {
            return $b[0]['kel_mapel'] <=> $a[0]['kel_mapel'];
        }
        
    });
    // dd($groupMapelAktif);
    $countMapel = count($groupMapelAktif);
    
    ?>
    <thead>
        <tr>
            <th style="text-align: center; width: 3%; min-width: 3%; max-width: 3%;" rowspan="2">No.
            </th>
            <th style="text-align: center; width: 5%; min-width: 5%; max-width: 5%;" rowspan="2">NIS
            </th>
            <th style="text-align: center; width: 16%; min-width: 16%; max-width: 16%;" rowspan="2">
                Nama</th>
            <th style="text-align: center; width: 7%; min-width: 7%; max-width: 7%; margin: 0 2px;" rowspan="2">
                Komponen</th>
            <th style="text-align: center; width: 60%; min-width: 60%; max-width: 60%;" colspan="<?= $countMapel; ?>">
                Nilai</th>
            <th style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg); font-size:13px"
                rowspan="2">Sikap</th>
            <th style=" text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg); font-size:13px"
                rowspan="2">Kehadiran</th>
            <th style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg); font-size:13px"
                rowspan="2">Lulus/Tidak
                Lulus</th>
        </tr>
        <tr class="thead_mapel">
            <?php foreach($groupMapelAktif as $dm): ?>
            <th style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; margin: 0 2px;">
                <?= $dm[0]['kode_mapel'] ?></th>
            <?php endforeach; ?>
        </tr>

        <?php 
            else:
        ?>

        <thead class="thead-light" style="position: sticky; top: 0; z-index: 10;">
            <tr>
                <th style="text-align: center; width: 3%; min-width: 3%; max-width: 3%;" rowspan="2">No.
                </th>
                <th style="text-align: center; width: 5%; min-width: 5%; max-width: 5%;" rowspan="2">NIS
                </th>
                <th style="text-align: center; width: 16%; min-width: 16%; max-width: 16%;" rowspan="2">
                    Nama</th>
                <th style="text-align: center; width: 7%; min-width: 7%; max-width: 7%; margin: 0 2px;" rowspan="2">
                    Komponen</th>
                <th style="text-align: center; width: 60%; min-width: 60%; max-width: 60%;">Nilai
                </th>
                <th style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                    rowspan="2">Sikap</th>
                <th style=" text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                    rowspan="2">Kehadiran</th>
                <th style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                    rowspan="2">Lulus/Tidak
                    Lulus</th>
            </tr>
            <tr class="thead_mapel">

            </tr>
        </thead>
        <?php 
            endif;
        ?>
    </thead>

    <tbody>
        <?php 
    if($data_nilai != null):
        
        $jumlah = count($data_nilai);
        $no_rows = 1;
                                    
        // dd($data_nilai);
        foreach ($data_nilai as $data) :
            $groupNilaiRaporByMapel = array();
            $groupNilaiRaporBySemester1 = array();
            $groupNilaiRaporBySemester2 = array();
            $groupNilaiRaporBySemester3 = array();
            $groupNilaiRaporBySemester4 = array();
            $groupNilaiRaporBySemester5 = array();
            $groupNilaiRaporBySemester6 = array();
            $groupNilaiUjianByMapel = array();
            $sumNilaiRaporByMapel = array();
            
            // dd($data);
            foreach ($data as $key => $value) {
                if ($value['tipe_nilai'] == '1') {
                    $groupNilaiRaporByMapel[$value['id_mapel']][] = $value;
                    if ($value['tahun_ajaran'] == '2022/2023' && $value['nama_semester'] == '1') {
                        $groupNilaiRaporBySemester1[$value['id_mapel']][] = $value;
                    } elseif ($value['tahun_ajaran'] == '2022/2023' && $value['nama_semester'] == '2') {
                        $groupNilaiRaporBySemester2[$value['id_mapel']][] = $value;
                    } elseif ($value['tahun_ajaran'] == '2023/2024' && $value['nama_semester'] == '1') {
                        $groupNilaiRaporBySemester3[$value['id_mapel']][] = $value;
                    } elseif ($value['tahun_ajaran'] == '2023/2024' && $value['nama_semester'] == '2') {
                        $groupNilaiRaporBySemester4[$value['id_mapel']][] = $value;
                    } elseif ($value['tahun_ajaran'] == '2024/2025' && $value['nama_semester'] == '1') {
                        $groupNilaiRaporBySemester5[$value['id_mapel']][] = $value;
                    } elseif ($value['tahun_ajaran'] == '2024/2025' && $value['nama_semester'] == '2') {
                        $groupNilaiRaporBySemester6[$value['id_mapel']][] = $value;
                    }
                } else{
                    $groupNilaiUjianByMapel[$value['id_mapel']][] = $value;
                }
            }
            // dd($groupNilaiRaporBySemester1, $groupNilaiRaporBySemester2, $groupNilaiRaporBySemester3, $groupNilaiRaporBySemester4, $groupNilaiRaporBySemester5, $groupNilaiRaporBySemester6, $groupNilaiUjianByMapel);
         ?>
        <tr>
            <td style=" text-align: center;" rowspan="10"><?= $no_rows++; ?>. </td>
            <td style="text-align: center;" rowspan="10"><?= $data[0]['nis_data_dapodik'] ?></td>
            <td style="text-align: left;" rowspan="10"><?= $data[0]['nama_lengkap_data_dapodik'] ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">SMT 1</td>
            <?php 
            foreach ($data_mapel as $key => $value) {
                if (array_key_exists($value['id_mapel'], $groupNilaiRaporByMapel)) {
                    if (array_key_exists($value['id_mapel'], $groupNilaiRaporBySemester1)) {
                        echo '<td style="text-align: center;">' . number_format($groupNilaiRaporBySemester1[$value['id_mapel']][0]['nilai_rapor'], 2, ',', '.') . '</td>';

                        $idMapel = $value['id_mapel'];
                        $nilai = $groupNilaiRaporBySemester1[$idMapel][0]['nilai_rapor'] ?? 0;
                                                                    
                        // Inisialisasi jika belum ada
                        if (!isset($sumNilaiRaporByMapel[$idMapel])) {
                            // dd($idMapel);
                            $sumNilaiRaporByMapel[$idMapel] = [
                                'total_nilai' => $nilai,
                                'total_data' => 1,
                            ];
                            continue;
                        }
                        
                        $sumNilaiRaporByMapel[$idMapel]['total_nilai'] += $nilai;
                        $sumNilaiRaporByMapel[$idMapel]['total_data'] += 1;
                        
                    } else {
                        echo '<td style="text-align: center;">-</td>';
                    }
                }else {
                    continue;
                }
            }
                                    // dd($sumNilaiRaporByMapel);
            ?>
            <td style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                rowspan="9">Sikap</td>
            <td style=" text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                rowspan="9">Kehadiran</td>
            <td style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                rowspan="9">Lulus/Tidak
                Lulus</td>
        </tr>
        <tr>
            <td style="text-align: center;">SMT 2</td>
            <?php 
            foreach ($data_mapel as $key => $value) {
                if (array_key_exists($value['id_mapel'], $groupNilaiRaporByMapel)) {
                    if (array_key_exists($value['id_mapel'], $groupNilaiRaporBySemester2)) {
                        echo '<td style="text-align: center;">' . number_format($groupNilaiRaporBySemester2[$value['id_mapel']][0]['nilai_rapor'], 2, ',', '.') . '</td>';
                    
                        $idMapel = $value['id_mapel'];
                        $nilai = $groupNilaiRaporBySemester2[$idMapel][0]['nilai_rapor'] ?? 0;
                                                                    
                        // Inisialisasi jika belum ada
                        if (!isset($sumNilaiRaporByMapel[$idMapel])) {
                            // dd($idMapel);
                            $sumNilaiRaporByMapel[$idMapel] = [
                                'total_nilai' => $nilai,
                                'total_data' => 1,
                            ];
                            continue;
                        }
                        
                        $sumNilaiRaporByMapel[$idMapel]['total_nilai'] += $nilai;
                        $sumNilaiRaporByMapel[$idMapel]['total_data'] += 1;
                        
                    } else {
                        echo '<td style="text-align: center;">-</td>';
                    }
                }else {
                    continue;
                }
            }
                                    // dd($sumNilaiRaporByMapel);
             ?>
        </tr>
        <tr>
            <td style="text-align: center;">SMT 3</td>
            <?php 
            foreach ($data_mapel as $key => $value) {
                if (array_key_exists($value['id_mapel'], $groupNilaiRaporByMapel)) {
                    if (array_key_exists($value['id_mapel'], $groupNilaiRaporBySemester3)) {
                        echo '<td style="text-align: center;">' . number_format($groupNilaiRaporBySemester3[$value['id_mapel']][0]['nilai_rapor'], 2, ',', '.') . '</td>';
                    
                        $idMapel = $value['id_mapel'];
                        $nilai = $groupNilaiRaporBySemester3[$idMapel][0]['nilai_rapor'] ?? 0;
                                                                    
                        // Inisialisasi jika belum ada
                        if (!isset($sumNilaiRaporByMapel[$idMapel])) {
                            // dd($idMapel);
                            $sumNilaiRaporByMapel[$idMapel] = [
                                'total_nilai' => $nilai,
                                'total_data' => 1,
                            ];
                            continue;
                        }
                        
                        $sumNilaiRaporByMapel[$idMapel]['total_nilai'] += $nilai;
                        $sumNilaiRaporByMapel[$idMapel]['total_data'] += 1;
                        
                    } else {
                        echo '<td style="text-align: center;">-</td>';
                    }
                }else {
                    continue;
                }
            }
                                    // dd($sumNilaiRaporByMapel);
            ?>
        </tr>
        <tr>
            <td style="text-align: center;">SMT 4</td>
            <?php 
            foreach ($data_mapel as $key => $value) {
                if (array_key_exists($value['id_mapel'], $groupNilaiRaporByMapel)) {
                    if (array_key_exists($value['id_mapel'], $groupNilaiRaporBySemester4)) {
                        echo '<td style="text-align: center;">' . number_format($groupNilaiRaporBySemester4[$value['id_mapel']][0]['nilai_rapor'], 2, ',', '.') . '</td>';

                        $idMapel = $value['id_mapel'];
                        $nilai = $groupNilaiRaporBySemester4[$idMapel][0]['nilai_rapor'] ?? 0;
                                                                    
                        // Inisialisasi jika belum ada
                        if (!isset($sumNilaiRaporByMapel[$idMapel])) {
                            // dd($idMapel);
                            $sumNilaiRaporByMapel[$idMapel] = [
                                'total_nilai' => $nilai,
                                'total_data' => 1,
                            ];
                            continue;
                        }
                        
                        $sumNilaiRaporByMapel[$idMapel]['total_nilai'] += $nilai;
                        $sumNilaiRaporByMapel[$idMapel]['total_data'] += 1;
                        
                    } else {
                        echo '<td style="text-align: center;">-</td>';
                    }
                }else {
                    continue;
                }
            }
                                    // dd($sumNilaiRaporByMapel);
            ?>
        </tr>
        <tr>
            <td style="text-align: center;">SMT 5</td>
            <?php 
            foreach ($data_mapel as $key => $value) {
                if (array_key_exists($value['id_mapel'], $groupNilaiRaporByMapel)) {
                    if (array_key_exists($value['id_mapel'], $groupNilaiRaporBySemester5)) {
                        echo '<td style="text-align: center;">' . number_format($groupNilaiRaporBySemester5[$value['id_mapel']][0]['nilai_rapor'], 2, ',', '.') . '</td>';

                        $idMapel = $value['id_mapel'];
                        $nilai = $groupNilaiRaporBySemester5[$idMapel][0]['nilai_rapor'] ?? 0;
                                                                    
                        // Inisialisasi jika belum ada
                        if (!isset($sumNilaiRaporByMapel[$idMapel])) {
                            // dd($idMapel);
                            $sumNilaiRaporByMapel[$idMapel] = [
                                'total_nilai' => $nilai,
                                'total_data' => 1,
                            ];
                            continue;
                        }
                        
                        $sumNilaiRaporByMapel[$idMapel]['total_nilai'] += $nilai;
                        $sumNilaiRaporByMapel[$idMapel]['total_data'] += 1;
                        
                    } else {
                        echo '<td style="text-align: center;">-</td>';
                    }
                }else {
                    continue;
                }
            }
                                    // dd($sumNilaiRaporByMapel);
            ?>
        </tr>
        <tr>
            <td style="text-align: center;">SMT 6</td>
            <?php 
                foreach ($data_mapel as $key => $value) {
                    if (array_key_exists($value['id_mapel'], $groupNilaiRaporByMapel)) {
                        if (array_key_exists($value['id_mapel'], $groupNilaiRaporBySemester6)) {
                            echo '<td style="text-align: center;">' . number_format($groupNilaiRaporBySemester6[$value['id_mapel']][0]['nilai_rapor'], 2, ',', '.') . '</td>';
                        
                            $idMapel = $value['id_mapel'];
                            $nilai = $groupNilaiRaporBySemester6[$idMapel][0]['nilai_rapor'] ?? 0;
                                                                        
                            // Inisialisasi jika belum ada
                            if (!isset($sumNilaiRaporByMapel[$idMapel])) {
                                // dd($idMapel);
                                $sumNilaiRaporByMapel[$idMapel] = [
                                    'total_nilai' => $nilai,
                                    'total_data' => 1,
                                ];
                                continue;
                            }
                            
                            $sumNilaiRaporByMapel[$idMapel]['total_nilai'] += $nilai;
                            $sumNilaiRaporByMapel[$idMapel]['total_data'] += 1;
                            
                        } else {
                            echo '<td style="text-align: center;">-</td>';
                        }
                    }else {
                        continue;
                    }
                }
                                    // dd($sumNilaiRaporByMapel);
                                ?>
        </tr>
        <tr>
            <td style="text-align: center; background-color: #DBDBDB;">R SMT</td>
            <?php 
                foreach ($data_mapel as $key => $value) {
                    if (array_key_exists($value['id_mapel'], $groupNilaiRaporByMapel)) {
                        if (array_key_exists($value['id_mapel'], $sumNilaiRaporByMapel)) {
                            $average = $sumNilaiRaporByMapel[$value['id_mapel']]['total_nilai'] / $sumNilaiRaporByMapel[$value['id_mapel']]['total_data'];
                            echo '<td style="text-align: center;  background-color: #DBDBDB;">' . number_format($average, 2, ',', '.') . '</td>';
                        } else {
                            echo '<td style="text-align: center;  background-color: #DBDBDB;">-</td>';
                        }
                    }else {
                        continue;
                    }
                }
                                    // dd($sumNilaiRaporByMapel);
            ?>
        </tr>
        <tr>
            <td style="text-align: center;">Nilai ASAJ</td>
            <?php 
            // dd($sumNilaiRaporByMapel);
                foreach ($data_mapel as $key => $value) {
                    if (array_key_exists($value['id_mapel'], $groupNilaiRaporByMapel)) {
                        if (array_key_exists($value['id_mapel'], $groupNilaiUjianByMapel)) {
                            echo '<td style="text-align: center;">' . number_format($groupNilaiUjianByMapel[$value['id_mapel']][0]['nilai_rapor'], 2, ',', '.') . '</td>';
                            $idMapel = $value['id_mapel'];
                            $nilai = $groupNilaiUjianByMapel[$idMapel][0]['nilai_rapor'] ?? 0;
                        } else {
                            echo '<td style="text-align: center;">-</td>';
                        }
                    }else {
                        continue;
                    }
                }
                // dd($sumNilaiRaporByMapel);
            ?>
        </tr>

        <tr>
            <td style="text-align: center; background-color: #9BEC00;">NS</td>
            <?php  
                foreach ($data_mapel as $key => $value) {
                    if (array_key_exists($value['id_mapel'], $groupNilaiRaporByMapel)) {
                        if (array_key_exists($value['id_mapel'], $sumNilaiRaporByMapel)) {
                            $totalNilai = $sumNilaiRaporByMapel[$value['id_mapel']]['total_nilai'];
                            $totalData = $sumNilaiRaporByMapel[$value['id_mapel']]['total_data'];
                        
                            // Pastikan totalNilai dan totalData adalah angka
                            if (is_numeric($totalNilai) && is_numeric($totalData) && $totalData != 0) {
                                $averageRapor = $totalNilai / $totalData;
                                $averageRapor = number_format($averageRapor, 2, '.', '');
                            
                                if (array_key_exists($value['id_mapel'], $groupNilaiUjianByMapel)) {
                                    $nilaiUjian = $groupNilaiUjianByMapel[$value['id_mapel']][0]['nilai_rapor'];
                                    
                                    // Pastikan nilaiUjian adalah angka
                                    if (is_numeric($nilaiUjian)) {
                                        $average = ($averageRapor + $nilaiUjian) / 2;
                                    } else {
                                        $average = $averageRapor;
                                    }
                                } else {
                                    $average = $averageRapor;
                                }
                            
                                echo '<td style="text-align: center; background-color: #9BEC00;">' . number_format($average, 2, ',', '.') . '</td>';
                            } else {
                                echo '<td style="text-align: center; background-color: #9BEC00;">-</td>';
                            }
                        } else {
                            echo '<td style="text-align: center; background-color: #9BEC00;">-</td>';
                        }
                    } else {
                        continue;
                    }
                }
                ?>

        </tr>

        <?php
            endforeach; 
        ?>
        <?php 
            endif;
        ?>
    </tbody>
</table>
<div style="page-break-after: always;"></div>
<!-- keterangan mapel -->
<table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black; margin-top: 20px;">
    <thead>
        <tr>
            <th style="text-align: center; width: 3%; min-width: 3%; max-width: 3%;">No.</th>
            <th style="text-align: center; width: 5%; min-width: 5%; max-width: 5%;">Kode Mapel</th>
            <th style="text-align: center; width: 16%; min-width: 16%; max-width: 16%;">Nama Mapel</th>
            <th style="text-align: center; width: 7%; min-width: 7%; max-width: 7%;">Kelompok</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        foreach ($data_mapel as $dm): ?>
        <tr>
            <td style="text-align: center;"><?= $no++; ?></td>
            <td style="text-align: center;"><?= $dm['kode_mapel'] ?></td>
            <td style="text-align: left;"><?= $dm['nama_mapel'] ?></td>
            <td style="text-align: center;"><?= $dm['kel_mapel'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: center;">Keterangan : NS adalah nilia rata-rata dari mapel tiap
                semester yang kemudian ditambah nilai ASAJ dan dibagi 2.</td>
        </tr>
    </tfoot>
</table>
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