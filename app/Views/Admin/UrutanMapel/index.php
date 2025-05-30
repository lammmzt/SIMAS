<?= $this->extend('Templates/index') ?>
<?= $this->section('konten') ?>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Daftar Urutan Mapel</h4>
            </div>
            <div class="header-title">
                <!-- hapus semua data -->
                <button type="button" class="btn btn-primary btn-md btn-sm" data-bs-toggle="modal" data-bs-target="#add"
                    style="display: none;" id="showBtnAdd">
                    <svg class="icon-24" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">=
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z"
                            fill="currentColor"></path>

                    </svg> Tambah
                </button>

            </div>
        </div>
        <div class="card-body px-0 mx-2">
            <div class="row mx-1">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tingkatan_urutan_mapel" class="form-label">Tingkatan Urutan Mapel</label>
                        <select class="form-select" id="tingkatan_urutan_mapel" name="tingkatan_urutan_mapel"
                            style="width: 200px; min-width: 200px;">
                            <option value="">Pilih Tingkatan</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <div class="mb-3">
                        <button type="button" class="btn btn-secondary btn-md btn-sm"
                            onclick="$('#table_data_UrutanMapel').DataTable().ajax.reload();">
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
                    </div>
                </div>
            </div>
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
                <table id="table_data_UrutanMapel" class="table table-striped" role="grid" data-bs-toggle="data-table">
                    <thead>
                        <tr class="ligth">
                            <th width="5%" class="text-center">No</th>
                            <th width="40%" class="text-center">Nama Mapel</th>
                            <th width="20%" class="text-center">Kelompok Mapel</th>
                            <th width="20%" class="text-center">Urutan Mapel</th>
                            <th width="15%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add -->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLabel">Tambah Data Urutan Mapel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" class="" novalidate id="form-add">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="id_mapel" class="form-label text-dark">Nama Mapel</label>
                        <select class="form-select select2" id="id_mapel" name="id_mapel" required
                            style="width: 100% z-index: 9999">
                            <option value="">Pilih Mapel</option>
                            <?php foreach($mapel as $row): ?>
                            <option value="<?= $row['id_mapel'] ?>"><?= $row['nama_mapel'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kel_mapel" class="form-label text-dark">Nama Mapel</label>
                        <select class="form-select select2" id="kel_mapel" name="kel_mapel" required
                            style="width: 100% z-index: 9999">
                            <option value="">Pilih Mapel</option>
                            <option value="Umum">Umum</option>
                            <option value="Pilihan">Pilihan</option>
                            <option value="Muatan Lokal">Muatan Lokal</option>
                        </select>
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


<?= $this->endSection('konten'); ?>
<?= $this->section('script'); ?>
<script type="text/javascript">
$(document).ready(function() {
    $(".select2").select2({
        dropdownParent: $("#add"),
    });

    $('#tingkatan_urutan_mapel').change(function() {
        $('#table_data_UrutanMapel').DataTable().ajax.reload();
        if ($(this).val() != '') {
            $('#showBtnAdd').show();
        } else {
            $('#showBtnAdd').hide();
        }
    });

});

function dataTablesDataUrutanMapel() {
    $('#table_data_UrutanMapel').DataTable({
        processing: true,
        serverSide: true,
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        paging: false,
        searching: false,
        info: false,
        ordering: false,
        ajax: {
            url: '<?= base_url('UrutanMapel/ajaxDataTables') ?>',
            type: 'POST',
            data: function(data) {
                data.tingkatan_urutan_mapel = $('#tingkatan_urutan_mapel').val();
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
                // title: 'No',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'nama_mapel',
                name: 'nama_mapel',
                title: 'Nama Mapel',
            },
            {
                data: 'kel_mapel',
                name: 'kel_mapel',
                title: 'Kelompok Mapel',
                className: 'text-center',
            },
            {
                data: 'no_urutan_mapel',
                name: 'no_urutan_mapel',
                title: 'Urutan Mapel',
                className: 'text-center',
            },
            {
                data: 'action',
                name: 'action',
                title: 'Action',
                className: 'text-center',
            }
        ],
        "order": [
            [3, 'asc']
        ],
    });
}

dataTablesDataUrutanMapel();

// save data
$('#btn-save').click(function(e) {
    e.preventDefault();
    var form = $('#form-add');
    var id_mapel = $('#id_mapel').val();
    var tingkatan_urutan_mapel = $('#tingkatan_urutan_mapel').val();
    var kel_mapel = $('#kel_mapel').val();
    if (id_mapel == '') {
        sweetalert('error', 'Gagal', 'Pilih Mapel Terlebih Dahulu');
        return false;
    }
    var url = '<?= base_url('UrutanMapel/save') ?>';
    // change button text
    $('#btn-save').html(
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
    ).attr('disabled', true);

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            id_mapel: id_mapel,
            tingkatan_urutan_mapel: tingkatan_urutan_mapel,
            kel_mapel: kel_mapel
        },
        dataType: 'json',
        success: function(response) {
            if (response.status == '200') {
                sweetalert('success', 'Berhasil', response.data);
                $('#add').modal('hide');
                $('#form-add')[0].reset();
                $('#btn-save').html('Simpan').attr('disabled', false);
                $('#table_data_UrutanMapel').DataTable().ajax.reload();
            } else {
                sweetalert('error', 'Gagal', response.data);
                $('#btn-save').html('Simpan').attr('disabled', false);
            }
        },
        error: function() {
            sweetalert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data');
            $('#btn-save').html('Simpan').attr('disabled', false);
        }
    });
});

// change_kel_mapel
$(document).on('change', '.change_kel_mapel', function() {
    var id = $(this).data('id');
    var kel_mapel = $(this).val();
    var url = '<?= base_url('UrutanMapel/updateKelMapel') ?>';
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            id_urutan_mapel: id,
            kel_mapel: kel_mapel
        },
        dataType: 'json',
        success: function(response) {
            if (response.status == '200') {
                sweetalert('success', 'Berhasil', response.data);
                // $('#table_data_UrutanMapel').DataTable().ajax.reload();
            } else {
                sweetalert('error', 'Gagal', response.data);
            }
        },
        error: function() {
            sweetalert('error', 'Gagal', 'Terjadi kesalahan saat mengubah data');
        }
    });
});

// change_no_urutan_mapel
$(document).on('change', '.change_no_urutan_mapel', function() {
    var id = $(this).data('id');
    var no_urutan_mapel = $(this).val();
    var url = '<?= base_url('UrutanMapel/updateNoUrutanMapel') ?>';
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            id_urutan_mapel: id,
            no_urutan_mapel: no_urutan_mapel
        },
        dataType: 'json',
        success: function(response) {
            if (response.status == '200') {
                sweetalert('success', 'Berhasil', response.data);
                // $('#table_data_UrutanMapel').DataTable().ajax.reload();
            } else {
                sweetalert('error', 'Gagal', response.data);
            }
        },
        error: function() {
            sweetalert('error', 'Gagal', 'Terjadi kesalahan saat mengubah data');
        }
    });
});

// hapus data
$(document).on('click', '.btn-hapus', function() {
    var id = $(this).data('id');
    var url = '<?= base_url('UrutanMapel/delete') ?>';
    Swal.fire({
        title: 'Hapus Data',
        text: "Apakah Anda yakin ingin menghapus data ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id_urutan_mapel: id
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == '200') {
                        sweetalert('success', 'Berhasil', response.data);
                        $('#table_data_UrutanMapel').DataTable().ajax.reload();
                    } else {
                        sweetalert('error', 'Gagal', response.data);
                    }
                },
                error: function() {
                    sweetalert('error', 'Gagal', 'Terjadi kesalahan saat menghapus data');
                }
            });
        }
    })
});
</script>
<?= $this->endSection('script'); ?>