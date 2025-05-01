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

<body class="">
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
                    <button data-trigger="navbar_main" class="d-xl-none btn btn-primary rounded-pill p-1 pt-0"
                        type="button">
                        <svg width="20px" class="icon-20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z">
                            </path>
                        </svg>
                    </button>
                    <a href="<?= base_url('LandingPage'); ?>" class="navbar-brand">
                        <img src="<?= base_url('Assets/img/LOGO SMANSA.png'); ?>" class="img-fluid" alt="logo"
                            width="50">
                        <h4 class="logo-title">SIMAS</h4>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="navbar-toggler-bar bar1 mt-2"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto  navbar-list mb-2 mb-lg-0">

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
                        </ul>
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
            <div class="navbar dual-horizontal">
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
                        <ul class="navbar-nav">
                            <li class="nav-item  "><a class="nav-link <?= $active == 'Home' ? 'active':''; ?>"
                                    href="<?= base_url('LandingPage'); ?>">
                                    Verval Data Siswa </a>
                            </li>
                            <li class="nav-item  "><a class="nav-link <?= $active == 'Home' ? 'active':''; ?>"
                                    href="<?= base_url('Pengumuman'); ?>">
                                    Pengumuman Kelulusan </a>
                            </li>
                            <!-- <li class="nav-item  "><a class="nav-link <?= $active == 'Rapor' ? 'active':''; ?>"
                                    href="<?= base_url('LandingPage/Rapor'); ?>">
                                    Verval Data Rapor </a>
                            </li> -->
                        </ul>
                    </div> <!-- container-fluid.// -->
                </nav>
                <!-- Sidebar Menu End -->
            </div>
            <!--Nav End-->
            <div class="conatiner-fluid content-inner pb-0">
                <?= $this->renderSection('content') ?>
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
                        <!-- Designed
                        </span> by <a href="https://iqonic.design/" target="_blank">IQONIC Design</a>. -->
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
    <?= $this->renderSection('script')?>

</body>

</html>