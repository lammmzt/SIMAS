<style>
body {
    font-family: 'Calibri';
    margin: 0;
    padding: 0;
}

table {
    width: 100%;
}

td {
    padding: 3px;
    font-size: 12px;
}

p {
    font-size: 12px;
    margin: 0;
    padding: 0;
}


.container {
    text-align: justify;
    margin: 0 20px;
    padding: 0;
}

.list_mapel {
    text-align: center;
    writing-mode: vertical-rl;
    transform: rotate(180deg);
    margin: 5px 5px;
    width: auto;
    max-width: 20px;
    max-height: 180px;
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

    // $groupNilaiRaporByMapel = array();
    // // dd($data);
    // foreach ($data_nilai as $key => $value) {
    //     if ($value['tipe_nilai'] == '1') {
    //         $groupNilaiRaporByMapel[$value['id_mapel']][] = $value;
    //     } 
    // }

    // $groupNilaiKelasX = array();
    // $groupNilaiKelasXI = array();
    // $groupNilaiKelasXII = array();
    // $averageNilaiByMapel = array();
    // // dd($groupNilaiRaporByMapel);

?>


<div class="container" style="margin-top: 2px;">
    <table style="margin-top: 3px;">
        <tr>
            <td style="text-align: center;">
                <h3 style="font-weight: bold">
                    DAFTAR NILAI KELAS <br>
                    SMA NEGERI 1 PEKALONGAN <br>
                    TAHUN AJARAN 2024/2025 <br>
                </h3>
                <!-- <h4 style="font-weight: bold">TAHUN AJARAN 2024/2025</h4> -->
                <!-- <p>Nomor : 420 / 128.a</p> -->
            </td>
        </tr>
    </table>
    <h6 style="text-align: left; font-weight: bold; margin: 5px 0 !important; padding: 0 !important;">XII Kartini 1
    </h6>
    <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
        <thead>
            <tr>
                <th style="text-align: center; width: 3%; min-width: 3%; max-width: 3%;" rowspan="2">No.</th>
                <th style="text-align: center; width: 5%; min-width: 5%; max-width: 5%;" rowspan="2">NIS</th>
                <th style="text-align: center; width: 16%; min-width: 16%; max-width: 16%;" rowspan="2">Nama</th>
                <th style="text-align: center; width: 7%; min-width: 7%; max-width: 7%; margin: 0 2px;" rowspan="2">
                    Komponen</th>
                <th style="text-align: center; width: 60%; min-width: 60%; max-width: 60%;" colspan="17">Nilai</th>
                <th style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                    rowspan="2">Sikap</th>
                <th style=" text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                    rowspan="2">Kehadiran</th>
                <th style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                    rowspan="2">Lulus/Tidak
                    Lulus</th>
            </tr>
            <tr>
                <th class="list_mapel">Pendidikan Agama dan Budi Pekerti</th>
                <th class=" list_mapel">Pendidikan Pancasila dan Kewarganegaraan</th>
                <th class="list_mapel">Bahasa Indonesia</th>
                <th class=" list_mapel">Matematika</th>
                <th class="list_mapel">Sejarah Indonesia</th>
                <th class=" list_mapel">Bahasa Inggris</th>
                <th class="list_mapel">Seni Budaya</th>
                <th class=" list_mapel">Pendidikan Jasmani, Olahraga, dan Kesehatan</th>
                <th class="list_mapel">Prakarya</th>
                <th class=" list_mapel">Muatan Lokal</th>
                <th class="list_mapel">Pendidikan Agama</th>
                <th class=" list_mapel">Bahasa Arab</th>
                <th class="list_mapel">Bahasa Jerman</th>
                <th class=" list_mapel">Bahasa Perancis</th>
                <th class="list_mapel">Bahasa Jepang</th>
                <th class=" list_mapel">Bahasa Mandarin</th>
                <th class="list_mapel">Bahasa Korea</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style=" text-align: center;" rowspan="10">1</td>
                <td style="text-align: center;" rowspan="10">19678</td>
                <td style="text-align: left;" rowspan="10">Nama Siswa</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                    rowspan="9">Sikap</td>
                <td style=" text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                    rowspan="9">Kehadiran</td>
                <td style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                    rowspan="9">Lulus/Tidak
                    Lulus</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style=" text-align: center;" rowspan="10">1</td>
                <td style="text-align: center;" rowspan="10">19678</td>
                <td style="text-align: left;" rowspan="10">Nama Siswa</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                    rowspan="9">Sikap</td>
                <td style=" text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                    rowspan="9">Kehadiran</td>
                <td style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                    rowspan="9">Lulus/Tidak
                    Lulus</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style=" text-align: center;" rowspan="10">1</td>
                <td style="text-align: center;" rowspan="10">19678</td>
                <td style="text-align: left;" rowspan="10">Nama Siswa</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                    rowspan="9">Sikap</td>
                <td style=" text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                    rowspan="9">Kehadiran</td>
                <td style="text-align: center; width: 3%; min-width: 3%; max-width: 3%; writing-mode: vertical-rl; transform: rotate(180deg);"
                    rowspan="9">Lulus/Tidak
                    Lulus</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>
            <tr>
                <td style="text-align: center;">SMT 1</td>
                <td style="text-align: center;">89.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
                <td style="text-align: center;">90.00</td>
            </tr>

        </tbody>
    </table>
</div>
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