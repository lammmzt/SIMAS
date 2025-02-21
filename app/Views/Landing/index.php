<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('Assets/img/LOGO SMANSA.png'); ?>" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/css/core/libs.min.css" />


    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet"
        href="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/css/custom.min.css?v=2.0.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/css/rtl.min.css" />


</head>

<body class="boxed-fancy">
    <div class="boxed-inner">
        <!-- loader Start -->
        <div id="loading">
            <div class="loader simple-loader">
                <div class="loader-body"></div>
            </div>
        </div>
        <!-- loader END -->
        <span class="screen-darken"></span>
        <main class="main-content">
            <!--Nav Start-->
            <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
                <div class="container-fluid navbar-inner">
                    <!-- <button data-trigger="navbar_main" class="d-lg-none btn btn-primary rounded-pill p-1 pt-0"
                        type="button">
                        <svg class="icon-20" width="20px" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                        </svg>
                    </button> -->
                    <a href="<?= base_url('LandingPage'); ?>" class="navbar-brand">
                        <img src="<?= base_url('Assets/img/LOGO SMANSA.png'); ?>" class="img-fluid" alt="logo"
                            width="50">
                        <h4 class="logo-title">SIMAS</h4>
                    </a>
                    <!-- Horizontal Menu Start -->
                    <nav id="navbar_main"
                        class="mobile-offcanvas nav navbar navbar-expand-xl hover-nav horizontal-nav mx-md-auto">
                        <div class="container-fluid">
                            <div class="offcanvas-header px-0">
                                <div class="navbar-brand ms-3">
                                    <!--Logo start-->
                                    <!--logo End-->

                                    <!--Logo start-->
                                    <div class="logo-main">
                                        <div class="logo-normal">
                                            <img src="<?= base_url('Assets/img/LOGO SMANSA.png'); ?>" class="img-fluid"
                                                alt="logo" width="50">
                                        </div>
                                        <div class="logo-mini">
                                            <img src="<?= base_url('Assets/img/LOGO SMANSA.png'); ?>" class="img-fluid"
                                                alt="logo" width="50">
                                        </div>
                                    </div>
                                    <!--logo End-->




                                    <h4 class="logo-title">SIMAS</h4>
                                </div>
                                <button class="btn-close float-end"></button>
                            </div>
                            <!-- <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link " href="<?= base_url('LandingPage'); ?>">
                                        Home </a></li>
                            </ul> -->
                        </div> <!-- container-fluid.// -->
                    </nav>
                    <!-- Sidebar Menu End --> <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="navbar-toggler-bar bar1 mt-2"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <!-- add button to change dark light mode -->
                            <div class="color_themes light_mode mx-2" data-setting="color-mode" data-name="color"
                                data-value="dark" id="dark" style="display: none;">
                                <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor"
                                        d="M9,2C7.95,2 6.95,2.16 6,2.46C10.06,3.73 13,7.5 13,12C13,16.5 10.06,20.27 6,21.54C6.95,21.84 7.95,22 9,22A10,10 0 0,0 19,12A10,10 0 0,0 9,2Z" />
                                </svg>
                                <span class="ms-2 ">
                            </div>
                            <div class="color_themes dark_mode mx-2" data-setting="color-mode" data-name="color"
                                data-value="light" id="light" style="display: none;">
                                <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor"
                                        d="M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8M12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18M20,8.69V4H15.31L12,0.69L8.69,4H4V8.69L0.69,12L4,15.31V20H8.69L12,23.31L15.31,20H20V15.31L23.31,12L20,8.69Z" />
                                </svg>
                                <span class="ms-2 "></span>
                            </div>
                            <style>
                            .color_themes {
                                cursor: pointer;
                            }

                            .light_mode:hover {
                                color: #000;
                            }

                            .dark_mode:hover {
                                color: #fff;
                            }

                            /* posisi ditengah */
                            .color_themes {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                            }
                            </style>


                        </ul>
                    </div>
                </div>
            </nav>
            <!--Nav End-->
            <div class="conatiner-fluid content-inner pb-0">
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
                                                        <img src="<?= base_url('Assets/img/LOGO SMANSA.png'); ?>"
                                                            class="img-fluid" alt="logo" width="50">
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

                                        <form class="form-signin" id="form_cari_data_siswa" method="POST">
                                            <div id="pesan"></div>
                                            <div class="form-group">
                                                <label class="form-label" for="nis">NIS</label>
                                                <input type="text" class="form-control number_only" id="nis" name="nis"
                                                    placeholder="Masukkan NIS" required value="<?= old('nis'); ?>"
                                                    maxlength="5" autofocus minlength="5">
                                                <div class="invalid-feedback" id="error_nis_data_siswa">

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="tgl_lahir">Tanggal
                                                    Lahir</label>
                                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                                    placeholder="Masukkan Tanggal Lahir" required
                                                    value="<?= old('tgl_lahir'); ?>">
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
                                            <path d="M11.3 12.2512L20.25 12.2512" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.2998 7.25024L3.3628 12.2512L11.2998 17.2522L11.2998 7.25024Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="p-0 card-body">
                                <!-- progres data benar salah  -->
                                <div class="row m-2">
                                    <div class="col-md-12">

                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                            <h4 class="alert-heading">Perhatian!</h4>
                                            <p>Periksa kembali data siswa dengan data dapodik, jika ada data yang tidak
                                                sesuai silahkan
                                                perbaiki.</p>
                                            <hr>
                                            <p class="mb-0">Total data valid : <span
                                                    class="badge badge-success text-success" id="total_valid"></span>
                                            <p class="mb-0 ">Total data invalid : <span
                                                    class="text-danger badge badge-danger" id="total_invalid"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2 table-responsive">
                                    <form id="form_data_siswa">
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
                                                <style>
                                                /* min width */
                                                .check_data {
                                                    min-width: 200px;
                                                }
                                                </style>
                                                <input type="hidden" name="id_data_siswa" id="id_data_siswa">
                                                <tr>
                                                    <td>Nama Lengkap</td>
                                                    <td>
                                                        <input type="text" class="form-control" value=""
                                                            id="nama_lengkap_data_dapodik"
                                                            name="nama_lengkap_data_dapodik" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data" value=""
                                                            id="nama_lengkap_data_siswa" name="nama_lengkap_data_siswa">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>NIS</td>
                                                    <td>
                                                        <input type="text" class="form-control number_only" value=""
                                                            id="nis_data_dapodik" name="nis_data_dapodik" readonly
                                                            maxlength="5">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data number_only"
                                                            value="" id="nis_data_siswa" name="nis_data_siswa"
                                                            maxlength="5" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>NISN</td>
                                                    <td>
                                                        <input type="text" class="form-control number_only" value=""
                                                            id="nisn_data_dapodik" name="nisn_data_dapodik" readonly
                                                            maxlength="10">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data number_only"
                                                            value="" id="nisn_data_siswa" name="nisn_data_siswa"
                                                            maxlength="10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Kelamin</td>
                                                    <td>
                                                        <input type="text" class="form-control" value=""
                                                            id="jenis_kelamin_data_dapodik"
                                                            name="jenis_kelamin_data_dapodik" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data" value=""
                                                            id="jenis_kelamin_data_siswa"
                                                            name="jenis_kelamin_data_siswa">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Tempat Lahir</td>
                                                    <td>
                                                        <input type="text" class="form-control" value=""
                                                            id="tempat_lahir_data_dapodik"
                                                            name="tempat_lahir_data_dapodik" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data" value=""
                                                            id="tempat_lahir_data_siswa" name="tempat_lahir_data_siswa">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Lahir</td>
                                                    <td>
                                                        <input type="date" class="form-control"
                                                            id="tanggal_lahir_data_dapodik"
                                                            name="tanggal_lahir_data_dapodik" value="" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control check_data" value=""
                                                            id="tanggal_lahir_data_siswa"
                                                            name="tanggal_lahir_data_siswa">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Agama</td>
                                                    <td>
                                                        <input type="text" class="form-control" value=""
                                                            id="agama_data_dapodik" name="agama_data_dapodik" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data" value=""
                                                            id="agama_data_siswa" name="agama_data_siswa">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>SHDK</td>
                                                    <td>
                                                        <input type="text" class="form-control" value=""
                                                            id="shdk_data_dapodik" name="shdk_data_dapodik" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data" value=""
                                                            id="shdk_data_siswa" name="shdk_data_siswa">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Anak Ke</td>
                                                    <td>
                                                        <input type="text" class="form-control number_only" value=""
                                                            id="anak_ke_data_dapodik" name="anak_ke_data_dapodik"
                                                            readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data number_only"
                                                            value="" id="anak_ke_data_siswa" name="anak_ke_data_siswa">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>
                                                        <textarea class="form-control" id="alamat_data_dapodik"
                                                            name="alamat_data_dapodik" readonly></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control check_data" id="alamat_data_siswa"
                                                            name="alamat_data_siswa"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>No Telepon</td>
                                                    <td>
                                                        <input type="text" class="form-control number_only" value=""
                                                            id="no_tlp_data_dapodik" name="no_tlp_data_dapodik" readonly
                                                            maxlength="13">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data number_only"
                                                            value="" id="no_tlp_data_siswa" name="no_tlp_data_siswa">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sekolah Asal</td>
                                                    <td>
                                                        <input type="text" class="form-control" value=""
                                                            id="sekolah_asal_data_dapodik"
                                                            name="sekolah_asal_data_dapodik" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data" value=""
                                                            id="sekolah_asal_data_siswa" name="sekolah_asal_data_siswa">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Di Kelas 10</td>
                                                    <td>
                                                        <input type="text" class="form-control" value=""
                                                            id="di_kelas_10_data_dapodik"
                                                            name="di_kelas_10_data_dapodik" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data" value=""
                                                            id="di_kelas_10_data_siswa" name="di_kelas_10_data_siswa">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Diterima</td>
                                                    <td>
                                                        <input type="date" class="form-control " value=""
                                                            id="tanggal_diterima_data_dapodik"
                                                            name="tanggal_diterima_data_dapodik" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control check_data" value=""
                                                            id="tanggal_diterima_data_siswa"
                                                            name="tanggal_diterima_data_siswa">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat Orang Tua</td>
                                                    <td>
                                                        <textarea class="form-control"
                                                            id="alamat_orang_tua_data_dapodik"
                                                            name="alamat_orang_tua_data_dapodik" readonly></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control check_data"
                                                            id="alamat_orang_tua_data_siswa"
                                                            name="alamat_orang_tua_data_siswa"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Ayah</td>
                                                    <td>
                                                        <input type="text" class="form-control" value=""
                                                            id="nama_ayah_data_dapodik" name="nama_ayah_data_dapodik"
                                                            readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data" value=""
                                                            id="nama_ayah_data_siswa" name="nama_ayah_data_siswa">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pekerjaan Ayah</td>
                                                    <td>
                                                        <input type="text" class="form-control" value=""
                                                            id="pekerjaan_ayah_data_dapodik"
                                                            name="pekerjaan_ayah_data_dapodik" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data" value=""
                                                            id="pekerjaan_ayah_data_siswa"
                                                            name="pekerjaan_ayah_data_siswa">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Ibu</td>
                                                    <td>
                                                        <input type="text" class="form-control" value=""
                                                            id="nama_ibu_data_dapodik" name="nama_ibu_data_dapodik"
                                                            readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data" value=""
                                                            id="nama_ibu_data_siswa" name="nama_ibu_data_siswa">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Pekerjaan Ibu</td>
                                                    <td>
                                                        <input type="text" class="form-control" value=""
                                                            id="pekerjaan_ibu_data_dapodik"
                                                            name="pekerjaan_ibu_data_dapodik" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data" value=""
                                                            id="pekerjaan_ibu_data_siswa"
                                                            name="pekerjaan_ibu_data_siswa">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Wali</td>
                                                    <td>
                                                        <input type="text" class="form-control" value=""
                                                            id="nama_wali_data_dapodik" name="nama_wali_data_dapodik"
                                                            readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data" value=""
                                                            id="nama_wali_data_siswa" name="nama_wali_data_siswa">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat Wali</td>
                                                    <td>
                                                        <textarea class="form-control" id="alamat_wali_data_dapodik"
                                                            name="alamat_wali_data_dapodik" readonly></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control check_data"
                                                            id="alamat_wali_data_siswa"
                                                            name="alamat_wali_data_siswa"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pekerjaan Wali</td>
                                                    <td>
                                                        <input type="text" class="form-control" value=""
                                                            id="pekerjaan_wali_data_dapodik"
                                                            name="pekerjaan_wali_data_dapodik" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control check_data" value=""
                                                            id="pekerjaan_wali_data_siswa"
                                                            name="pekerjaan_wali_data_siswa">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Keterangan</td>
                                                    <td colspan="2">
                                                        <textarea class="form-control" id="ket_pengecekan"
                                                            name="ket_pengecekan">  </textarea>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>

                                    </form>
                                </div>
                            </div>
                            <div class="card-footer bg-secondary text-white">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="" id="text_simpan_data"></div>

                                        <button type="button" class="btn btn-primary float-end" style="display: none;"
                                            id="btn_simpan_data_siswa">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal confirmasi -->
                <div class="modal fade" id="modal_confirmasi" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Apakah anda yakin ingin menyimpan data ini?
                                </p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                <button type="button" class="btn btn-primary" id="btn_confirm_simpan">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal informasi ketentuan verifikasi-->
            <div class="modal fade" id="modal_ketentuan" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="importLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ketentuan Verifikasi Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                1. Siapan dokumen pendukung seperti KK, Akte Kelahiran, Kartu Keluarga, Ijasah SMP, dan
                                lain-lain.
                            </p>
                            <p>
                                2. Periksa data yang ada pada aplikasi dengan data yang ada pada dokumen pendukung.
                            </p>
                            <p>
                                3. Jika ada data yang tidak sesuai, silahkan perbaiki data pada aplikasi.
                            </p>
                            <p>
                                4. Pastikan data yang ada pada aplikasi sudah sesuai dengan data yang ada pada dokumen
                                pendukung dan jumlah data invalid & valid sudah sesuai(Pada alert perhatian diatas).
                            </p>
                            <p>
                                5. Jika data sudah sesuai, silahkan klik tombol simpan.
                            </p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <style>
            </style>
            <!-- Footer Section Start -->
            <footer class="footer">
                <div class="footer-body">
                    <ul class="left-panel list-inline mb-0 p-0">
                        ©<script>
                        document.write(new Date().getFullYear())
                        </script> SIMAS, Developed with
                        <span class="">
                            <svg class="icon-15" width="15" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.85 2.50065C16.481 2.50065 17.111 2.58965 17.71 2.79065C21.401 3.99065 22.731 8.04065 21.62 11.5806C20.99 13.3896 19.96 15.0406 18.611 16.3896C16.68 18.2596 14.561 19.9196 12.28 21.3496L12.03 21.5006L11.77 21.3396C9.48102 19.9196 7.35002 18.2596 5.40102 16.3796C4.06102 15.0306 3.03002 13.3896 2.39002 11.5806C1.26002 8.04065 2.59002 3.99065 6.32102 2.76965C6.61102 2.66965 6.91002 2.59965 7.21002 2.56065H7.33002C7.61102 2.51965 7.89002 2.50065 8.17002 2.50065H8.28002C8.91002 2.51965 9.52002 2.62965 10.111 2.83065H10.17C10.21 2.84965 10.24 2.87065 10.26 2.88965C10.481 2.96065 10.69 3.04065 10.89 3.15065L11.27 3.32065C11.3618 3.36962 11.4649 3.44445 11.554 3.50912C11.6104 3.55009 11.6612 3.58699 11.7 3.61065C11.7163 3.62028 11.7329 3.62996 11.7496 3.63972C11.8354 3.68977 11.9247 3.74191 12 3.79965C13.111 2.95065 14.46 2.49065 15.85 2.50065ZM18.51 9.70065C18.92 9.68965 19.27 9.36065 19.3 8.93965V8.82065C19.33 7.41965 18.481 6.15065 17.19 5.66065C16.78 5.51965 16.33 5.74065 16.18 6.16065C16.04 6.58065 16.26 7.04065 16.68 7.18965C17.321 7.42965 17.75 8.06065 17.75 8.75965V8.79065C17.731 9.01965 17.8 9.24065 17.94 9.41065C18.08 9.58065 18.29 9.67965 18.51 9.70065Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span> by <a href="https://www.instagram.com/sma1pekalongan/" target="_blank">TIM IT
                            SMANSA</a>.
                    </ul>
                    <div class="right-panel">
                        Designed
                        </span> by <a href="https://iqonic.design/" target="_blank">IQONIC Design</a>.
                    </div>
                </div>
            </footer>
            <!-- Footer Section End -->
        </main>
        <!-- Wrapper End-->
    </div>
    <!-- offcanvas END -->
    <!-- Library Bundle Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/js/charts/vectore-chart.js"></script>
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/js/charts/dashboard.js"></script>

    <!-- fslightbox Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>/assets/js/hope-ui.js" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    // check apakah data siswa valid atau tidak sama persis dari data dapodik
    function check_validated() {
        for (let i = 0; i < data_siswa.length; i++) {
            // check apakah data siswa valid atau tidak sama persis dari data dapodik
            if ($('#' + data_siswa[i] + '_dapodik').val() != null && $('#' + data_siswa[i] + '_dapodik')
                .val() !=
                '') {
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

    // format number only
    $('.number_only').on('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // when focus out check data siswa
    $('.check_data').focusout(function() {
        var id = $(this).attr('id');
        var value = $(this).val();
        var id_data = id.replace('_siswa', '_dapodik');
        if ($('#' + id_data).val() != null && $('#' + id_data).val() != '') {
            if ($('#' + id_data).val() == value) {
                $('#' + id).addClass('is-valid');
                $('#' + id).removeClass('is-invalid');
            } else {
                $('#' + id).addClass('is-invalid');
                $('#' + id).removeClass('is-valid');
            }
            check_data();
        } else {
            if (value != '') {
                $('#' + id).addClass('is-invalid');

            } else {
                $('#' + id).removeClass('is-invalid');
            }
            check_data();
        }
    });

    function render_data_siswa(data) {
        // console.log(data);
        $('#btn_simpan_data_siswa').hide();
        for (let i = 0; i < data_siswa.length; i++) {
            $('#' + data_siswa[i] + '_dapodik').val(data[
                data_siswa[i] + '_dapodik']);
            $('#' + data_siswa[i] + '_siswa').val(data[
                data_siswa[i] + '_siswa']);
        }

        // jika status pengecekan tidak 0  
        // console.log(data.status_pengecekan);
        if (data.status_pengecekan != '0') {
            for (let i = 0; i < data_siswa.length; i++) {
                $('#' + data_siswa[i] + '_siswa').attr('readonly', 'readonly');
            }
        } else {
            for (let i = 0; i < data_siswa.length; i++) {
                $('#' + data_siswa[i] + '_siswa').removeAttr('readonly');
            }
        }

        $('#nis_data_siswa').attr('readonly', 'readonly');
        $('#id_data_siswa').val(data.id_data_siswa);
        $('#ket_pengecekan').val(data.ket_pengecekan);
        $('#nisn_data_dapodik').val(data.id_data_dapodik);

        if (data.status_pengecekan == '1') {
            $('#text_simpan_data').html(
                '<h6 class="text-white">Data sudah sesuai <img src="<?= base_url('Assets/icons/verified.svg'); ?>" width="20"></h6>'
            );
        } else if (data.status_pengecekan == '2') {
            $('#text_simpan_data').html(
                '<h6 class="text-white">Menunggu verifikasi <img src="<?= base_url('Assets/icons/waitting.png'); ?>" width="20"></h6>'
            );
        } else {
            // display block button simpan
            $('#text_simpan_data').html('');
            $('#btn_simpan_data_siswa').show();
        }
        check_validated();
        check_data();
    }

    $('#form_cari_data_siswa').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: '<?= base_url('LandingPage/fetchDataSiswa'); ?>',
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
                    render_data_siswa(response.data);
                    $('#modal_ketentuan').modal('show');
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

    $('#btn_simpan_data_siswa').click(function() {
        $('#modal_confirmasi').modal('show');
    });

    // confirm simpan data
    $('#btn_confirm_simpan').click(function() {
        var formData = new FormData($('#form_data_siswa')[0]);
        var data_invalid = $('.is-invalid').length;

        // apeend data invalid
        formData.append('data_invalid', data_invalid);

        // console.log(data_invalid);
        $.ajax({
            url: '<?= base_url('LandingPage/ubahDataSiswa'); ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#btn_confirm_simpan').attr('disabled', 'disabled');
                $('#btn_confirm_simpan').html(
                    '<i class="fas fa-spinner fa-spin"></i> Loading...');
            },
            success: function(response) {
                if (response.status == '200') {
                    sweetalert('success', 'Berhasil', 'Data siswa berhasil disimpan', 'success');
                    $('#modal_confirmasi').modal('hide');
                    $('#btn_confirm_simpan').removeAttr('disabled');
                    $('#btn_confirm_simpan').html('Ya');
                    $('#btn_simpan_data_siswa').hide();
                    render_data_siswa(response.data);

                } else {
                    sweetalert('error', 'Gagal', 'Data siswa gagal disimpan', 'error');
                    $('#btn_confirm_simpan').removeAttr('disabled');
                    $('#btn_confirm_simpan').html('Ya');
                }
            },
            error: function() {
                alert('Error');
                $('#btn_confirm_simpan').removeAttr('disabled');
                $('#btn_confirm_simpan').html('Ya');
            }
        });
    });
    </script>

</body>

</html>