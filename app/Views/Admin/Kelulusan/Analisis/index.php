<?= $this->extend('Templates/index') ?>
<?= $this->section('konten') ?>
<?php 
ini_set('memory_limit', '256M');
?>
<style>
.table th {
    text-align: center;
    vertical-align: middle;
}

tbody tr {
    border-bottom: 1px solid #dee2e6;
}

.container_tables {
    max-height: 400px;
    overflow-y: auto;
}

.table thead th {
    position: sticky;
    top: 0;
    z-index: 2;
    background-color: #f8f9fc;
    text-align: center;
    vertical-align: middle;
}

.container_tables thead {
    top: 0;
    background-color: #f8f9fc;
}

.container_tables tfoot {
    bottom: 0;
    background-color: #f8f9fc;
}

.container_tables tbody {
    overflow-y: auto;
    height: 500px;
}

.container_tables tbody::-webkit-scrollbar {
    width: 6px;
}

.container_tables tbody::-webkit-scrollbar-thumb {
    background-color: #007bff;
    border-radius: 10px;
}

.container_tables tbody::-webkit-scrollbar-track {
    background-color: #f8f9fc;
}

.container_tables tbody::-webkit-scrollbar-thumb:hover {
    background-color: #0056b3;
}

.container_tables tbody::-webkit-scrollbar-thumb:active {
    background-color: #003d7f;
}


.container_tables tbody {
    overflow: auto;
}

.container_tables tfoot {
    overflow: hidden;
}

.container_tables thead th {
    background-color: #f8f9fc;
}

.container_tables tfoot th {
    background-color: #f8f9fc;
}

.container_tables tbody::-webkit-scrollbar {
    width: 6px;
}

.container_tables tbody::-webkit-scrollbar-thumb {
    background-color: #007bff;
    border-radius: 10px;
}

.container_tables tbody::-webkit-scrollbar-track {
    background-color: #f8f9fc;
}

.container_tables tbody::-webkit-scrollbar-thumb:hover {
    background-color: #0056b3;
}

.container_tables tbody::-webkit-scrollbar-thumb:active {
    background-color: #003d7f;
}
</style>

<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Daftar Siswa</h4>
            </div>
            <div class="header-title">
            </div>
        </div>
        <div class="card-body px-0">
            <div class="row my-2 mx-1">
                <div class="row mb-2">
                    <div class="col-md-3 py-2">
                        <form action="<?= base_url('Kelulusan/Analisis') ?>" method="POST" class="row g-3"
                            id="form-filter">
                            <div class="form-group">
                                <label for="kelas_data_dapodik">Kelas</label>
                                <select class="form-select mt-2 select2" id="kelas_data_dapodik"
                                    name="kelas_data_dapodik">
                                    <option value="">Pilih Kelas</option>
                                    <option value="XII Kartini 1"
                                        <?= ($nama_kelas == 'XII Kartini 1' ? 'slected' : '')?>> XII Kartini 1
                                    </option>
                                    <option value="XII Kartini 2"
                                        <?= ($nama_kelas == 'XII Kartini 2' ? 'slected' : '')?>>XII
                                        Kartini 2</option>
                                    <option value="XII Kartini 3"
                                        <?= ($nama_kelas == 'XII Kartini 3' ? 'slected' : '')?>>XII
                                        Kartini 3</option>
                                    <option value="XII Kartini 4"
                                        <?= ($nama_kelas == 'XII Kartini 4' ? 'slected' : '')?>>XII
                                        Kartini 4</option>
                                    <option value="XII Kartini 5"
                                        <?= ($nama_kelas == 'XII Kartini 5' ? 'slected' : '')?>>XII
                                        Kartini 5</option>
                                    <option value="XII Kartini 6"
                                        <?= ($nama_kelas == 'XII Kartini 6' ? 'slected' : '')?>>XII
                                        Kartini 6</option>
                                    <option value="XII Kartini 7"
                                        <?= ($nama_kelas == 'XII Kartini 7' ? 'slected' : '')?>>XII
                                        Kartini 7</option>
                                    <option value="XII Kartini 8"
                                        <?= ($nama_kelas == 'XII Kartini 8' ? 'slected' : '')?>>XII
                                        Kartini 8</option>
                                    <option value="XII Kartini 9"
                                        <?= ($nama_kelas == 'XII Kartini 9' ? 'slected' : '')?>>XII
                                        Kartini 9</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9 py-2 d-flex justify-content-end align-items-end ">
                        <!-- btn generate dan cetak -->
                        <button type="button" class="btn btn-secondary btn-md btn-sm mx-2" id="btn-cetak-prev">
                            <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.7369 2.76175H8.08489C6.00489 2.75375 4.30089 4.41075 4.25089 6.49075V17.2277C4.20589 19.3297 5.87389 21.0697 7.97489 21.1147C8.01189 21.1147 8.04889 21.1157 8.08489 21.1147H16.0729C18.1629 21.0407 19.8149 19.3187 19.8029 17.2277V8.03775L14.7369 2.76175Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6241 8.23 17.0441 8.234H19.7981"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M11.6421 15.9497V9.90869" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9.29639 13.5942L11.6414 15.9492L13.9864 13.5942" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            Print Preview
                        </button>
                        <button type="button" class="btn btn-primary btn-md btn-sm mx-2" id="btn-cetak-pdf">
                            <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.7369 2.76175H8.08489C6.00489 2.75375 4.30089 4.41075 4.25089 6.49075V17.2277C4.20589 19.3297 5.87389 21.0697 7.97489 21.1147C8.01189 21.1147 8.04889 21.1157 8.08489 21.1147H16.0729C18.1629 21.0407 19.8149 19.3187 19.8029 17.2277V8.03775L14.7369 2.76175Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6241 8.23 17.0441 8.234H19.7981"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M11.6421 15.9497V9.90869" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9.29639 13.5942L11.6414 15.9492L13.9864 13.5942" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            Print PDF
                        </button>
                    </div>
                </div>
                <div class="bd-example mx-3">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </symbol>
                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </symbol>
                    </svg>

                    <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success d-flex align-items-center alert-notif" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger d-flex align-items-center alert-notif" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            <?= session()->getFlashdata('errors'); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="table-responsive container_tables">
                    <table id="table_data_siswa" class="table table-bordered table-striped" width="100%"
                        cellspacing="0">
                        <?php 
                        if($data_mapel != null):
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
                        <thead class="thead-light" style="position: sticky; top: 0; z-index: 10;">
                            <tr>
                                <th style="text-align: center; width: 3%; min-width: 3%; max-width: 3%;" rowspan="2">No.
                                </th>
                                <th style="text-align: center; width: 5%; min-width: 5%; max-width: 5%;" rowspan="2">NIS
                                </th>
                                <th style="text-align: center; width: 16%; min-width: 16%; max-width: 16%;" rowspan="2">
                                    Nama</th>
                                <th style="text-align: center; width: 7%; min-width: 7%; max-width: 7%; margin: 0 2px;"
                                    rowspan="2">
                                    Komponen</th>
                                <th style="text-align: center; width: 60%; min-width: 60%; max-width: 60%;"
                                    colspan="<?= $countMapel; ?>">
                                    Nilai</th>
                                <th style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                                    rowspan="2">Sikap</th>
                                <th style=" text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                                    rowspan="2">Kehadiran</th>
                                <th style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
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
                                    <th style="text-align: center; width: 3%; min-width: 3%; max-width: 3%;"
                                        rowspan="2">No.
                                    </th>
                                    <th style="text-align: center; width: 5%; min-width: 5%; max-width: 5%;"
                                        rowspan="2">NIS
                                    </th>
                                    <th style="text-align: center; width: 16%; min-width: 16%; max-width: 16%;"
                                        rowspan="2">
                                        Nama</th>
                                    <th style="text-align: center; width: 7%; min-width: 7%; max-width: 7%; margin: 0 2px;"
                                        rowspan="2">
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
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection('konten'); ?>
<?= $this->section('script'); ?>
<script type="text/javascript">
var nama_kelas = "<?= $nama_kelas ?>";
if (nama_kelas != "") {
    $('#kelas_data_dapodik').val(nama_kelas);
}
// when on change kelas
$(document).ready(function() {
    $('#kelas_data_dapodik').change(function() {
        // submit 
        $('#form-filter').submit();
    });
});
// data table
$(document).ready(function() {
    $('#table').DataTable({
        "scrollX": true,
        "ordering": false,
        "searching": false,
        "paging": false,
        "info": false,
        "autoWidth": false,
        "columnDefs": [{
            "targets": [0, 1, 2],
            "className": 'dt-body-center'
        }]
    });
});
// when click cetak prev
$('#btn-cetak-prev').click(function() {
    var kelas_data_dapodik = $('#kelas_data_dapodik').val();
    if (kelas_data_dapodik == '') {
        sweetalert('error', 'Gagal', 'Pilih kelas terlebih dahulu');
    } else {
        window.open('<?= base_url('Kelulusan/cetak_analisis/') ?>' +
            kelas_data_dapodik,
            '_blank');
    }
});

// when click cetak pdf
$('#btn-cetak-pdf').click(function() {
    var kelas_data_dapodik = $('#kelas_data_dapodik').val();
    if (kelas_data_dapodik == '') {
        sweetalert('error', 'Gagal', 'Pilih kelas terlebih dahulu');
    } else {
        // add loading
        $('#loading-page').show();
        $.ajax({
            url: '<?= base_url('Kelulusan/cetakSemuaAnalisis') ?>',
            type: 'POST',
            data: {
                kelas_data_dapodik: kelas_data_dapodik
            },
            success: function(response) {
                if (response.error == false) {
                    $('#loading-page').hide();
                    window.open('<?= base_url('Assets/pdf/Analisis/') ?>' + response.data,
                        '_blank');
                } else {
                    $('#loading-page').hide();
                    sweetalert('error', 'Gagal', response.data);
                }
            },
            error: function(xhr, status, error) {
                $('#loading-page').hide();
                sweetalert('error', 'Gagal', 'Terjadi kesalahan pada server');
            }
        });
    }
});
</script>
<?= $this->endSection('script'); ?>