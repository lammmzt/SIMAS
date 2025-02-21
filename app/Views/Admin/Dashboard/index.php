<?= $this->extend('Templates/index'); ?>
<?= $this->section('konten'); ?>
<div class="col-md-12 col-lg-12">
    <div class="row row-cols-1">
        <div class="overflow-hidden d-slider1 ">
            <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div id="circle-progress-01"
                                class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                                <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Total Siswa</p>
                                <h4 class="counter"><?= $jumlah_siswa; ?></h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div id="circle-progress-02"
                                class="text-center circle-progress-01 circle-progress circle-progress-info"
                                data-min-value="0" data-max-value="100"
                                data-value="<?= ($data_valid != 0) ? round(($data_valid / $jumlah_siswa) * 100) : 0; ?>"
                                data-type="percent">
                                <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Data Valid</p>
                                <h4 class="counter"><?= $data_valid; ?></h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div id="circle-progress-03"
                                class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                data-min-value="0" data-max-value="100"
                                data-value="<?= ($belum_valid != 0) ? round(($belum_valid / $jumlah_siswa) * 100) : 0; ?>"
                                data-type="percent">
                                <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Belum Valid</p>
                                <h4 class="counter"><?= $belum_valid; ?></h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div id="circle-progress-04"
                                class="text-center circle-progress-01 circle-progress circle-progress-info"
                                data-min-value="0" data-max-value="100"
                                data-value="<?= ($jumlah_belum_verifikasi != 0) ? round(($jumlah_belum_verifikasi / $jumlah_siswa) * 100) : 0; ?>"
                                data-type="percent">
                                <svg class="card-slie-arrow icon-24" width="24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Belum Verifikasi</p>
                                <h4 class="counter"><?= $jumlah_belum_verifikasi; ?></h4>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
            <div class="swiper-button swiper-button-next"></div>
            <div class="swiper-button swiper-button-prev"></div>
        </div>
    </div>
</div>
<div class="col-md-12 col-lg-12">
    <!-- tabs on card -->
    <div class="card card-default card-demo">
        <div class="card-header">
            <h2 class="card-title">Data Siswa</h2>
        </div>
        <div class="card-body">
            <div class="tabs-container">
                <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="data-siswa-tab" data-toggle="tab" href="#data-siswa" role="tab"
                            aria-controls="data-siswa" aria-selected="true">Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" id="belum-verifikasi-tab" href="#data-siswa" role="tab"
                            aria-controls="data-siswa" aria-selected="false">Belum Verifikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="valid-tab" data-toggle="tab" href="#data-siswa" role="tab"
                            aria-controls="data-siswa" aria-selected="false">Valid</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tidak-valid-tab" data-toggle="tab" href="#data-siswa" role="tab"
                            aria-controls="data-siswa" aria-selected="false">Tidak Valid</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="data-siswa" role="tabpanel"
                        aria-labelledby="data-siswa-tab">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table-data-siswa">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NISN</th>
                                        <th>Asal Sekolah</th>
                                        <th>Status Pengecekan</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th><input type="text" class="form-control form-control-sm column-search"
                                                placeholder="Cari Nama"></th>
                                        <th><input type="text" class="form-control form-control-sm column-search"
                                                placeholder="Cari NIS"></th>
                                        <th><input type="text" class="form-control form-control-sm column-search"
                                                placeholder="Cari NISN"></th>
                                        <th><input type="text" class="form-control form-control-sm column-search"
                                                placeholder="Cari Kelas"></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('konten'); ?>
<?= $this->section('script'); ?>
<script>
// when change tab
$('#myTab a').on('click', function(e) {
    e.preventDefault()
    $(this).tab('show')
})

function dataTablesDataSiswa(id) {
    $('#table-data-siswa').DataTable({
        processing: true,
        serverSide: true,
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        ajax: {
            url: '<?= base_url('Data_siswa/ajaxDataTables') ?>',
            type: 'POST',
            data: function(data) {
                data.status_pengecekan = id;
            }
        },
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, ]
        ],
        columns: [{
                data: null,
                sortable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'nama_lengkap_data_siswa'
            },
            {
                data: 'nis_data_siswa'
            },
            {
                data: 'nisn_data_siswa'
            },
            {
                data: 'kelas_data_dapodik'
            },

            {
                data: 'action',
                className: 'text-center',
                sortable: false,
                searchable: false,
            }
        ],
        "order": [
            [1, 'asc']
        ],
        "columnDefs": [{
            "orderable": false,
            "targets": [0, 5]
        }],

        initComplete: function() {
            this.api()
                .columns()
                .every(function() {
                    var that = this;

                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });

                });
        }
    });
}

$(document).ready(function() {
    dataTablesDataSiswa('0');
});

$('#data-siswa-tab').on('click', function() {
    $('#table-data-siswa').DataTable().destroy();
    dataTablesDataSiswa('0');
});

$('#valid-tab').on('click', function() {
    $('#table-data-siswa').DataTable().destroy();
    dataTablesDataSiswa('1');
});

$('#tidak-valid-tab').on('click', function() {
    $('#table-data-siswa').DataTable().destroy();
    dataTablesDataSiswa('2');
});

$('#belum-verifikasi-tab').on('click', function() {
    $('#table-data-siswa').DataTable().destroy();
    dataTablesDataSiswa('0');
});
</script>
<?= $this->endSection('script'); ?>