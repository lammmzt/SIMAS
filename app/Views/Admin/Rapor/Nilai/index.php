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
                        <button type="button" class="btn btn-secondary btn-md btn-sm me-2"
                            onclick="$('#table_data_siswa').DataTable().ajax.reload();">
                            <svg class="icon-24" width="32" viewBox="0 0 24 24" fill="none"
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
                        </button>
                        <a href="#" class="btn btn-primary btn-md btn-sm " data-bs-toggle="modal"
                            data-bs-target="#import">
                            <svg class="icon-24" width="32" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.7364 2.76175H8.0844C6.0044 2.75375 4.3004 4.41075 4.2504 6.49075V17.2277C4.2054 19.3297 5.8734 21.0697 7.9744 21.1147C8.0114 21.1147 8.0484 21.1157 8.0844 21.1147H16.0724C18.1624 21.0407 19.8144 19.3187 19.8024 17.2277V8.03775L14.7364 2.76175Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                                <path d="M14.4746 2.75V5.659C14.4746 7.079 15.6236 8.23 17.0436 8.234H19.7976"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
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
<div class="modal fade" id="import" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="importLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importLabel">Import data nilai siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <form class="needs-validation" novalidate enctype="multipart/form-data" method="post"
                    action="<?= base_url('Nilai/import') ?>"> -->
                <form class="" id="form-import" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label for="id_semester" class="form-label">Semester</label>
                        <select class="form-select select1" id="id_semester" name="id_semester" required
                            style="width: 100%; z-index: 9999;">
                            <option value="">Pilih Semester</option>
                            <?php foreach ($semester as $value) : ?>
                            <option value="<?= $value['id_semester']; ?>">
                                <?= $value['tahun_ajaran'] . ' - ' .   ($value['nama_semester'] == '1' ? 'Ganjil' : 'Genap'); ?>
                            </option>
                            <?php endforeach; ?>

                        </select>
                        <div class="invalid-feedback">
                            Semester harus diisi
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="file" class="form-label">File</label>
                        <input type="file" class="form-control" id="file" name="file" required accept=".xlsx , .xls ">
                        <div class="invalid-feedback">
                            File harus diisi
                        </div>
                        <a href="<?= base_url('Assets/template/TTemplate Import Nilai.xlsx') ?>"
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
            url: '<?= base_url('Nilai/ajaxDataTables') ?>',
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
                className: 'text-center',
                sortable: false,
                searchable: false

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


$(document).ready(function() {
    $(".select1").select2({
        dropdownParent: $("#import")
    });
});
dataTablesDataSiswa();

// when change kelas_data_dapodik
$('#kelas_data_dapodik').change(function() {
    // alert('ok');
    $('#table_data_siswa').DataTable().ajax.reload();
});

$(document).ready(function() {
    $('#form-import').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: '<?= base_url('Nilai/import'); ?>',
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
                if (response.error) {
                    sweetalert('error', response.data);
                    $('#btn-import').removeAttr('disabled');
                    $('#btn-import').html('Import');
                    $('#form-import')[0].reset();
                } else {
                    $('#import').modal('hide');
                    $('#hasil-import').modal('show');
                    // hapus data form
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
                    $('#form-import')[0].reset();

                    $('#btn-import').removeAttr('disabled');
                    $('#btn-import').html('Import');
                }
                // form reset
            },
            error: function() {
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
</script>
<?= $this->endSection('script'); ?>