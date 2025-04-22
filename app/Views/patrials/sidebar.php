<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="<?= base_url('/'); ?>" class="navbar-brand">
            <!--Logo start-->
            <!--logo End-->

            <!--Logo start-->
            <div class="logo-main">
                <div class="logo-normal">
                    <!-- <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                            transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                        <rect x="7.72803" y="27.728" width="28" height=nnnnnnnnnnnnnnnnnnnnnn"4" rx="2" transform="rotate(-45 7.72803 27.728)"
                            fill="currentColor" />
                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                            transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                            transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                    </svg> -->
                    <!-- LOGO SMANSA.svg -->
                    <img src="<?= base_url('Assets/img/LOGO SMANSA.svg'); ?>" alt="logo"
                        style="width: 45px; height: 45px;">
                </div>
                <div class="logo-mini">
                    <img src="<?= base_url('Assets/img/LOGO SMANSA.svg'); ?>" alt="logo"
                        style="width: 45px; height: 45px;">
                    <!-- <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                            transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)"
                            fill="currentColor" />
                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                            transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                            transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                    </svg> -->
                </div>
            </div>
            <!--logo End-->
            <h4 class="logo-title">SIMAS</h4>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Home</span>
                        <span class="mini-icon">H</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $active == 'dashboard' ? 'active' : ''; ?>" aria-current="page"
                        href="<?= base_url('/'); ?>">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="icon-20">
                                <path opacity="0.4"
                                    d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                    fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                <li>
                    <hr class="hr-horizontal">
                </li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Master Data</span>
                        <span class="mini-icon">M</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $active == 'Mapel' || $active == 'Semester'? 'active' : ''; ?>"
                        data-bs-toggle="collapse" href="#settings" role="button" aria-expanded="false"
                        aria-controls="settings">
                        <i class="icon">

                            <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">

                                <path opacity="0.4"
                                    d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z"
                                    fill="currentColor"></path>
                                <path opacity="0.4"
                                    d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z"
                                    fill="currentColor"></path>

                            </svg>
                        </i>
                        <span class="item-name">Setting</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="settings" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link <?= $active == 'Semester' ? 'active' : ''; ?>"
                                href="<?= base_url('Semester'); ?>">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon">S</i>
                                <span class="item-name">Semester </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $active == 'Mapel' ? 'active' : ''; ?>"
                                href="<?= base_url('Mapel'); ?>">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon">M</i>
                                <span class="item-name">Mapel</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $active == 'UrutanMapel' ? 'active' : ''; ?>"
                                href="<?= base_url('UrutanMapel'); ?>">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon">U</i>
                                <span class="item-name">Urutan Mapel</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $active == 'Data_siswa' ? 'active' : ''; ?>"
                        href="<?= base_url('Data_siswa'); ?>">
                        <i class="icon">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z"
                                    fill="currentColor"></path>
                                <path opacity="0.4"
                                    d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z"
                                    fill="currentColor"></path>
                                <path opacity="0.4"
                                    d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z"
                                    fill="currentColor"></path>
                                <path opacity="0.4"
                                    d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z"
                                    fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Data Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $active == 'Users' ? 'active' : ''; ?>" href="<?= base_url('Users'); ?>">
                        <i class="icon">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.34933 14.8577C5.38553 14.8577 2 15.47 2 17.9173C2 20.3665 5.364 20.9999 9.34933 20.9999C13.3131 20.9999 16.6987 20.3876 16.6987 17.9403C16.6987 15.4911 13.3347 14.8577 9.34933 14.8577Z"
                                    fill="currentColor"></path>
                                <path opacity="0.4"
                                    d="M9.34935 12.5248C12.049 12.5248 14.2124 10.4062 14.2124 7.76241C14.2124 5.11865 12.049 3 9.34935 3C6.65072 3 4.48633 5.11865 4.48633 7.76241C4.48633 10.4062 6.65072 12.5248 9.34935 12.5248Z"
                                    fill="currentColor"></path>
                                <path opacity="0.4"
                                    d="M16.1733 7.84873C16.1733 9.19505 15.7604 10.4513 15.0363 11.4948C14.961 11.6021 15.0275 11.7468 15.1586 11.7698C15.3406 11.7995 15.5275 11.8177 15.7183 11.8216C17.6165 11.8704 19.3201 10.6736 19.7907 8.87116C20.4884 6.19674 18.4414 3.79541 15.8338 3.79541C15.551 3.79541 15.2799 3.82416 15.0157 3.87686C14.9795 3.88453 14.9404 3.90177 14.9208 3.93244C14.8954 3.97172 14.914 4.02251 14.9394 4.05605C15.7232 5.13214 16.1733 6.44205 16.1733 7.84873Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M21.779 15.1693C21.4316 14.4439 20.593 13.9465 19.3171 13.7022C18.7153 13.5585 17.0852 13.3544 15.5695 13.3831C15.547 13.386 15.5343 13.4013 15.5324 13.4109C15.5294 13.4262 15.5363 13.4492 15.5656 13.4655C16.2662 13.8047 18.9737 15.2804 18.6332 18.3927C18.6185 18.5288 18.729 18.6438 18.867 18.6246C19.5333 18.5317 21.2476 18.1704 21.779 17.0474C22.0735 16.4533 22.0735 15.7634 21.779 15.1693Z"
                                    fill="currentColor"></path>
                            </svg>

                        </i>
                        <span class="item-name">Data User</span>
                    </a>
                </li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Admin</span>
                        <span class="mini-icon">A</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $active == 'pelengkap_rapor' || $active == 'Nilai' ? 'active' : ''; ?>"
                        data-bs-toggle="collapse" href="#menu_rapor" role="button" aria-expanded="false"
                        aria-controls="menu_rapor">
                        <i class="icon">

                            <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M16.8843 5.11485H13.9413C13.2081 5.11969 12.512 4.79355 12.0474 4.22751L11.0782 2.88762C10.6214 2.31661 9.9253 1.98894 9.19321 2.00028H7.11261C3.37819 2.00028 2.00001 4.19201 2.00001 7.91884V11.9474C1.99536 12.3904 21.9956 12.3898 21.9969 11.9474V10.7761C22.0147 7.04924 20.6721 5.11485 16.8843 5.11485Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.8321 6.54353C21.1521 6.91761 21.3993 7.34793 21.5612 7.81243C21.8798 8.76711 22.0273 9.77037 21.9969 10.7761V16.0292C21.9956 16.4717 21.963 16.9135 21.8991 17.3513C21.7775 18.1241 21.5057 18.8656 21.0989 19.5342C20.9119 19.8571 20.6849 20.1553 20.4231 20.4215C19.2383 21.5089 17.665 22.0749 16.0574 21.9921H7.93061C6.32049 22.0743 4.74462 21.5086 3.55601 20.4215C3.2974 20.1547 3.07337 19.8566 2.88915 19.5342C2.48475 18.8661 2.21869 18.1238 2.1067 17.3513C2.03549 16.9142 1.99981 16.4721 2 16.0292V10.7761C1.99983 10.3374 2.02357 9.89902 2.07113 9.46288C2.08113 9.38636 2.09614 9.31109 2.11098 9.23659C2.13573 9.11241 2.16005 8.99038 2.16005 8.86836C2.25031 8.34204 2.41496 7.83116 2.64908 7.35101C3.34261 5.86916 4.76525 5.11492 7.09481 5.11492H16.8754C18.1802 5.01401 19.4753 5.4068 20.5032 6.21522C20.6215 6.3156 20.7316 6.4254 20.8321 6.54353ZM6.97033 15.5412H17.0355H17.0533C17.2741 15.5507 17.4896 15.4717 17.6517 15.3217C17.8137 15.1716 17.9088 14.963 17.9157 14.7425C17.9282 14.5487 17.8644 14.3577 17.7379 14.2101C17.5924 14.0118 17.3618 13.8935 17.1155 13.8907H6.97033C6.51365 13.8907 6.14343 14.2602 6.14343 14.7159C6.14343 15.1717 6.51365 15.5412 6.97033 15.5412Z"
                                    fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Rapor</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="menu_rapor" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link <?= $active == 'Nilai'  ? 'active' : ''; ?>"
                                href="<?= base_url('Nilai'); ?>">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> N </i>
                                <span class="item-name">Nilai </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $active == 'pelengkap_rapor'  ? 'active' : ''; ?>"
                                href="<?= base_url('Rapor/Pelengkap'); ?>">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> P </i>
                                <span class="item-name">Cetak Pelengkap </span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $active == 'Analisis_nilai' || $active == 'SKL' ? 'active' : ''; ?>"
                        data-bs-toggle="collapse" href="#menu_kelulusan" role="button" aria-expanded="false"
                        aria-controls="menu_kelulusan">
                        <i class="icon">

                            <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M16.8843 5.11485H13.9413C13.2081 5.11969 12.512 4.79355 12.0474 4.22751L11.0782 2.88762C10.6214 2.31661 9.9253 1.98894 9.19321 2.00028H7.11261C3.37819 2.00028 2.00001 4.19201 2.00001 7.91884V11.9474C1.99536 12.3904 21.9956 12.3898 21.9969 11.9474V10.7761C22.0147 7.04924 20.6721 5.11485 16.8843 5.11485Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.8321 6.54353C21.1521 6.91761 21.3993 7.34793 21.5612 7.81243C21.8798 8.76711 22.0273 9.77037 21.9969 10.7761V16.0292C21.9956 16.4717 21.963 16.9135 21.8991 17.3513C21.7775 18.1241 21.5057 18.8656 21.0989 19.5342C20.9119 19.8571 20.6849 20.1553 20.4231 20.4215C19.2383 21.5089 17.665 22.0749 16.0574 21.9921H7.93061C6.32049 22.0743 4.74462 21.5086 3.55601 20.4215C3.2974 20.1547 3.07337 19.8566 2.88915 19.5342C2.48475 18.8661 2.21869 18.1238 2.1067 17.3513C2.03549 16.9142 1.99981 16.4721 2 16.0292V10.7761C1.99983 10.3374 2.02357 9.89902 2.07113 9.46288C2.08113 9.38636 2.09614 9.31109 2.11098 9.23659C2.13573 9.11241 2.16005 8.99038 2.16005 8.86836C2.25031 8.34204 2.41496 7.83116 2.64908 7.35101C3.34261 5.86916 4.76525 5.11492 7.09481 5.11492H16.8754C18.1802 5.01401 19.4753 5.4068 20.5032 6.21522C20.6215 6.3156 20.7316 6.4254 20.8321 6.54353ZM6.97033 15.5412H17.0355H17.0533C17.2741 15.5507 17.4896 15.4717 17.6517 15.3217C17.8137 15.1716 17.9088 14.963 17.9157 14.7425C17.9282 14.5487 17.8644 14.3577 17.7379 14.2101C17.5924 14.0118 17.3618 13.8935 17.1155 13.8907H6.97033C6.51365 13.8907 6.14343 14.2602 6.14343 14.7159C6.14343 15.1717 6.51365 15.5412 6.97033 15.5412Z"
                                    fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Kelulusan</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="menu_kelulusan" data-bs-parent="#sidebar-menu">

                        <li class="nav-item">
                            <a class="nav-link <?= $active == 'Analisis_nilai'  ? 'active' : ''; ?>"
                                href="<?= base_url('Kelulusan/Analisis'); ?>">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> A </i>
                                <span class="item-name">Analisis Nilai</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $active == 'SKL'  ? 'active' : ''; ?>"
                                href="<?= base_url('Kelulusan'); ?>">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> S </i>
                                <span class="item-name">Cetak SKL </span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <hr class="hr-horizontal">
                </li>
            </ul>
            <!-- Sidebar Menu End -->
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>