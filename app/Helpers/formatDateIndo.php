<?php 
if (!function_exists('formatDateIndo')) {
    function formatDateIndo($date) {
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $tanggal = explode('-', $date);
        return $tanggal[2] . ' ' . $bulan[(int)$tanggal[1]] . ' ' . $tanggal[0];
    }
}   

?>