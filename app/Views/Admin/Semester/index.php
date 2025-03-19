<?= $this->extend('Templates/index') ?>
<?= $this->section('konten') ?>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Daftar Semester</h4>
            </div>
            <div class="header-title">
                <!-- hapus semua data -->
                <button type="button" class="btn btn-primary btn-md btn-sm" data-bs-toggle="modal"
                    data-bs-target="#add">
                    <svg class="icon-24" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">=
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z"
                            fill="currentColor"></path>

                    </svg> Tambah
                </button>

            </div>
        </div>
        <div class="card-body px-0 mx-2 ">
            <div class="bd-example">

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
                <table id="table_data_semester" class="table table-striped" role="grid" data-bs-toggle="data-table">
                    <thead>
                        <tr class="ligth">
                            <th>#</th>
                            <th>Tahun Ajaran</th>
                            <th style="max-width: 100px">Nama semester</th>
                            <th style="max-width: 100px">Status</th>
                            <th style="max-width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- konfirmasi hapus -->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLabel">Tambah Data semester</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" class="needs-validation" novalidate id="form-add">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tahun_ajaran" class="form-label text-dark">Tahun Ajaran</label>
                        <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" required autofocus
                            placeholder="Contoh: 2021/2022">
                        <div class="invalid-feedback">
                            Tahun Ajaran harus diisi.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama_semester" class="form-label text-dark">Nama semester</label>
                        <select class="form-select" id="nama_semester" name="nama_semester" required>
                            <option value="">Pilih semester</option>
                            <option value="1">Ganjil</option>
                            <option value="2">Genap</option>
                        </select>
                        <div class="invalid-feedback">
                            Nama semester harus diisi.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Edit Data semester</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" class="needs-validation" novalidate id="form-edit">
                <div class="modal-body">
                    <input type="hidden" name="id_semester" id="edit_id">
                    <div class="mb-3">
                        <label for="tahun_ajaran" class="form-label text-dark">Tahun Ajaran</label>
                        <input type="text" class="form-control" id="edit_tahun_ajaran" name="tahun_ajaran" required>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama_semester" class="form-label text-dark">Nama semester</label>
                        <select class="form-select" id="edit_nama_semester" name="nama_semester" required>
                            <option value="">Pilih semester</option>
                        </select>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="btn-update">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('konten'); ?>
<?= $this->section('script'); ?>
<script type="text/javascript">
function dataTablesDatasemester() {
    $('#table_data_semester').DataTable({
        processing: true,
        serverSide: true,
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        paging: true,
        searching: true,
        ajax: {
            url: '<?= base_url('Semester/ajaxDataTables') ?>',
            type: 'GET',
        },
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
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
                data: 'tahun_ajaran',
                title: 'Tahun Ajaran',
            },
            {
                render: function(data, type, row) {
                    if (row.nama_semester == 1) {
                        return 'Ganjil';
                    } else {
                        return 'Genap';
                    }
                },
                title: 'Nama Semester',
                className: 'text-center',
            },
            {
                data: 'status_semester',
                title: 'Status',
                className: 'text-center',
                sortable: false,
                searchable: false,
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
            "targets": [0, 3, 4]
        }],
    });
}

dataTablesDatasemester();

var fieldList = ['tahun_ajaran', 'nama_semester'];

var fieldListEdit = ['edit_tahun_ajaran', 'edit_nama_semester'];

fieldList.forEach(function(field) {
    $('#' + field).on('input', function() {
        $(this).removeClass('is-invalid');
        $(this).closest('.mb-3').find('.invalid-feedback').html('');
    });
});

fieldListEdit.forEach(function(field) {
    $('#' + field).on('input', function() {
        $(this).removeClass('is-invalid');
        $(this).closest('.mb-3').find('.invalid-feedback').html('');
    });
});

// save data
$('#btn-save').click(function(e) {
    e.preventDefault();
    var form = $('#form-add');
    var formData = form.serialize();
    var url = '<?= base_url('Semester/save') ?>';
    // change button text
    $('#btn-save').html(
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
    ).attr('disabled', true);
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function(response) {
            if (response.status == '200') {
                sweetalert('success', 'Berhasil', response.data);
                $('#add').modal('hide');
                $('#form-add')[0].reset();
                $('#btn-save').html('Simpan').attr('disabled', false);
                $('#table_data_semester').DataTable().ajax.reload();
            } else {
                // add error message
                $.each(response.data, function(key, value) {
                    $('#' + key).addClass('is-invalid');
                    $('#' + key).closest('.mb-3').find('.invalid-feedback').html(value);
                });
                $('#btn-save').html('Simpan').attr('disabled', false);
            }
        },
        error: function() {
            sweetalert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data');
            $('#btn-save').html('Simpan').attr('disabled', false);
        }
    });
});

// edit data
$('#table_data_semester').on('click', '.btn-edit', function() {
    var id = $(this).data('id');
    // alert(id);
    var url = '<?= base_url('Semester/fetchsemester') ?>';
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            id: id,
        },
        success: function(response) {
            if (response.status == '200') {
                $('#edit').modal('show');
                $('#edit_tahun_ajaran').val(response.data.tahun_ajaran);
                // select
                var html = '';
                if (response.data.nama_semester == 1) {
                    html += '<option value="1" selected>Ganjil</option>';
                    html += '<option value="2">Genap</option>';
                } else {
                    html += '<option value="1">Ganjil</option>';
                    html += '<option value="2" selected>Genap</option>';
                }
                $('#edit_nama_semester').html(html);
                $('#edit_id').val(id);
            } else {
                sweetalert('error', 'Gagal', 'Terjadi kesalahan saat mengambil data');
            }
        },
        error: function() {
            sweetalert('error', 'Gagal', 'Terjadi kesalahan saat mengambil data');
        }
    });
});

// update data
$('#btn-update').click(function(e) {
    e.preventDefault();
    var form = $('#form-edit');
    var formData = form.serialize();
    var url = '<?= base_url('Semester/update') ?>';
    // change button text
    $('#btn-update').html(
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
    ).attr('disabled', true);
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function(response) {
            if (response.status == '200') {
                sweetalert('success', 'Berhasil', response.data);
                $('#edit').modal('hide');
                $('#form-edit')[0].reset();
                $('#btn-update').html('Simpan').attr('disabled', false);
                $('#table_data_semester').DataTable().ajax.reload();
            } else {
                // add error message
                $.each(response.data, function(key, value) {
                    $('#edit_' + key).addClass('is-invalid');
                    $('#edit_' + key).closest('.mb-3').find('.invalid-feedback').html(
                        value);
                });
                $('#btn-update').html('Simpan').attr('disabled', false);
            }
        },
        error: function() {
            sweetalert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data');
            $('#btn-update').html('Simpan').attr('disabled', false);
        }
    });
});

// change status
$('#table_data_semester').on('click', '.change_status_semester', function() {
    var id = $(this).attr('id');
    // alert(id);
    var url = '<?= base_url('Semester/updateStatus') ?>';
    // ubahan status
    var status = $(this).data('status');
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            id: id,
            status: status
        },
        success: function(response) {
            if (response.status == '200') {
                sweetalert('success', 'Berhasil', response.data);
                $('#table_data_semester').DataTable().ajax.reload();
            } else {
                sweetalert('error', 'Gagal', 'Terjadi kesalahan saat mengubah status');
            }
        },
        error: function() {
            sweetalert('error', 'Gagal', 'Terjadi kesalahan saat mengubah status');
        }
    });
});
</script>
<?= $this->endSection('script'); ?>