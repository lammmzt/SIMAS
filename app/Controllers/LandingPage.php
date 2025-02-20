<?php 

namespace App\Controllers;
use App\Models\data_siswaModel;
use App\Models\data_dapodikModel;

class LandingPage extends BaseController
{
    public function index(): string // menampilkan halaman dashboard
    {
        $data['title'] = 'SIMAS | HOME'; // set judul halaman
        $data['active'] = 'Home'; // set active menu
        return view('Landing/index', $data); // tampilkan view dashboard
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

}

?>