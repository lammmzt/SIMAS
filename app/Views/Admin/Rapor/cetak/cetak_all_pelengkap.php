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
    padding: 3px;
    font-size: 15px;
}

p {
    font-size: 15px;
}

.ttd_kepsek {
    width: 230px;
    height: auto;
    margin-top: -50px;
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

$jumlah = count($data_siswa);
$no = 1;
foreach ($data_siswa as $data_siswa) :
    $no++;
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
        <td><?=$data_siswa['nis_data_siswa'] ?> / <?=$data_siswa['nisn_data_siswa'] ?></td>
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
        <td style="width: 15px"></td>
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
<table style="margin-top: 30px; <?php if ($no <= $jumlah) echo 'page-break-after: always;'; ?>">
    <tr>
        <td style="width: 25%"></td>
        <td style="width: 20%; margin-right: 20px;"><img src="<?= $imageSrc ?>" alt="Foto Peserta Didik"
                style="width: 100px; height: 120px;"></td>
        <td style="width: 40%; text-align: left;" class="ttd">
            <p style="font-size: 15px;">Pekalongan,
                <?=formatDateIndo($data_siswa['tanggal_diterima_data_siswa']) ?></p>
            <p style="font-size: 15px;">Kepala Sekolah</p><br><br><br><br><br>
            <img src="<?= $ttd_kepsek ?>" alt="Tanda Tangan" class="ttd_kepsek">
            <p style="text-decoration: underline; font-weight: bold; font-size: 13px;">Yulianto Nurul Furqon, M.Pd.
            </p>
            <p style="font-weight: bold; font-size: 13px;">NIP. 19720708 200212 1 005</p>
        </td>
        </td>
    </tr>
</table>
<?php endforeach; ?>

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