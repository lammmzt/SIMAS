<?= $this->extend('Landing/index') ?>
<?= $this->section('content') ?>
<div class="row" id="form_cari">
    <div class="col-lg-12">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">
                                <div class="d-flex">
                                    <div class="me-3">
                                        <img src="<?= base_url('Assets/img/LOGO SMANSA.png'); ?>" class="img-fluid"
                                            alt="logo" width="50">
                                    </div>
                                    <div class="logo-title align-self-center">SIMAS</div>
                                </div>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>
                            Aplikasi untuk melakukan verifikasi data dapodik siswa SMAN 1 Pekalongan
                            dengan cepat dan mudah.
                        </p>

                        <!-- <form class="form-signin" method="POST"
                                            <?= base_url('LandingPage/fetchDataSiswa'); ?>> -->

                        <form class="form-signin" id="form_cari_data_rapor">
                            <div id="pesan"></div>
                            <div class="form-group">
                                <label class="form-label" for="nis">NIS</label>
                                <input type="text" class="form-control number_only" id="nis" name="nis"
                                    placeholder="Masukkan NIS" required value="<?= old('nis'); ?>" maxlength="5"
                                    autofocus minlength="5">
                                <div class="invalid-feedback" id="error_nis_data_siswa">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="tgl_lahir">Tanggal
                                    Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                    placeholder="Masukkan Tanggal Lahir" required value="<?= old('tgl_lahir'); ?>">
                                <div class="invalid-feedback" id="error_tgl_lahir">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-2"
                                id="btn_cari_data_siswa">Cari</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" id="data_siswa" style="display: none;">
    <div class="col-md-12 col-lg-12">
        <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
            <div class="flex-wrap card-header d-flex justify-content-between mb-2">
                <h4 class="card-title align-self-center">Data Siswa</h4>
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-primary btn-sm" id="btn_back">
                        <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.3 12.2512L20.25 12.2512" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.2998 7.25024L3.3628 12.2512L11.2998 17.2522L11.2998 7.25024Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
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
                                    <input type="text" class="form-control check_data" value=""
                                        id="nama_lengkap_data_dapodik" name="nama_lengkap_data_dapodik" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="id_data_dapodik" class="mb-0">NISN</label>
                                    <input type="text" class="form-control check_data" value="" id="id_data_dapodik"
                                        name="id_data_dapodik" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="nis_data_dapodik" class="mb-0">NIS</label>
                                    <input type="text" class="form-control check_data" value="" id="nis_data_dapodik"
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
                    <div id="view_rapor"></div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection('content') ?>
<?= $this->section('script') ?>
<script type="text/javascript">
$(document).ready(function() {
    // check if dark mode is enabled
    if (localStorage.getItem('color-mode') == 'dark') {
        $('#dark').addClass('active');
        $('body').addClass('dark');
        $('#light').show();
        $('#dark').hide();
    } else {
        $('#light').addClass('active');
        $('body').removeClass('dark');
        $('#dark').show();
        $('#light').hide();
    }

    // change color mode
    $('.color_themes').click(function() {
        var mode = $(this).data('value');
        localStorage.setItem('color-mode', mode);
        if (mode == 'dark') {
            $('#dark').addClass('active');
            $('#light').removeClass('active');
            $('body').addClass('dark');
            $('#light').show();
            $('#dark').hide();
        } else {
            $('#light').addClass('active');
            $('#dark').removeClass('active');
            $('body').removeClass('dark');
            $('#dark').show();
            $('#light').hide();
        }
    });

});


// fungsi sweetalert
function sweetalert(icon, title, text, type) {
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
        showConfirmButton: true,
        timer: 1500
    });
}


$('#form_cari_data_rapor').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: '<?= base_url('LandingPage/fetchRapor'); ?>',
        type: 'POST',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function() {
            $('#btn_cari_data_siswa').attr('disabled', 'disabled');
            $('#btn_cari_data_siswa').html(
                '<i class="fas fa-spinner fa-spin"></i> Loading...');
        },
        success: function(response) {
            if (response.status == '200') {

                $('#form_cari').hide();
                $('#data_siswa').show();

                $('#nama_lengkap_data_dapodik').val(response.data_siswa
                    .nama_lengkap_data_dapodik);
                $('#id_data_dapodik').val(response.data_siswa.id_data_dapodik);
                $('#nis_data_dapodik').val(response.data_siswa.nis_data_dapodik);
                // console.log(response.data.data_siswa);

                let html = '';
                let index = 0;
                for (const [key, value] of Object.entries(response.data.nilai_rapor)) {
                    html += '<div class="accordion my-2" id="show_data' + index + '">';
                    html += '<div class="accordion-item bg-white">';
                    html += '<h4 class="accordion-header" id="heading' + index + '">';
                    html +=
                        '<button class="accordion-button collapsed bg-white text-black fw-400" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' +
                        index + '" aria-expanded="false" aria-controls="collapse' + index +
                        '">';
                    html += 'TA ' + value[0].tahun_ajaran + ' - SMT ' + value[0].nama_semester;
                    html += '</button>';
                    html += '</h4>';
                    html += '<div id="collapse' + index +
                        '" class="accordion-collapse collapse" aria-labelledby="heading' +
                        index +
                        '" data-bs-parent="#show_data' + index + '">';
                    html += '<div class="accordion-body">';
                    value.sort((a, b) => a.nama_mapel.localeCompare(b.nama_mapel));
                    let no = 1;
                    html += '<div class="mt-2 table-responsive">';
                    html +=
                        '<table id="basic-table" class="table mb-0 table-striped" role="grid">';
                    html += '<tbody>';
                    value.forEach(element => {
                        html += '<tr>';
                        html += '<td class="text-center text-black a" width="5%">' +
                            no++ +
                            '</td>';
                        html += '<td width="80%" class="text-black text-capitalize">' +
                            element.nama_mapel + '</td>';
                        html += '<td width="20%">';
                        html +=
                            '<input type="text" class="form-control text-center text-black" style="min-width: 80px;" value="' +
                            element.nilai_rapor + '" id="nilai_rapor_' + element
                            .id_nilai_rapor + '" name="nilai_rapor_' + element
                            .id_nilai_rapor + '" readonly>';
                        html += '</td>';
                        html += '</tr>';
                    });
                    html += '</tbody>';
                    html += '</table>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    index++;
                }

                $('#view_rapor').html(html);
                $('#btn_cari_data_siswa').removeAttr('disabled');
                $('#btn_cari_data_siswa').html('Cari');
            } else {
                sweetalert('error', 'Data tidak ditemukan',
                    'Data siswa tidak ditemukan, periksa kembali data yang anda masukkan',
                    'error');
            }
            $('#btn_cari_data_siswa').removeAttr('disabled');
            $('#btn_cari_data_siswa').html('Cari');
        },
        error: function() {
            alert('Error');
            $('#btn_cari_data_siswa').removeAttr('disabled');
            $('#btn_cari_data_siswa').html('Cari');
        }
    });
});

$('#btn_back').click(function() {
    $('#form_cari').show();
    $('#data_siswa').hide();
});
</script>
<?= $this->endSection('script') ?>