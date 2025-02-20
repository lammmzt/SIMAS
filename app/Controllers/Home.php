<?php

namespace App\Controllers;
use App\Models\data_siswaModel;

class Home extends BaseController
{  
    public function index(): string // menampilkan halaman dashboard
    { 
        $data_siswaModel = new data_siswaModel(); // inisialisasi model data_siswaModel
        $jumlah_siswa = $data_siswaModel->countAll(); // menghitung jumlah data siswa
        $jumlah_belum_verifikasi = $data_siswaModel->where('status_pengecekan', '0')->countAllResults(); // menghitung jumlah data siswa yang belum diverifikasi
        $data_valid = $data_siswaModel->where('status_pengecekan', '1')->countAllResults(); // menghitung jumlah data siswa yang sudah diverifikasi
        $belum_valid = $data_siswaModel->where('status_pengecekan', '2')->countAllResults(); // menghitung jumlah data siswa yang ditolak
        $data['jumlah_siswa'] = $jumlah_siswa; // set jumlah data siswa
        $data['jumlah_belum_verifikasi'] = $jumlah_belum_verifikasi; // set jumlah data siswa yang belum diverifikasi
        $data['data_valid'] = $data_valid; // set jumlah data siswa yang sudah diverifikasi
        $data['belum_valid'] = $belum_valid; // set jumlah data siswa yang ditolak

        $data['title'] = 'SIMAS | Dashboard'; // set judul halaman
        $data['active'] = 'dashboard'; // set active menu
        return view('Admin/Dashboard/index', $data); // tampilkan view dashboard
    }
}