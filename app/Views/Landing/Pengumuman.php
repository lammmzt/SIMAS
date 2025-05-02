<?= $this->extend('Landing/index') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('Assets/'); ?>css/style.css">
<style>
body {

    max-height: 200vh;
}

.header_lulus {
    background: linear-gradient(to right, #034275, #0169be);
}

.info-box {
    background-color: #222;
    padding: 15px;
    border-radius: 5px;
    margin-top: 20px;
    text-align: justify;
}

.foto_siswa {
    float: right;
    width: 100px;
    height: 100px;
    margin-left: 5px;
    border-radius: 5px;
    background-color: #fff;
}

.note {
    font-size: 0.9rem;
    text-align: justify;
    margin-top: 20px;
}


.celebrate-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 10;
    text-align: center;
    color: #d63384;
    font-size: 3rem;
    font-weight: bold;
    animation: pop 1s ease-out;
}

@keyframes pop {
    0% {
        transform: scale(0.5) translate(-50%, -50%);
        opacity: 0;
    }

    100% {
        transform: scale(1) translate(-50%, -50%);
        opacity: 1;
    }
}

.ribbon {
    position: absolute;
    width: 10px;
    height: 30px;
    background-color: red;
    opacity: 0.9;
    z-index: 5;
    border-radius: 3px;
    animation: explode 3s linear forwards;
}

@keyframes explode {
    0% {
        transform: translate(0, 0) rotate(0deg);
        opacity: 1;
    }

    100% {
        transform: translate(var(--x), var(--y)) rotate(720deg);
        opacity: 0;
    }
}

.terompet {
    font-size: 2rem;
}

@media (max-width: 1012px) {
    body {
        overflow-x: hidden;
        max-width: 100%;
    }

    .model_mobile {
        display: block !important;
    }

    .model_desktop {
        display: none !important;
    }

    .header_lulus {
        background: linear-gradient(to right, #034275, #0169be);
    }

    .terompet {
        font-size: 1.2rem;
    }
}

@media (min-width: 1012px) {
    .model_mobile {
        display: none !important;
    }

    .model_desktop {
        display: block !important;
    }
}

@media (max-width: 768px) {
    body {
        overflow-x: hidden;
        max-width: 100%;
    }

    .model_mobile {
        display: block !important;
    }

    .model_desktop {
        display: none !important;
    }

    .header_lulus {
        background: linear-gradient(to right, #034275, #0169be);
    }
}

@media (min-width: 768px) {
    .model_mobile {
        display: none !important;
    }

    .model_desktop {
        display: block !important;
    }
}

/*  jika width 645px hide */
@media (max-width: 645px) {
    body {
        overflow-x: hidden;
        max-width: 100%;
    }

    .model_mobile {
        display: block !important;
    }

    .model_desktop {
        display: none !important;
    }

    .header_lulus {
        background: linear-gradient(to right, #034275, #0169be);
    }
}

@media (min-width: 645px) {
    .model_mobile {
        display: none !important;
    }

    .model_desktop {
        display: block !important;
    }
}
</style>
<div class="row" id="row_countdown" style="display: none;">
    <div class="col-lg 12">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="h4 mb-4">
                            Informasi pengumuman
                        </h4>
                    </div>
                </div>
                <div class="alert alert-primary" role="alert" id="pesan"> </div>
                <div class="py-5" id="countdown">
                    <div class="row">
                        <div class="col-lg-12 mx-auto">
                            <div class="rounded bg-gradient-4 text-white shadow py-5 text-center mb-5">
                                <p class="mb-0 font-weight-bold text-uppercase text-white"></p>
                                <div id="clock-c" class="countdown py-4 text-white"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row" id="form_cari" style="display: none;">
    <div class="col-lg-12">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="header-title">

                            <h4 class="card-title">
                                <p class="text-center">
                                    <img src="<?= base_url('Assets/img/LOGO SMANSA.png'); ?>" class="img-fluid"
                                        alt="logo" width="100">
                                </p>
                                <h4 class="text-center">PENGUMUMAN KELULUSAN</h4>
                                <h4 class="text-center">Tahun Ajaran 2024/2025</h4>
                                <p class="text-center">SMA NEGERI 1 PEKALONGAN </p>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- <form class="form-signin" method="POST"
                                            <?= base_url('LandingPage/fetchDataSiswa'); ?>> -->

                        <form class="form-signin" id="form_cari_data_rapor">
                            <div id="pesan"></div>
                            <div class="form-group">
                                <label class="form-label" for="nisn">NISN</label>
                                <input type="text" class="form-control number_only" id="nisn" name="nisn"
                                    placeholder="Masukkan NISN" required value="<?= old('nis'); ?>" maxlength="10"
                                    autofocus minlength="10">
                                <div class="invalid-feedback" id="error_nisn_data_siswa">

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
<div class="row mb-2" id="data_siswa" style="display: none;">
    <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mt-4 mb-4">
        <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
            <div class="flex-wrap card-header d-flex justify-content-between header_lulus">
                <img src="<?= base_url('Assets/img/LOGO SMANSA.svg'); ?>" alt="logo" class="img-fluid mb-2 model_mobile"
                    width="80" height="80" style="display: none;">
                <h4 class="card-title  text-white fw-bold align-self-center mt-2 mb-3">
                    SELAMAT! ANDA DINYATAKAN LULUS <span class="terompet">🎉</span>
                </h4>
                <div class="d-flex align-items-center mt-2 mb-3 model_desktop">
                    <img src="<?= base_url('Assets/img/LOGO SMANSA.svg'); ?>" alt="logo" class="img-fluid" width="100"
                        height="100">
                </div>
            </div>
            <div class="p-0 card-body">
                <!-- progres data benar salah  -->
                <div class="row m-2">
                    <div class="col-md-12">
                        <!-- detail nama  -->
                        <p class="model_mobile mb-1">Pekalongan, 05 Mei 2025</p>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="model_desktop mb-1">Pekalongan, 05 Mei 2025</p>
                                <h3 class="font-weight-bold" id="hasil_nama_lengkap"></h3>
                                <p id="hasil_nama_kelas"></p>
                            </div>
                            <div class="foto_siswa"><img id="hasil_foto_siswa" alt="logo" class="img-fluid" width="100"
                                    style="border-radius: 5px;"></div>
                        </div>

                        <div class="row mt-4 mx-auto mt-2">
                            <div class="col-md-4 col-sm-12">
                                <p><strong>NIS</strong><br><span id="hasil_nis"></span></p>
                                <p><strong>NISN</strong><br><span id="hasil_nisn"></span></p>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <p><strong>Jenis Kelamin</strong><br><span id="hasil_jenis_kelamin"></span></p>
                                <p><strong>Tempat Lahir</strong><br><span id="hasil_tempat_lahir"></span></p>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <p><strong>Tanggal Lahir</strong><br><span id="hasil_tanggal_lahir"></span></p>
                                <p><strong>Alamat</strong><br><span id="hasil_alamat"></span></p>
                            </div>
                        </div>

                        <div class="info-box text-white">
                            <p>
                                Silahkan lakukan pengecekan hasil belajar.
                            </p>
                            <p>
                                Surat Keterangan Lulus dapat diunduh pada link berikut:
                            </p>
                            <a href="https://simas.sman1pekalongan.sch.id" target="_blank"
                                class="text-primary">https://simas.sman1pekalongan.sch.id/</a>
                        </div>

                        <p class="note">
                            Peserta Didik dinyatakan <b>LULUS</b> dari satuan pendidikan berdasarkan kriteria
                            kelulusan
                            SMA
                            Negeri 1 Pekalongan Kota Pekalongan Tahun Ajaran 2024/2025.
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<audio id="mussic" src="<?= base_url('Assets/audio/finalCapter.mp3'); ?>" type="audio/mpeg" preload="auto"></audio>
<?= $this->endSection('content') ?>
<?= $this->section('script') ?>
<script src="https://cdn.jsdelivr.net/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
<script type="text/javascript">
function set_clock(date_now, set_date, pesan) {

    function DateRange() {

        const date = set_date;

        $('#pesan').text(pesan);

        return date;

    }

    $("#clock-c").countdown(DateRange(), function(event) {
        var $this = $(this).html(
            event.strftime(
                "" +
                '<span class="h1 font-weight-bold text-white">%D</span> Day%!d' +
                '<span class="h1 font-weight-bold text-white">%H</span> Hr' +
                '<span class="h1 font-weight-bold text-white">%M</span> Min' +
                '<span class="h1 font-weight-bold text-white">%S</span> Sec'
            )
        );
        if (event.elapsed) {

            $("#clock-c").hide();
            $("#countdown").hide();
            $("#title-head").hide();
            $("#row_countdown").hide();
            $("#form_cari").show();
            $('#Medium-modal').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#background_content').addClass('content');

        } else {
            $('#Medium-modal').modal('hide');
            $("#clock-c").show();
            $("#countdown").show();
            $("#title-head").show();
            $("#alert").show();
            $('#background_content').removeClass('content');
            $("#row_countdown").show();
            $("#form_cari").hide();
            $("#data_siswa").hide();
        }
    });
}

// set_clock(response.data.dateTimeNow, response.data.dateTime, response.data.pesan);

setTimeout(() => {
    var date_now = <?= json_encode($date_now); ?>;
    var set_date = <?= json_encode($set_date); ?>;
    var message = <?= json_encode($message); ?>;
    // Ubah ke format ISO dan tambahkan offset Jakarta (+07:00)
    var timeJakarta = new Date(date_now.replace(' ', 'T') + '+07:00');

    // Format jam:menit dalam WIB
    var timeNowJakarta = timeJakarta.toLocaleTimeString("id-ID", {
        hour: '2-digit',
        minute: '2-digit',
        timeZone: 'Asia/Jakarta',
        hour12: false
    });

    set_clock(timeNowJakarta, set_date, message);
}, 1000);

function createRibbon() {
    const ribbon = document.createElement("div");
    ribbon.classList.add("ribbon");

    const colors = ["#e74c3c", "#f1c40f", "#2ecc71", "#3498db", "#9b59b6", "#fd79a8"];
    ribbon.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];

    // Posisi acak dari sisi
    const sides = ["top", "bottom", "left", "right"];
    const side = sides[Math.floor(Math.random() * sides.length)];

    const size = Math.random() * 20 + 10;
    ribbon.style.width = `${size / 2}px`;
    ribbon.style.height = `${size}px`;

    let x = 0,
        y = 0;

    if (side === "top") {
        ribbon.style.top = "0";
        ribbon.style.left = `${Math.random() * 100}vw`;
        y = `${100 + Math.random() * 100}vh`;
        x = `${(Math.random() - 0.5) * 200}vw`;
    } else if (side === "bottom") {
        ribbon.style.bottom = "0";
        ribbon.style.left = `${Math.random() * 100}vw`;
        y = `-${100 + Math.random() * 100}vh`;
        x = `${(Math.random() - 0.5) * 200}vw`;
    } else if (side === "left") {
        ribbon.style.left = "0";
        ribbon.style.top = `${Math.random() * 100}vh`;
        x = `${100 + Math.random() * 100}vw`;
        y = `${(Math.random() - 0.5) * 200}vh`;
    } else {
        ribbon.style.right = "0";
        ribbon.style.top = `${Math.random() * 100}vh`;
        x = `-${100 + Math.random() * 100}vw`;
        y = `${(Math.random() - 0.5) * 200}vh`;
    }

    ribbon.style.setProperty('--x', x);
    ribbon.style.setProperty('--y', y);

    document.body.appendChild(ribbon);

    setTimeout(() => {
        ribbon.remove();
    }, 3000);
}

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

function formatDateIndo(date) {
    var bulan = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    var tgl = new Date(date);
    var dd = String(tgl.getDate()).padStart(2, '0');
    var mm = String(tgl.getMonth() + 1).padStart(2, '0'); // January is 0!
    var yyyy = tgl.getFullYear();
    var formattedDate = dd + ' ' + bulan[parseInt(mm) - 1] + ' ' + yyyy;
    return formattedDate;
}

$('#form_cari_data_rapor').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: '<?= base_url('LandingPage/fetchSiswaByNISN'); ?>',
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
                $('#hasil_nama_lengkap').html(response.data.nama_lengkap_data_siswa);
                $('#hasil_nis').html(response.data.nis_data_siswa);
                $('#hasil_nisn').html(response.data.nisn_data_siswa);
                var jenis_kelamin = (response.data.jenis_kelamin_data_siswa == 'L') ?
                    'Laki-laki' :
                    'Perempuan';
                $('#hasil_jenis_kelamin').html(jenis_kelamin);
                $('#hasil_tempat_lahir').html(response.data.tempat_lahir_data_siswa);
                // $('#hasil_tanggal_lahir').formatDateIndo(
                //     response.data.tanggal_lahir_data_siswa);
                var tgl = formatDateIndo(response.data.tanggal_lahir_data_siswa);
                $('#hasil_tanggal_lahir').html(tgl);
                // console.log(tgl);
                $('#hasil_alamat').html(response.data.alamat_data_siswa);
                $('#hasil_nama_kelas').html(response.data.kelas_data_dapodik);
                $('#hasil_foto_siswa').attr('src',
                    '<?= base_url('Assets/img/foto_siswa/'); ?>' +
                    response.foto_siswa_data_siswa);

                const ribbonInterval = setInterval(createRibbon, 100);
                $('#mussic')[0].play();

                // 1 detik setelah musik diputar, hentikan interval
                setTimeout(() => {
                    setTimeout(() => {
                        clearInterval(ribbonInterval);
                    }, 15000);
                }, 1000);
                $('#btn_cari_data_siswa').removeAttr('disabled');
                $('#btn_cari_data_siswa').html('Cari');

            } else {
                sweetalert('error', 'Mohon Maaf', response.data, 'error');
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