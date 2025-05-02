<?php 

namespace App\Controllers;
use App\Models\data_siswaModel;
use App\Models\data_dapodikModel;
use App\Models\nilai_raporModel;
use App\Models\semesterModel;
class LandingPage extends BaseController
{
    public function index(): string // menampilkan halaman dashboard
    {
        $data['title'] = 'SIMAS | Verval Siswa'; // set judul halaman
        $data['active'] = 'Home'; // set active menu
        return view('Landing/vervalData', $data); // tampilkan view dashboard
    }

    public function fetchDataSiswa(){
        $nis = $this->request->getPost('nis');
        $tgl_lahir = $this->request->getPost('tgl_lahir');
        $data_siswaModel = new data_siswaModel();
        $check = $data_siswaModel->where('nis_data_siswa', $nis)->where('tanggal_lahir_data_siswa', $tgl_lahir)->first();
        if($check){
            $data = $data_siswaModel->get_data_siswa($check['id_data_siswa']);
            $data['error'] = false;
            $data['status'] = '200';
            $data['data'] = $data;
        } else {
            $data['error'] = true;
            $data['status'] = '400';
            $data['data'] = 'Data tidak ditemukan';
        }
      
        return $this->response->setJSON($data);
    }
    
    public function ubahDataSiswa(){
        $data_siswaModel = new data_siswaModel();
        $id_data_siswa = $this->request->getPost('id_data_siswa');
        $data_siswa = $data_siswaModel->get_data_siswa($id_data_siswa);

        // check data_siswa
        if (!$data_siswa) {
            return $this->response->setJSON([
                'error' => true,
                'data' => 'Data siswa tidak ditemukan',
                'status' => '404'
            ]);
        }
        // check data_invalid
        $data_invalid =  $this->request->getPost('data_invalid');
        if ($data_invalid > 0) {
           $status_pengecekan = '2';
        }else{
           $status_pengecekan = '1';
        }

        $data = [
            'nisn_data_siswa' => $this->request->getPost('nisn_data_siswa'),
            'nama_lengkap_data_siswa' => $this->request->getPost('nama_lengkap_data_siswa'),
            'nis_data_siswa' => $this->request->getPost('nis_data_siswa'),
            'jenis_kelamin_data_siswa' => $this->request->getPost('jenis_kelamin_data_siswa'),
            'tempat_lahir_data_siswa' => $this->request->getPost('tempat_lahir_data_siswa'),
            'tanggal_lahir_data_siswa' => $this->request->getPost('tanggal_lahir_data_siswa'),
            'agama_data_siswa' => $this->request->getPost('agama_data_siswa'),
            'shdk_data_siswa' => $this->request->getPost('shdk_data_siswa'),
            'anak_ke_data_siswa' => $this->request->getPost('anak_ke_data_siswa'),
            'alamat_data_siswa' => $this->request->getPost('alamat_data_siswa'),
            'no_tlp_data_siswa' => $this->request->getPost('no_tlp_data_siswa'),
            'sekolah_asal_data_siswa' => $this->request->getPost('sekolah_asal_data_siswa'),
            'di_kelas_10_data_siswa' => $this->request->getPost('di_kelas_10_data_siswa'),
            'tanggal_diterima_data_siswa' => $this->request->getPost('tanggal_diterima_data_siswa'),
            'nama_ayah_data_siswa' => $this->request->getPost('nama_ayah_data_siswa'),
            'pekerjaan_ayah_data_siswa' => $this->request->getPost('pekerjaan_ayah_data_siswa'),
            'nama_ibu_data_siswa' => $this->request->getPost('nama_ibu_data_siswa'),
            'pekerjaan_ibu_data_siswa' => $this->request->getPost('pekerjaan_ibu_data_siswa'),
            'alamat_orang_tua_data_siswa' => $this->request->getPost('alamat_orang_tua_data_siswa'),
            'nama_wali_data_siswa' => $this->request->getPost('nama_wali_data_siswa'),
            'pekerjaan_wali_data_siswa' => $this->request->getPost('pekerjaan_wali_data_siswa'),
            'alamat_wali_data_siswa' => $this->request->getPost('alamat_wali_data_siswa'),
            'sekolah_asal_data_siswa' => $this->request->getPost('sekolah_asal_data_siswa'),
            'status_pengecekan' => $status_pengecekan,
            'ket_pengecekan' => $this->request->getPost('ket_pengecekan'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $data_siswaModel->update($id_data_siswa, $data);
        
        $data_siswa = $data_siswaModel->get_data_siswa($id_data_siswa);
        
        return $this->response->setJSON([
            'error' => false,
            'data' => $data_siswa,
            'status' => '200'
        ]);
    }

    public function Rapor(){
        $data['title'] = 'SIMAS | Rapor Siswa'; // set judul halaman
        $data['active'] = 'Rapor'; // set active menu
        return view('Landing/Rapor', $data); // tampilkan view dashboard
    }

    public function fetchRapor(){
        
        $nis = $this->request->getPost('nis');
        $tgl_lahir = $this->request->getPost('tgl_lahir');
        $data_siswaModel = new data_siswaModel();
        $check = $data_siswaModel->where('nis_data_siswa', $nis)->where('tanggal_lahir_data_siswa', $tgl_lahir)->first();
        if($check){
            $id = $check['id_data_dapodik'];    
            $data_dapodikModel = new data_dapodikModel();
            $nilai_raporModel = new nilai_raporModel();
            $semesterModel = new semesterModel();
            // $semester_aktif = $semesterModel->where('status_semester', '1')->first();
            
            $data_siswa = $data_dapodikModel->get_data_dapodik($id);
            $nilai_rapor = $nilai_raporModel->getNilaiBySiswa($id);
            $nilai_rapor_grouped = [];
            
            for ($i=0; $i < count($nilai_rapor); $i++) {
                $nilai_rapor_grouped[$nilai_rapor[$i]['id_semester']][] = $nilai_rapor[$i];
            }
            
            // dd($nilai_rapor_grouped);
            // dd($data_siswa);
            $data['data_siswa'] = $data_siswa;
            $data['nilai_rapor'] = $nilai_rapor_grouped;    
            $data['error'] = false;
            $data['status'] = '200';
            $data['data'] = $data;
        } else {
            $data['error'] = true;
            $data['status'] = '400';
            $data['data'] = 'Data tidak ditemukan';
        }
        return $this->response->setJSON($data);
    }

    public function Pengumuman(): string // menampilkan halaman dashboard
    {   
        date_default_timezone_set('Asia/Jakarta');
        $date_now = date('Y-m-d H:i:s');
        $set_date = date('Y-m-d H:i:s', strtotime('2025-05-01 09:00:00'));
        $message = 'Pengumuman Kelulusan Peserta Didik Kelas XII Tahun Ajaran 2024/2025 Akan dibuka Pada Tanggal 5 Mei 2025 Pukul 16:00 WIB';
        $data['message'] = $message;
        $data['date_now'] = $date_now;
        $data['set_date'] = $set_date;
        $data['title'] = 'SIMAS | Pengumuman'; // set judul halaman
        $data['active'] = 'Home'; // set active menu
        // dd($data);
        return view('Landing/Pengumuman', $data); // tampilkan view dashboard
    }

    public function fetchSiswaByNISN(){
        $nisn = $this->request->getPost('nisn');
        $tgl_lahir = $this->request->getPost('tgl_lahir');
        $data_siswaModel = new data_siswaModel();
        date_default_timezone_set('Asia/Jakarta');
        $date_now = date('Y-m-d H:i:s');
        $set_date = date('Y-m-d H:i:s', strtotime('2025-05-02 08:00:00'));
        if ($date_now < $set_date) {
            return $this->response->setJSON([
                'error' => true,
                'data' => 'Pengumuman belum dibuka',
                'status' => '400'
            ]);
        }
        $check = $data_siswaModel->where('nisn_data_siswa', $nisn)->where('tanggal_lahir_data_siswa', $tgl_lahir)->first();
        if($check){
            $data_siswa = $data_siswaModel->get_data_siswa($check['id_data_siswa']);
            $nama_siswa = $data_siswa['nama_lengkap_data_siswa'];
            $nama_siswa = str_replace("'", "", $nama_siswa);
            $fileFoto = $nama_siswa . '.jpg';
            $pathFoto = FCPATH . 'Assets/img/foto_siswa/' . $fileFoto;
                    
            if (!file_exists($pathFoto)) {
                $fileFoto = 'foto_siswa.png';
            }
            $data['foto_siswa_data_siswa'] = $fileFoto;
            $data['error'] = false;
            $data['status'] = '200';
            $data['data'] = $data_siswa;
        } else {
            $data['error'] = true;
            $data['status'] = '400';
            $data['data'] = 'Data siswa tidak ditemukan';
        }
      
        return $this->response->setJSON($data);
    }
}

?>