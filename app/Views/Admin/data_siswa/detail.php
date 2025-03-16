<?= $this->extend('Templates/index') ?>
<?= $this->section('konten') ?>
<div class="col-md-12 col-lg-12">
    <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
        <div class="flex-wrap card-header d-flex justify-content-between">
            <h4 class="card-title">Data Siswa</h4>
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
        <form id="form_data_siswa">
            <div class="p-0 card-body">
                <!-- progres data benar salah  -->
                <div class="row m-2">
                    <div class="col-md-12">

                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Perhatian!</h4>
                            <p>Periksa kembali data siswa dengan data dapodik, jika ada data yang tidak sesuai silahkan
                                perbaiki.</p>
                            <hr>
                            <p class="mb-0">Total data valid : <span class="badge badge-success text-success"
                                    id="total_valid"></span>
                            <p class="mb-0 ">Total data invalid : <span class="text-danger badge badge-danger"
                                    id="total_invalid"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-2 table-responsive">

                    <?= csrf_field(); ?>
                    <table id="basic-table" class="table mb-0 table-striped" role="grid">
                        <thead>
                            <tr>
                                <th>Nama Data</th>
                                <th>Data Dapodik</th>
                                <th>Data Siswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <input type="hidden" name="id_data_siswa" value="<?= $data_siswa['id_data_siswa']; ?>">
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['nama_lengkap_data_dapodik']; ?>"
                                        id="nama_lengkap_data_dapodik" name="nama_lengkap_data_dapodik">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['nama_lengkap_data_siswa']; ?>"
                                        id="nama_lengkap_data_siswa" name="nama_lengkap_data_siswa">
                                </td>
                            </tr>
                            <tr>
                                <td>NIS</td>
                                <td>
                                    <input type="text" class="form-control check_data number_only"
                                        value="<?= $data_siswa['nis_data_dapodik']; ?>" id="nis_data_dapodik"
                                        name="nis_data_dapodik" maxlength="5">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data number_only"
                                        value="<?= $data_siswa['nis_data_siswa']; ?>" id="nis_data_siswa"
                                        name="nis_data_siswa" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td>NISN</td>
                                <td>
                                    <input type="text" class="form-control check_data number_only"
                                        value="<?= $data_siswa['id_data_dapodik']; ?>" id="nisn_data_dapodik"
                                        name="id_data_dapodik" maxlength="10">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data number_only"
                                        value="<?= $data_siswa['nisn_data_siswa']; ?>" id="nisn_data_siswa"
                                        name="nisn_data_siswa" maxlength="10">
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['jenis_kelamin_data_dapodik']; ?>"
                                        id="jenis_kelamin_data_dapodik" name="jenis_kelamin_data_dapodik">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['jenis_kelamin_data_siswa']; ?>"
                                        id="jenis_kelamin_data_siswa" name="jenis_kelamin_data_siswa">
                                </td>
                            </tr>

                            <tr>
                                <td>Tempat Lahir</td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['tempat_lahir_data_dapodik']; ?>"
                                        id="tempat_lahir_data_dapodik" name="tempat_lahir_data_dapodik">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['tempat_lahir_data_siswa']; ?>"
                                        id="tempat_lahir_data_siswa" name="tempat_lahir_data_siswa">
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>
                                    <input type="date" class="form-control check_data" id="tanggal_lahir_data_dapodik"
                                        name="tanggal_lahir_data_dapodik"
                                        value="<?= $data_siswa['tanggal_lahir_data_dapodik']; ?>">
                                </td>
                                <td>
                                    <input type="date" class="form-control check_data"
                                        value="<?= $data_siswa['tanggal_lahir_data_siswa']; ?>"
                                        id="tanggal_lahir_data_siswa" name="tanggal_lahir_data_siswa">
                                </td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['agama_data_dapodik']; ?>" id="agama_data_dapodik"
                                        name="agama_data_dapodik">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['agama_data_siswa']; ?>" id="agama_data_siswa"
                                        name="agama_data_siswa">
                                </td>
                            </tr>
                            <tr>
                                <td>SHDK</td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['shdk_data_dapodik']; ?>" id="shdk_data_dapodik"
                                        name="shdk_data_dapodik">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['shdk_data_siswa']; ?>" id="shdk_data_siswa"
                                        name="shdk_data_siswa">
                                </td>
                            </tr>
                            <tr>
                                <td>Anak Ke</td>
                                <td>
                                    <input type="text" class="form-control check_data number_only"
                                        value="<?= $data_siswa['anak_ke_data_dapodik']; ?>" id="anak_ke_data_dapodik"
                                        name="anak_ke_data_dapodik">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data number_only"
                                        value="<?= $data_siswa['anak_ke_data_siswa']; ?>" id="anak_ke_data_siswa"
                                        name="anak_ke_data_siswa">
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>
                                    <textarea class="form-control check_data" id="alamat_data_dapodik"
                                        name="alamat_data_dapodik"><?= $data_siswa['alamat_data_dapodik']; ?></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control check_data" id="alamat_data_siswa"
                                        name="alamat_data_siswa"><?= $data_siswa['alamat_data_siswa']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>No Telepon</td>
                                <td>
                                    <input type="text" class="form-control check_data number_only"
                                        value="<?= $data_siswa['no_tlp_data_dapodik']; ?>" id="no_tlp_data_dapodik"
                                        name="no_tlp_data_dapodik">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data number_only"
                                        value="<?= $data_siswa['no_tlp_data_siswa']; ?>" id="no_tlp_data_siswa"
                                        name="no_tlp_data_siswa">
                                </td>
                            </tr>
                            <tr>
                                <td>Sekolah Asal</td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['sekolah_asal_data_dapodik']; ?>"
                                        id="sekolah_asal_data_dapodik" name="sekolah_asal_data_dapodik">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['sekolah_asal_data_siswa']; ?>"
                                        id="sekolah_asal_data_siswa" name="sekolah_asal_data_siswa">
                                </td>
                            </tr>
                            <tr>
                                <td>Di Kelas 10</td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['di_kelas_10_data_dapodik']; ?>"
                                        id="di_kelas_10_data_dapodik" name="di_kelas_10_data_dapodik">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['di_kelas_10_data_siswa']; ?>"
                                        id="di_kelas_10_data_siswa" name="di_kelas_10_data_siswa">
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Diterima</td>
                                <td>
                                    <input type="date" class="form-control check_data"
                                        value="<?= $data_siswa['tanggal_diterima_data_dapodik']; ?>"
                                        id="tanggal_diterima_data_dapodik" name="tanggal_diterima_data_dapodik">
                                </td>
                                <td>
                                    <input type="date" class="form-control check_data"
                                        value="<?= $data_siswa['tanggal_diterima_data_siswa']; ?>"
                                        id="tanggal_diterima_data_siswa" name="tanggal_diterima_data_siswa">
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat Orang Tua</td>
                                <td>
                                    <textarea class="form-control check_data" id="alamat_orang_tua_data_dapodik"
                                        name="alamat_orang_tua_data_dapodik"><?= $data_siswa['alamat_orang_tua_data_dapodik']; ?></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control check_data" id="alamat_orang_tua_data_siswa"
                                        name="alamat_orang_tua_data_siswa"><?= $data_siswa['alamat_orang_tua_data_siswa']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Ayah</td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['nama_ayah_data_dapodik']; ?>"
                                        id="nama_ayah_data_dapodik" name="nama_ayah_data_dapodik">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['nama_ayah_data_siswa']; ?>" id="nama_ayah_data_siswa"
                                        name="nama_ayah_data_siswa">
                                </td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Ayah</td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['pekerjaan_ayah_data_dapodik']; ?>"
                                        id="pekerjaan_ayah_data_dapodik" name="pekerjaan_ayah_data_dapodik">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['pekerjaan_ayah_data_siswa']; ?>"
                                        id="pekerjaan_ayah_data_siswa" name="pekerjaan_ayah_data_siswa">
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Ibu</td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['nama_ibu_data_dapodik']; ?>" id="nama_ibu_data_dapodik"
                                        name="nama_ibu_data_dapodik">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['nama_ibu_data_siswa']; ?>" id="nama_ibu_data_siswa"
                                        name="nama_ibu_data_siswa">
                                </td>
                            </tr>

                            <tr>
                                <td>Pekerjaan Ibu</td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['pekerjaan_ibu_data_dapodik']; ?>"
                                        id="pekerjaan_ibu_data_dapodik" name="pekerjaan_ibu_data_dapodik">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['pekerjaan_ibu_data_siswa']; ?>"
                                        id="pekerjaan_ibu_data_siswa" name="pekerjaan_ibu_data_siswa">
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Wali</td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['nama_wali_data_dapodik']; ?>"
                                        id="nama_wali_data_dapodik" name="nama_wali_data_dapodik">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['nama_wali_data_siswa']; ?>" id="nama_wali_data_siswa"
                                        name="nama_wali_data_siswa">
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat Wali</td>
                                <td>
                                    <textarea class="form-control check_data" id="alamat_wali_data_dapodik"
                                        name="alamat_wali_data_dapodik"><?= $data_siswa['alamat_wali_data_dapodik']; ?></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control check_data" id="alamat_wali_data_siswa"
                                        name="alamat_wali_data_siswa"><?= $data_siswa['alamat_wali_data_siswa']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Wali</td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['pekerjaan_wali_data_dapodik']; ?>"
                                        id="pekerjaan_wali_data_dapodik" name="pekerjaan_wali_data_dapodik">
                                </td>
                                <td>
                                    <input type="text" class="form-control check_data"
                                        value="<?= $data_siswa['pekerjaan_wali_data_siswa']; ?>"
                                        id="pekerjaan_wali_data_siswa" name="pekerjaan_wali_data_siswa">
                                </td>
                            </tr>
                            <tr>
                                <td>Keterangan Pengecekan</td>
                                <td colspan="2">
                                    <textarea name="ket_pengecekan" id="ket_pengecekan"
                                        class="form-control"><?= $data_siswa['ket_pengecekan']; ?></textarea>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>
            </div>
            <div class="card-footer bg-secondary text-white">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="status_pengecekan" id="status_pengecekan" class="form-control"
                                style="width: 50%;">
                                <option value="1" <?= $data_siswa['status_pengecekan'] == 1 ? 'selected' : ''; ?>> Data
                                    Sudah Sesuai</option>
                                <option value="2" <?= $data_siswa['status_pengecekan'] == 2 ? 'selected' : ''; ?>> Data
                                    Perlu Diperbaiki</option>
                                <option value="0" <?= $data_siswa['status_pengecekan'] == 0 ? 'selected' : ''; ?>> Belum
                                    Verifikasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" id="btn_ubah_data">Ubah Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection('konten'); ?>
<?= $this->section('script'); ?>
<script type="text/javascript">
$(document).ready(function() {

    // format number only
    $('.number_only').on('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // when clict the button back
    $('#btn_back').click(function() {
        window.close();
    });
});

var total_data = 0;
var total_valid = 0;
var total_invalid = 0;
const data_siswa = [
    'nama_lengkap_data',
    'nis_data',
    'nisn_data',
    'jenis_kelamin_data',
    'tempat_lahir_data',
    'tanggal_lahir_data',
    'agama_data',
    'shdk_data',
    'anak_ke_data',
    'alamat_data',
    'no_tlp_data',
    'sekolah_asal_data',
    'di_kelas_10_data',
    'tanggal_diterima_data',
    'alamat_orang_tua_data',
    'nama_ayah_data',
    'pekerjaan_ayah_data',
    'nama_ibu_data',
    'pekerjaan_ibu_data',
    'nama_wali_data',
    'alamat_wali_data',
    'pekerjaan_wali_data'
];


// check apakah data siswa valid atau tidak sama persis dari data dapodik
function check_validated() {
    for (let i = 0; i < data_siswa.length; i++) {
        // check apakah data siswa valid atau tidak sama persis dari data dapodik
        if ($('#' + data_siswa[i] + '_dapodik').val() != null && $('#' + data_siswa[i] + '_dapodik')
            .val() != '') {
            if ($('#' + data_siswa[i] + '_dapodik').val() == $('#' + data_siswa[i] + '_siswa').val()) {
                $('#' + data_siswa[i] + '_siswa').addClass('is-valid');
                $('#' + data_siswa[i] + '_siswa').removeClass('is-invalid');

            } else {
                $('#' + data_siswa[i] + '_siswa').addClass('is-invalid');
                $('#' + data_siswa[i] + '_siswa').removeClass('is-valid');
            }
            check_data();
        } else {
            if ($('#' + data_siswa[i] + '_siswa').val() != '') {
                $('#' + data_siswa[i] + '_siswa').addClass('is-invalid');
            } else {
                $('#' + data_siswa[i] + '_siswa').removeClass('is-invalid');
            }
            check_data();
        }
    }
}

check_validated();

function check_data() {
    var data_invalid = $('.is-invalid').length;
    var data_valid = $('.is-valid').length;
    total_data = data_siswa.length;
    total_valid = data_valid;
    total_invalid = data_invalid;

    $('#total_valid').html(total_valid);
    $('#total_invalid').html(total_invalid);
}

check_data();

// when focus out check data siswa
$('.check_data').focusout(function() {
    var id = $(this).attr('id');
    var value = $(this).val();
    var id_data = id.replace('_siswa', '_dapodik');
    var id_siswa = id.replace('_dapodik', '_siswa');
    // alert(id_siswa);
    if ($('#' + id_data).val() != null && $('#' + id_data).val() != '') {
        // alert('ada');
        if ($('#' + id_data).val() == value && $('#' + id_siswa).val() != '') {
            $('#' + id_siswa).addClass('is-valid');
            $('#' + id_siswa).removeClass('is-invalid');
        } else {
            $('#' + id_siswa).addClass('is-invalid');
            $('#' + id_siswa).removeClass('is-valid');
        }
        check_data();
    } else {
        if (value != '' || $('#' + id_siswa).val() != '') {
            $('#' + id_siswa).addClass('is-invalid');

        } else {
            $('#' + id_siswa).removeClass('is-invalid');
        }
        check_data();
    }
});

$('#btn_ubah_data').click(function() {
    var formData = new FormData($('#form_data_siswa')[0]);

    // console.log(data_invalid);
    $.ajax({
        url: '<?= base_url('Data_siswa/ubahDataSiswa'); ?>',
        type: 'POST',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function() {
            $('#btn_ubah_data').attr('disabled', 'disabled');
            $('#btn_ubah_data').html(
                '<i class="fas fa-spinner fa-spin"></i> Loading...');
        },
        success: function(response) {
            if (response.status == '200') {
                sweetalert('success', 'Berhasil', 'Data siswa berhasil disimpan', 'success');
                $('#btn_ubah_data').removeAttr('disabled');
                $('#btn_ubah_data').html('Ubah Data');
            } else {
                sweetalert('error', 'Gagal', 'Data siswa gagal disimpan', 'error');
                $('#btn_ubah_data').removeAttr('disabled');
                $('#btn_ubah_data').html('Ubah Data');
            }
        },
        error: function() {
            alert('Error');
            $('#btn_ubah_data').removeAttr('disabled');
            $('#btn_ubah_data').html('Ubah Data');
        }
    });
});
</script>
<?= $this->endSection('script'); ?>