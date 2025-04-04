<?php
// Tambahkan ini di awal controller
ini_set('pcre.backtrack_limit', '5000000');
ini_set('pcre.recursion_limit', '5000000');

// Fungsi format tanggal
if (!function_exists('formatDateIndo')) {
    function formatDateIndo($date) {
        $bulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                  'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $tanggal = explode('-', $date);
        return $tanggal[2] . ' ' . $bulan[(int)$tanggal[1]] . ' ' . $tanggal[0];
    }
}
?>

<style>
body {
    font-family: 'Times New Roman', Times, serif;
    font-size: 15px;
    margin: 0;
    padding: 0;
}

table {
    width: 100%;
    border-collapse: collapse;
}

td,
th {
    padding: 3px;
    font-size: 15px;
}

.container {
    margin: 0 45px;
    text-align: justify;
}

.center {
    text-align: center;
}

.bold {
    font-weight: bold;
}

.underline {
    text-decoration: underline;
}
</style>

<?php
foreach ($data_nilai as $data):
    // PROSES PENGOLAHAN NILAI DISINI (seperti sebelumnya)
?>

<img src="<?= $imageSrc ?>" alt="Logo" style="width: 100%;">
<table>
    <tr>
        <td style="width:25%"></td>
        <td class="center" style="width:50%">
            <h4 class="underline bold">SURAT KETERANGAN LULUS</h4>
            <h4 class="bold">SMA NEGERI 1 PEKALONGAN</h4>
            <h4 class="bold">SEKOLAH PENGGERAK</h4>
            <h4 class="bold">TAHUN AJARAN 2024/2025</h4>
            <p>Nomor : 420 / 128.a</p>
        </td>
        <td style="width:25%"></td>
    </tr>
</table>

<div class="container">
    <p>Yang bertanda tangan di bawah ini, Kepala SMA Negeri 1 Pekalongan menyatakan bahwa:</p>
    <table style="margin-top:5px;">
        <tr>
            <td style="width: 40%">Nama</td>
            <td style="width: 2%">:</td>
            <td><?= ucwords(strtolower($data[0]['nama_lengkap_data_dapodik'])) ?></td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>:</td>
            <td><?= ucwords(strtolower($data[0]['tempat_lahir_data_dapodik'])) . ', ' . formatDateIndo($data[0]['tanggal_lahir_data_dapodik']) ?>
            </td>
        </tr>
        <tr>
            <td>Nama Orang Tua/Wali</td>
            <td>:</td>
            <td><?= ucwords(strtolower($data[0]['nama_ayah_data_dapodik'])) ?></td>
        </tr>
        <tr>
            <td>NIS</td>
            <td>:</td>
            <td><?= $data[0]['nis_data_dapodik'] ?></td>
        </tr>
        <tr>
            <td>NISN</td>
            <td>:</td>
            <td><?= $data[0]['id_data_dapodik'] ?></td>
        </tr>
    </table>

    <p style="margin-top:10px;">Dinyatakan <b>LULUS</b> dari SMA Negeri 1 Pekalongan Tahun Ajaran 2024/2025, dengan
        nilai sebagai berikut:</p>

    <table border="1" style="margin-top: 10px;">
        <tr class="center bold">
            <th style="width:5%;">No</th>
            <th style="width:75%;">Mata Pelajaran</th>
            <th style="width:20%;">Nilai</th>
        </tr>
        <?php
        $no = 1;
        ?>
        <tr>
            <td colspan="2" class="bold">Rata-rata</td>
            <td class="center bold">85</td> <!-- Bisa diganti sesuai rata-rata -->
        </tr>
    </table>

    <p style="margin-top: 15px;">Surat ini berlaku sementara sampai diterbitkannya ijazah resmi.</p>

    <table style="margin-top: 20px;">
        <tr>
            <td style="width: 60%"></td>
            <td class="center" style="width: 40%;">
                <p>Pekalongan, <?= date('d') . ' ' . formatDateIndo(date('Y-m-d')) ?></p>
                <p>Kepala Sekolah</p>
                <br><br><br>
                <p class="bold underline">Drs. ABDUR ROZAK</p>
                <p class="bold">NIP. 19650802 199203 1 008</p>
            </td>
        </tr>
    </table>
</div>

<?php endforeach; ?>
<div style="page-break-after: always;"></div>