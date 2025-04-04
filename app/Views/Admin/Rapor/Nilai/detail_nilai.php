<?= $this->extend('Templates/index') ?>
<?= $this->section('konten') ?>
<div class="col-md-12 col-lg-12">
    <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
        <div class="flex-wrap card-header d-flex justify-content-between">
            <h4 class="card-title">Data Rapor</h4>
            <div class="d-flex align-items-center mb-2">
                <button type="button" class="btn btn-primary btn-sm" id="btn_back">
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
                <div class="row">
                    <div class="col-md-6 mb-2">

                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalTambahNilaiRapor">
                                <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 2C6.477 2 2 6.477 2 12C2 17.523 6.477 22 12 22C17.523 22 22 17.523 22 12C22 6.477 17.523 2 12 2ZM12 20C7.364 20 4 16.636 4 12C4 7.364 7.364 4 12 4C16.636 4 20 7.364 20 12C20 16.636 16.636 20 12 20Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 6C11.4477 6 11 6.44772 11 7V11H7C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H11V17C11 17.5523 11.4477 18 12 18C12.5523 18 13 17.5523 13 17V13H17C17.5523 13 18 12.5523 18 12C18 11.4477 17.5523 11 17 11H13V7C13 6.44772 12.5523 6 12 6Z"
                                        fill="currentColor"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <h5 class="card-title mb-2 justify-content-start">
                            Nilai Rapor</h5>
                    </div>

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
                                data-bs-toggle="collapse" data-bs-target="#collapse<?= $index; ?>" aria-expanded="true"
                                aria-controls="collapse<?= $index; ?>">
                                TA <?= $data_semester[0]['tahun_ajaran']; ?> -
                                <?= ($data_semester[0]['nama_semester'] == '1') ? 'Ganjil' : 'Genap'; ?>
                                <span class="badge bg-primary mx-2 p-2 rounded-circle 
                                "> <?= count($data_semester); ?></span>
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
                                    <table id="basic-table" class="table mb-0 table-striped " role="grid">
                                        <tbody>
                                            <?php foreach ($data_semester as $value) : ?>
                                            <tr>
                                                <td class="text-center text-black" width="5%"><?= $no++; ?></td>
                                                <td width="80%" class="text-black"><?= $value['nama_mapel']; ?></td>
                                                <td width="10%">
                                                    <input type="number"
                                                        class="form-control text-center text-black input_nilai_rapor"
                                                        data-id="<?= $value['id_nilai_rapor']; ?>"
                                                        style="min-width: 80px;" value="<?= $value['nilai_rapor']; ?>"
                                                        id="nilai_rapor_<?= $value['id_nilai_rapor']; ?>"
                                                        name="nilai_rapor_<?= $value['id_nilai_rapor']; ?>"
                                                        maxlength="3" style="min-width: 80px; max-width: 80px;">
                                                </td>
                                                <td width="5%">
                                                    <button class="btn btn-sm btn-danger btn-delete"
                                                        data-id="<?= $value['id_nilai_rapor']; ?>">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                            <path d="M20.708 6.23975H3.75" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                        </svg>
                                                    </button>
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
                <hr style="border-top: 1px solid; margin-top: 20px;">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <h5 class="card-title mb-2 justify-content-start">
                            Nilai Ujian</h5>
                    </div>

                </div>
                <?php 
                    if(empty($nilai_ujian)) {
                        echo '<div class="col-md-12 mb-4 mt-2 text-center">Data nilai ujian tidak ditemukan</div>';
                    } else {
                     
                    
                ?>
                <div class="accordion my-2" id="show_data_ujian">
                    <div class="accordion-item bg-white">
                        <h4 class="accordion-header" id="heading_ujian">
                            <button class="accordion-button collapsed bg-white text-black fw-400" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse_ujian" aria-expanded="true"
                                aria-controls="collapse_ujian"> Nilai Ujian Sekolah
                                <span class="badge bg-primary mx-2 p-2 rounded-circle">
                                    <?= count($nilai_ujian); ?></span>
                            </button>
                        </h4>
                        <div id="collapse_ujian" class="accordion-collapse collapse" aria-labelledby="heading_ujian"
                            data-bs-parent="#show_data_ujian">
                            <div class="accordion-body">
                                <div class="mt-2 table-responsive">
                                    <table id="basic-table" class="table mb-0 table-striped " role="grid">
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            foreach ($nilai_ujian as $value) : ?>
                                            <tr>
                                                <td class="text-center text-black" width="5%"><?= $no++; ?></td>
                                                <td width="80%" class="text-black"><?= $value['nama_mapel']; ?></td>
                                                <td width="10%">
                                                    <input type="number"
                                                        class="form-control text-center text-black input_nilai_rapor"
                                                        data-id="<?= $value['id_nilai_rapor']; ?>"
                                                        style="min-width: 80px;" value="<?= $value['nilai_rapor']; ?>"
                                                        id="nilai_rapor_<?= $value['id_nilai_rapor']; ?>"
                                                        name="nilai_rapor_<?= $value['id_nilai_rapor']; ?>"
                                                        maxlength="3" style="min-width: 80px; max-width: 80px;">
                                                </td>
                                                <td width="5%">
                                                    <button class="btn btn-sm btn-danger btn-delete"
                                                        data-id="<?= $value['id_nilai_rapor']; ?>">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                            <path d="M20.708 6.23975H3.75" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                        </svg>
                                                    </button>
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
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<style>
.select2-container {
    z-index: 99999 !important;
}
</style>
<!-- Modal Tambah Nilai Rapor -->
<div class="modal fade" id="modalTambahNilaiRapor" aria-labelledby="modalTambahNilaiRaporLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahNilaiRaporLabel">Tambah Nilai Rapor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" class="form_nilai_rapor">
                <div class="modal-body p-4">
                    <div class="row pb-2">

                        <div class="col-md-12 mb-2">
                            <div class="form-group mb-2">
                                <label for="tipe_nilai" class="form-label">Tipe Nilai</label>
                                <select class="form-select" id="tipe_nilai" name="tipe_nilai" required>
                                    <option value="">Pilih Tipe Nilai</option>
                                    <option value="1">Nilai Rapor</option>
                                    <option value="0">Nilai Ujian</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2" style="display: none;" id="show_semester">
                            <div class="form-group mb-2">
                                <label for="id_semester" class="mb-0">Semester</label>
                                <select class="form-select select2" id="id_semester" name="id_semester"
                                    style="width: 100%; z-index: 9999;">
                                    <option value="">Pilih Semester</option>
                                    <?php foreach ($smt as $value) : ?>
                                    <option value="<?= $value['id_semester']; ?>">
                                        <?= $value['tahun_ajaran'] . ' - ' .   (($value['nama_semester'] == '1') ? 'Ganjil' : 'Genap'); ?>
                                        <?php endforeach; ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-group mb-2">
                                <label for="id_mapel" class="mb-0 ">Mata Pelajaran</label>
                                <select class="form-select select2" id="id_mapel" name="id_mapel" required
                                    style="width: 100%; z-index: 9999;">
                                    <option value="">Pilih Mata Pelajaran</option>
                                    <?php foreach ($mapel as $value) : ?>
                                    <option value="<?= $value['id_mapel']; ?>"><?= $value['nama_mapel']; ?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-group mb-2">
                                <label for="nilai_rapor" class="mb-0">Nilai Rapor</label>
                                <input type="number" class="form-control" id="nilai_rapor" name="nilai_rapor" required
                                    max="100" min="0" maxlength="3" placeholder="Masukkan Nilai Rapor">

                            </div>
                        </div>
                        <input type="hidden" name="id_data_dapodik" value="<?= $data_siswa['id_data_dapodik']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn_simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('konten'); ?>
<?= $this->section('script'); ?>
<script type="text/javascript">
$('#btn_back').click(function() {
    window.close();
});

$('#tipe_nilai').change(function() {
    var tipe_nilai = $(this).val();
    if (tipe_nilai == '1') {
        $('#show_semester').show();
    } else {
        $('#id_semester').val('');
        $('#id_semester').select2().trigger('change');
        $('#show_semester').hide();
    }
});

$(document).ready(function() {
    $(".select2").select2({
        dropdownParent: $("#modalTambahNilaiRapor")
    });
});

$('input[type="number"]').on('input', function() {
    if ($(this).val().length > 3) {
        $(this).val($(this).val().slice(0, 3));
    }
    if ($(this).val() > 100) {
        $(this).val('100');
    }
});


$('.form_nilai_rapor').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $('#btn_simpan').html(
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
    );
    $('#btn_simpan').attr('disabled', true);
    $.ajax({
        url: '<?= base_url('Nilai/save'); ?>',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.error) {
                sweetalert('error', 'Gagal', response.data);
                $('#btn_simpan').html('Simpan');
                $('#btn_simpan').attr('disabled', false);
            } else {
                sweetalert('success', 'Berhasil', 'Data nilai rapor berhasil ditambahkan');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        }
    });
});

$('.input_nilai_rapor').on('change', function() {
    var id = $(this).data('id');
    var nilai = $(this).val();
    // max 100
    if (nilai > 100) {
        alert('Nilai maksimal 100');
        $(this).val(100);
        var nilai = 100;
    }
    $.ajax({
        url: '<?= base_url('Nilai/update'); ?>',
        type: 'POST',
        data: {
            id_nilai_rapor: id,
            nilai_rapor: nilai
        },
        success: function(response) {
            if (response.error) {
                alert(response.data);
            }
        }
    });
});

// delete
$('.btn-delete').on('click', function() {
    var id = $(this).data('id');
    // swal confirm
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data nilai rapor akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '<?= base_url('Nilai/delete'); ?>',
                type: 'POST',
                data: {
                    id_nilai_rapor: id
                },
                success: function(response) {
                    if (response.error) {
                        sweetalert('error', 'Gagal', response.data);
                    } else {
                        sweetalert('success', 'Berhasil',
                            'Data nilai rapor berhasil dihapus');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }
                }
            });
        }
    });
});
</script>
<?= $this->endSection('script'); ?>