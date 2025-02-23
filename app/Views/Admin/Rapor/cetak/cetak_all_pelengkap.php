<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

table {
    width: 100%;
}

td {
    padding: 5px;
    font-size: 15px;
}

p {
    font-size: 15px;
}
</style>
<?php if ( !function_exists('formatDateIndo')) {
    function formatDateIndo($date) {
        $bulan=[ 1=>'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
        ];
        $tanggal=explode('-', $date);
        return $tanggal[2].' '.$bulan[(int)$tanggal[1]].' '.$tanggal[0];
    }
}

foreach ($data_siswa as $data_siswa) :
    ?>

<h3 style="text-align: center; margin-bottom: 30px; font-weight: bold;">IDENTITAS PESERTA DIDIK </h3>
<table>
    <tr>
        <td style="width: 20px">1.</td>
        <td style="width: 210px">Nama Lengkap Peserta Didik</td>
        <td style="width: 15px">:</td>
        <td><?=ucwords(strtolower($data_siswa['nama_lengkap_data_siswa'])) ?></td>
    </tr>
    <tr>
        <td style="width: 20px">2.</td>
        <td style="width: 210px">Nomor Induk/NISN</td>
        <td style="width: 15px">:</td>
        <td><?=$data_siswa['nis_data_siswa'] ?>/ <?=$data_siswa['nisn_data_siswa'] ?></td>
    </tr>
    <tr>
        <td style="width: 20px">3.</td>
        <td style="width: 210px">Tempat,
            Tanggal Lahir</td>
        <td style="width: 15px">:</td>
        <td><?=$data_siswa['tempat_lahir_data_siswa'] ?>,
            <?=formatDateIndo($data_siswa['tanggal_lahir_data_siswa']) ?></td>
    </tr>
    <tr>
        <td style="width: 20px">4.</td>
        <td style="width: 210px">Jenis Kelamin</td>
        <td style="width: 15px">:</td>
        <td><?=($data_siswa['jenis_kelamin_data_siswa']=='L') ? 'Laki-laki' : 'Perempuan'?></td>
    </tr>
    <tr>
        <td style="width: 20px">5.</td>
        <td style="width: 210px">Agama</td>
        <td style="width: 15px">:</td>
        <td><?=$data_siswa['agama_data_siswa'] ?></td>
    </tr>
    <tr>
        <td style="width: 20px">6.</td>
        <td style="width: 210px">Status dalam Keluarga</td>
        <td style="width: 15px">:</td>
        <td><?=$data_siswa['shdk_data_siswa'] ?></td>
    </tr>
    <tr>
        <td style="width: 20px">7.</td>
        <td style="width: 210px">Anak ke</td>
        <td style="width: 15px">:</td>
        <td><?=$data_siswa['anak_ke_data_siswa'] ?></td>
    </tr>
    <tr>
        <td style="width: 20px">8.</td>
        <td style="width: 210px">Alamat Peserta Didik</td>
        <td style="width: 15px">:</td>
        <td><?=$data_siswa['alamat_data_siswa'] ?>
    </tr>
    <tr>
        <td style="width: 20px">9.</td>
        <td style="width: 210px">Nomor Telepon Rumah</td>
        <td style="width: 15px">:</td>
        <td><?=$data_siswa['no_tlp_data_siswa'] ?>
    </tr>
    <tr>
        <td style="width: 20px">10.</td>
        <td style="width: 210px">Sekolah Asal (SMP/MTs)</td>
        <td style="width: 15px">:</td>
        <td><?=$data_siswa['sekolah_asal_data_siswa'] ?>
    </tr>
    <tr>
        <td style="width: 20px">11.</td>
        <td style="width: 210px">Diterima di sekolah ini</td>
        <td style="width: 15px"></td>
        <td></td>
    </tr>
    <tr>
        <td style="width: 20px"></td>
        <td style="width: 210px">Di kelas</td>
        <td style="width: 15px">:</td>
        <td><?=$data_siswa['di_kelas_10_data_siswa'] ?>
    </tr>
    <tr>
        <td style="width: 20px"></td>
        <td style="width: 210px">Pada tanggal</td>
        <td style="width: 15px">:</td>
        <td><?=formatDateIndo($data_siswa['tanggal_diterima_data_siswa']) ?>
    </tr>
    <tr>
        <td style="width: 20px">12.</td>
        <td style="width: 210px">Nama Orang Tua</td>
        <td style="width: 15px"></td>
        <td></td>
    </tr>
    <tr>
        <td style="width: 20px"></td>
        <td style="width: 210px">a. Ayah</td>
        <td style="width: 15px">:</td>
        <td><?=ucwords(strtolower($data_siswa['nama_ayah_data_siswa'])) ?>
    </tr>
    <tr>
        <td style="width: 20px"></td>
        <td style="width: 210px">b. Ibu</td>
        <td style="width: 15px">:</td>
        <td><?=ucwords(strtolower($data_siswa['nama_ibu_data_siswa'])) ?>
    </tr>
    <tr>
        <td style="width: 20px">13.</td>
        <td style="width: 210px">Alamat Orang Tua</td>
        <td style="width: 15px">:</td>
        <td><?=$data_siswa['alamat_orang_tua_data_siswa'] ?>
    </tr>
    <tr>
        <td style="width: 20px"></td>
        <td style="width: 210px">Nomor Telepon Rumah</td>
        <td style="width: 15px">:</td>
        <td></td>
    </tr>
    <tr>
        <td style="width: 20px">14.</td>
        <td style="width: 210px">Pekerjaan Orang Tua</td>
        <td style="width: 15px">:</td>
        <td></td>
    </tr>
    <tr>
        <td style="width: 20px"></td>
        <td style="width: 210px">a. Ayah</td>
        <td style="width: 15px">:</td>
        <td><?=$data_siswa['pekerjaan_ayah_data_siswa'] ?>
    </tr>
    <tr>
        <td style="width: 20px"></td>
        <td style="width: 210px">b. Ibu</td>
        <td style="width: 15px">:</td>
        <td><?=$data_siswa['pekerjaan_ibu_data_siswa'] ?>
    </tr>
    <tr>
        <td style="width: 20px">15.</td>
        <td style="width: 210px">Nama Wali Siswa</td>
        <td style="width: 15px">:</td>
        <td><?=ucwords(strtolower($data_siswa['nama_wali_data_siswa'])) ?>
    </tr>
    <tr>
        <td style="width: 20px">16.</td>
        <td style="width: 210px">Alamat Wali Peserta Didik</td>
        <td style="width: 15px">:</td>
        <td><?=$data_siswa['alamat_wali_data_siswa'] ?>
    </tr>
    <tr>
        <td style="width: 20px"></td>
        <td style="width: 210px">Nomor Telepon Rumah</td>
        <td style="width: 15px">:</td>
        <td></td>
    </tr>
    <tr>
        <td style="width: 20px">17.</td>
        <td style="width: 210px">Pekerjaan Wali Peserta Didik</td>
        <td style="width: 15px">:</td>
        <td><?=$data_siswa['pekerjaan_wali_data_siswa'] ?>
    </tr>
</table>
<table style="margin-top: 50px;">
    <tr>
        <td style="width: 30%"></td>
        <td style="width: 15%; margin-right: 1opx;"><img src="<?= base_url('Assets/img/foto_siswa.png') ?>"
                alt="Foto Peserta Didik" style="width: 100px; height: 120px;"></td>
        <td style="width: 40%; text-align: left;" id="ttd">
            <p>Pekalongan,
                <?=formatDateIndo($data_siswa['tanggal_diterima_data_siswa']) ?></p>
            <p>Kepala Sekolah</p><br><br><br><br><br>
            <p style="text-decoration: underline; font-weight: bold; font-size: 13px;">Drs. ABDUR ROZAK</p>
            <p style="font-weight: bold; font-size: 13px;">NIP. 196303251989031010</p>
        </td>
        </td>
    </tr>
    < !-- footer -->
        <style type="text/css">
        #ttd p {
            margin: 0;
            padding: 0;
        }
        </style>

        <script type="text/javascript">
        function formatDateIndo(date) {
            var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];
            var date = new Date(date);
            var day = date.getDate();
            var monthIndex = date.getMonth();
            var year = date.getFullYear();

            return day + ' ' + monthNames[monthIndex] + ' ' + year;
        }
        </script>
</table>
<?php endforeach; ?>