<?= $this->extend('Templates/index') ?>
<?= $this->section('konten') ?>
<div class="col-md-12 col-lg-12">
    <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
        <div class="flex-wrap card-header d-flex justify-content-between">
            <h4 class="card-title">Data Rapor</h4>
            <div class="d-flex align-items-center mb-2">
                <button type="button" class="btn btn-primary" id="btn_back">
                    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.3 12.2512L20.25 12.2512" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11.2998 7.25024L3.3628 12.2512L11.2998 17.2522L11.2998 7.25024Z" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="p-0 card-body">
            <!-- progres data benar salah  -->
            <div class="row m-2">
                <div class="col-md-12">
                    <!-- detail nama  -->
                    <div class="row py-2">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group mb-2">
                                <label for="nama_lengkap_data_dapodik" class="mb-0">Nama Lengkap</label>
                                <input type="text" class="form-control check_data"
                                    value="<?= $data_siswa['nama_lengkap_data_dapodik']; ?>"
                                    id="nama_lengkap_data_dapodik" name="nama_lengkap_data_dapodik" readonly>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group mb-2">
                                <label for="id_data_dapodik" class="mb-0">NISN</label>
                                <input type="text" class="form-control check_data"
                                    value="<?= $data_siswa['id_data_dapodik']; ?>" id="id_data_dapodik"
                                    name="id_data_dapodik" readonly>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group mb-2">
                                <label for="nis_data_dapodik" class="mb-0">NIS</label>
                                <input type="text" class="form-control check_data"
                                    value="<?= $data_siswa['nis_data_dapodik']; ?>" id="nis_data_dapodik"
                                    name="nis_data_dapodik" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="border-top: 1px solid;">
            <div class="row mx-2 mb-4">
                <div class="col-md-12 mb-2">
                    <h5 class="card-title mb-2">Nilai Rapor</h5>
                </div>
                <?php 
                    if(empty($nilai_rapor)) {
                        echo '<div class="col-md-12 mb-4 mt-2 text-center">Data nilai rapor tidak ditemukan</div>';
                    }
                    $index = 0;
                    foreach ($nilai_rapor as $semester => $data_semester) : 
                ?>
                <div class="accordion my-2" id="show_data<?= $index; ?>">
                    <div class="accordion-item bg-white">
                        <h4 class="accordion-header" id="heading<?= $index; ?>">
                            <button class="accordion-button collapsed bg-white text-black fw-400" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse<?= $index; ?>" aria-expanded="false"
                                aria-controls="collapse<?= $index; ?>">
                                TA <?= $data_semester[0]['tahun_ajaran']; ?> - SMT
                                <?= $data_semester[0]['nama_semester']; ?>
                            </button>
                        </h4>
                        <div id="collapse<?= $index; ?>" class="accordion-collapse collapse"
                            aria-labelledby="heading<?= $index; ?>" data-bs-parent="#show_data<?= $index; ?>">
                            <div class="accordion-body">
                                <?php 
                                usort($data_semester, function($a, $b) {
                                    return $a['nama_mapel'] <=> $b['nama_mapel'];
                                });
                            
                                    $no = 1;
                                 ?>
                                <div class="mt-2 table-responsive">
                                    <table id="basic-table" class="table mb-0" role="grid">
                                        <tbody>
                                            <?php foreach ($data_semester as $value) : ?>
                                            <tr>
                                                <td class="text-center text-black" width="5%"><?= $no++; ?></td>
                                                <td width="80%" class="text-black"><?= $value['nama_mapel']; ?></td>
                                                <td width="20%">
                                                    <input type="text" class="form-control text-center text-black"
                                                        style="min-width: 80px;" value="<?= $value['nilai_rapor']; ?>"
                                                        id="nilai_rapor_<?= $value['id_nilai_rapor']; ?>"
                                                        name="nilai_rapor_<?= $value['id_nilai_rapor']; ?>" readonly>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                $index++;
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('konten'); ?>
<?= $this->section('script'); ?>
<script type="text/javascript">
$('#btn_back').click(function() {
    window.close();
});
</script>
<?= $this->endSection('script'); ?>