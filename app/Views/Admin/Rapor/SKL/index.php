<?= $this->extend('Templates/index') ?>
<?= $this->section('konten') ?>
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
                        <div class="form-group">
                            <label for="kelas_data_dapodik">Kelas</label>
                            <select class="form-select mt-2 select2" id="kelas_data_dapodik">
                                <option value="">Pilih Kelas</option>
                                <option value="XII Kartini 1">XII Kartini 1</option>
                                <option value="XII Kartini 2">XII Kartini 2</option>
                                <option value="XII Kartini 3">XII Kartini 3</option>
                                <option value="XII Kartini 4">XII Kartini 4</option>
                                <option value="XII Kartini 5">XII Kartini 5</option>
                                <option value="XII Kartini 6">XII Kartini 6</option>
                                <option value="XII Kartini 7">XII Kartini 7</option>
                                <option value="XII Kartini 8">XII Kartini 8</option>
                                <option value="XII Kartini 9">XII Kartini 9</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-9 py-2 d-flex justify-content-end align-items-end ">
                        <!-- btn generate dan cetak -->
                        <button type="button" class="btn btn-success btn-md btn-sm mx-2" id="btn-generate">
                            <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.8397 20.1642V6.54639" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M20.9173 16.0681L16.8395 20.1648L12.7617 16.0681" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M6.91102 3.83276V17.4505" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M2.8335 7.92894L6.91127 3.83228L10.9891 7.92894" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            Generate
                        </button>
                        <button type="button" class="btn btn-primary btn-md btn-sm" id="btn-cetak-all">
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
                            Cetak Semua
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
                <div class="table-responsive">
                    <table id="table_data_siswa" class="table table-striped" role="grid" data-bs-toggle="data-table">
                        <thead>
                            <tr class="ligth">
                                <th>#</th>
                                <th>Nama Siswa</th>
                                <th>NIS</th>
                                <th>NISN</th>
                                <th>Kelas</th>
                                <th style="min-width: 100px">Action</th>
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
<?= $this->endSection('konten'); ?>
<?= $this->section('script'); ?>
<script type="text/javascript">
function dataTablesDataSiswa() {
    $('#table_data_siswa').DataTable({
        processing: true,
        serverSide: true,
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        ajax: {
            url: '<?= base_url('Rapor/ajaxDataTablesSKL') ?>',
            type: 'POST',
            data: function(data) {
                data.kelas_data_dapodik = $('#kelas_data_dapodik').val();
            }
        },
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
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

            }
        ],
        "order": [
            [1, 'asc']
        ],
        "columnDefs": [{
            "orderable": false,
            "targets": [0, 5]
        }],


    });
}
dataTablesDataSiswa();

// when change kelas_data_dapodik
$('#kelas_data_dapodik').change(function() {
    // alert('ok');
    $('#table_data_siswa').DataTable().ajax.reload();
});

// when click generate
$('#btn-generate').click(function() {
    var kelas_data_dapodik = $('#kelas_data_dapodik').val();
    if (kelas_data_dapodik == '') {
        sweetalert('error', 'Gagal', 'Pilih kelas terlebih dahulu');
    } else {
        // add loading
        $('#loading-page').show();
        $.ajax({
            url: '<?= base_url('Rapor/generateSKL') ?>',
            type: 'POST',
            data: {
                kelas_data_dapodik: kelas_data_dapodik
            },
            success: function(response) {
                if (response.error == false) {
                    $('#loading-page').hide();
                    sweetalert('success', 'Berhasil', response.data);
                    $('#table_data_siswa').DataTable().ajax.reload();
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

// when click cetak all
$('#btn-cetak-all').click(function() {
    var kelas_data_dapodik = $('#kelas_data_dapodik').val();
    if (kelas_data_dapodik == '') {
        sweetalert('error', 'Gagal', 'Pilih kelas terlebih dahulu');
    } else {
        // add loading
        $('#loading-page').show();
        $.ajax({
            url: '<?= base_url('Rapor/cetakSemuaSKL') ?>',
            type: 'POST',
            data: {
                kelas_data_dapodik: kelas_data_dapodik
            },
            success: function(response) {
                if (response.error == false) {
                    $('#loading-page').hide();
                    window.open('<?= base_url('Assets/pdf/SKL/') ?>' + response.data,
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