<?= $this->extend('Templates/index') ?>
<?= $this->section('konten') ?>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Daftar Siswa</h4>
            </div>
            <div class="header-title">
                <!-- button refresh -->
                <button type="button" class="btn btn-secondary btn-md btn-sm"
                    onclick="$('#table_data_siswa').DataTable().ajax.reload();">
                    <svg class="icon-24" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.8397 20.1642V6.54639" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M20.9173 16.0681L16.8395 20.1648L12.7617 16.0681" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M6.91102 3.83276V17.4505" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M2.8335 7.92894L6.91127 3.83228L10.9891 7.92894" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
                <!-- hapus semua data -->
                <button type="button" class="btn btn-danger btn-md btn-sm" data-bs-toggle="modal"
                    data-bs-target="#delete">
                    <svg class="icon-24" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                </button>
                <a href="#" class="btn btn-primary btn-md btn-sm" data-bs-toggle="modal" data-bs-target="#import">
                    <svg class="icon-24" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14.7364 2.76175H8.0844C6.0044 2.75375 4.3004 4.41075 4.2504 6.49075V17.2277C4.2054 19.3297 5.8734 21.0697 7.9744 21.1147C8.0114 21.1147 8.0484 21.1157 8.0844 21.1147H16.0724C18.1624 21.0407 19.8144 19.3187 19.8024 17.2277V8.03775L14.7364 2.76175Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path d="M14.4746 2.75V5.659C14.4746 7.079 15.6236 8.23 17.0436 8.234H19.7976"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path d="M11.6406 9.90869V15.9497" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M13.9864 12.2642L11.6414 9.90918L9.29639 12.2642" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <!-- Import data -->
                </a>
            </div>
        </div>
        <div class="card-body px-0">
            <div class="row my-2 mx-1">
                <div class="col-md-3 py-2">
                    <div class="form-group">
                        <label for="status_pengecekan">Status Pengecekan</label>
                        <select class="form-select mt-2" id="status_pengecekan">
                            <option value="">Semua</option>
                            <option value="0">Belum Verifikasi</option>
                            <option value="1">Terverifikasi</option>
                            <option value="2">Tidak Valid</option>
                        </select>
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
                                <th>Status</th>
                                <th style="min-width: 100px">Action</th>
                            </tr>
                            <!-- kolom  PENCARIAN -->
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
    <div class="modal fade" id="import" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="importLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importLabel">Import data siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <form class="needs-validation" novalidate enctype="multipart/form-data" method="post"
                    action="<?= base_url('Data_siswa/import') ?>"> -->
                    <form class="needs-validation" novalidate id="form-import" enctype="multipart/form-data"
                        method="post">
                        <div class="mb-4">
                            <label for="file" class="form-label">File</label>
                            <input type="file" class="form-control" id="file" name="file" required
                                accept=".xlsx , .xls ">
                            <div class="invalid-feedback">
                                File harus diisi
                            </div>
                            <a href="<?= base_url('Assets/template/TEMPLATE IMPORT DATA SISWA.xlsx') ?>"
                                class="my-2 text-decoration-none" target="_blank">Download template</a>

                        </div>
                        <div class="text-start mt-3">
                            <button type="submit" class="btn btn-primary" id="btn-import">Import</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Hasil import -->
    <div class="modal fade" id="hasil-import" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="hasil-importLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hasil-importLabel">Hasil Import</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive hasil_import_data">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Data</th>
                                    <th>Status</th>
                                    <th>Ket</th>
                                </tr>

                            </thead>
                            <tbody id="hasil_import_data">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span>Total Data : <span id="totalData"></span></span>
                                            </div>
                                            <div>
                                                <span>Total Sukses : <span id="totalSukses"></span></span>
                                            </div>
                                            <div>
                                                <span>Total Error : <span id="totalError"></span></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <style>
                        .hasil_import_data {
                            overflow-y: auto;
                            height: 300px;
                        }

                        .hasil_import_data thead,
                        .hasil_import_data tfoot {
                            position: sticky;
                        }

                        .hasil_import_data thead {
                            top: 0;
                            background-color: #f8f9fc;
                        }

                        .hasil_import_data tfoot {
                            bottom: 0;
                            background-color: #f8f9fc;
                        }

                        .hasil_import_data tbody {
                            overflow-y: auto;
                            height: 300px;
                        }

                        .hasil_import_data tbody::-webkit-scrollbar {
                            width: 6px;
                        }

                        .hasil_import_data tbody::-webkit-scrollbar-thumb {
                            background-color: #007bff;
                            border-radius: 10px;
                        }

                        .hasil_import_data tbody::-webkit-scrollbar-track {
                            background-color: #f8f9fc;
                        }

                        .hasil_import_data tbody::-webkit-scrollbar-thumb:hover {
                            background-color: #0056b3;
                        }

                        .hasil_import_data tbody::-webkit-scrollbar-thumb:active {
                            background-color: #003d7f;
                        }

                        .hasil_import_data thead {
                            overflow: hidden;
                        }

                        .hasil_import_data tbody {
                            overflow: auto;
                        }

                        .hasil_import_data tfoot {
                            overflow: hidden;
                        }

                        .hasil_import_data thead th {
                            position: sticky;
                            top: 0;
                            z-index: 1;
                        }


                        .hasil_import_data tfoot th {
                            position: sticky;
                            bottom: 0;
                            z-index: 1;
                        }

                        .hasil_import_data thead th {
                            background-color: #f8f9fc;
                        }

                        .hasil_import_data tfoot th {
                            background-color: #f8f9fc;
                        }

                        .hasil_import_data tbody::-webkit-scrollbar {
                            width: 6px;
                        }

                        .hasil_import_data tbody::-webkit-scrollbar-thumb {
                            background-color: #007bff;
                            border-radius: 10px;
                        }

                        .hasil_import_data tbody::-webkit-scrollbar-track {
                            background-color: #f8f9fc;
                        }

                        .hasil_import_data tbody::-webkit-scrollbar-thumb:hover {
                            background-color: #0056b3;
                        }

                        .hasil_import_data tbody::-webkit-scrollbar-thumb:active {
                            background-color: #003d7f;
                        }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- konfirmasi hapus -->
    <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="#" class="btn btn-danger" id="btn-delete">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('konten'); ?>
<?= $this->section('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"
    integrity="sha384-VFQrHzqBh5qiJIU0uGU5CIW3+OWpdGGJM9LBnGbuIH2mkICcFZ7lPd/AAtI7SNf7" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"
    integrity="sha384-/RlQG9uf0M2vcTw3CX7fbqgbj/h8wKxw7C3zu9/GxcBPRKOEcESxaxufwRXqzq6n" crossorigin="anonymous">
</script>
<script
    src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.2.2/b-3.2.2/b-colvis-3.2.2/b-html5-3.2.2/b-print-3.2.2/datatables.min.js"
    integrity="sha384-GC9Im1BDtt06YOKSzkS553+5q43Nos2JSnLM31TjWFcFbzZrFhAtgCzrHDGM0iDy" crossorigin="anonymous">
</script>
<!-- data tables export cdn-->
<script type="text/javascript">
function dataTablesDataSiswa() {
    $('#table_data_siswa').DataTable({
        processing: true,
        serverSide: true,
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        paging: true,
        searching: true,
        ajax: {
            url: '<?= base_url('Data_siswa/ajaxDataTables') ?>',
            type: 'POST',
            data: function(data) {
                data.status_pengecekan = $('#status_pengecekan').val();
            }
        },
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
        dom: '<"d-flex justify-content-between align-items-center mb-2 lg-12 button_cetak"lfB>rtip', // add button export
        buttons: [{
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            },
            // 'colvis'
        ],
        columns: [{
                data: null,
                sortable: false,
                searchable: false,
                // title: 'No',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                // title: 'Nama Siswa',
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
                // title: 'Status',
                data: 'status_pengecekan',
                render: function(data, type, row) {
                    if (data == '1') {
                        return '<span class="badge bg-success">Terverifikasi</span>';
                    } else if (data == '2') {
                        return '<span class="badge bg-danger">Tidak Valid</span>';
                    } else {
                        return '<span class="badge bg-warning">Belum Verifikasi</span>';
                    }
                }
            },
            {
                // title: 'Action',
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
                            that.search(this.value).draw();
                        }
                    });
                });
        }
    });
}

dataTablesDataSiswa();

// when change status_pengecekan
$('#status_pengecekan').change(function() {
    // alert('ok');
    $('#table_data_siswa').DataTable().ajax.reload();
});

$(document).ready(function() {
    $('#form-import').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: '<?= base_url('Data_siswa/import'); ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#btn-import').attr('disabled', 'disabled');
                $('#btn-import').html(
                    '<i class="fas fa-spinner fa-spin"></i> Loading...');
            },
            success: function(response) {
                // hide modal import
                $('#import').modal('hide');

                if (response.error) {
                    alert(response.data);
                } else {
                    $('#hasil-import').modal('show');
                    // hapus data form
                    $('#form-import')[0].reset();
                    var html = '';
                    if (response.data.result.length > 0) {

                        $.each(response.data.result, function(key, value) {
                            html += '<tr' + (value.status == 'Failed' ?
                                ' class="table-danger"' : '') + '>';
                            html += '<td class="text-center">' + value.no +
                                '</td>';
                            html += '<td>' + value.data + '</td>';
                            html += '<td>' + value.message + '</td>';
                            html += '<td>' + value.status + '</td>';
                            html += '</tr>';
                        });

                    } else {
                        html += '<tr>';
                        html +=
                            '<td colspan="4" class="text-center">Tidak ada data yang gagal diimport</td>';
                        html += '</tr>';
                    }

                    $('#hasil_import_data').html(html);

                    // total data
                    $('#totalData').html(response.data.total_data);
                    $('#totalSukses').html(response.data.success);
                    $('#totalError').html(response.data.failed);

                }
                $('#btn-import').removeAttr('disabled');
                $('#btn-import').html('Import');
            },
            error: function() {
                alert('Error');
                $('#btn-import').removeAttr('disabled');
                $('#btn-import').html('Import');
            }
        });
    });

    // close modal hasil import
    $('#hasil-import').on('hidden.bs.modal', function() {
        // reload data
        $('#table_data_siswa').DataTable().ajax.reload();
    });
});

// when click delete button btn-delete
$('#btn-delete').click(function() {
    $.ajax({
        url: '<?= base_url('Data_siswa/deleteAllData') ?>',
        type: 'POST',
        dataType: 'json',
        beforeSend: function() {
            $('#btn-delete').attr('disabled', 'disabled');
            $('#btn-delete').html(
                '<i class="fas fa-spinner fa-spin"></i> Loading...');
        },
        success: function(response) {
            if (response.status == '200') {
                $('#delete').modal('hide');
                $('#table_data_siswa').DataTable().ajax.reload();
                sweetalert('success', 'Berhasil', 'Data berhasil dihapus');
            } else {
                sweetalert('error', 'Gagal', 'Data gagal dihapus');
            }
            $('#btn-delete').removeAttr('disabled');
            $('#btn-delete').html('Hapus');
        },
        error: function() {
            alert('Error');
            $('#btn-delete').removeAttr('disabled');
            $('#btn-delete').html('Hapus');
        }
    });
});
</script>
<?= $this->endSection('script'); ?>