<?php

namespace App\Controllers;
use App\Models\data_siswaModel;
use App\Models\data_dapodikModel;
use Hermawan\DataTables\DataTable;
use Ramsey\Uuid\Uuid;

class Data_siswa extends BaseController
{  
    public function index(): string // menampilkan halaman dashboard
    { 
        $data['title'] = 'SIMAS | Data Siswa'; // set judul halaman
        $data['active'] = 'Data_siswa'; // set active menu
        return view('Admin/data_siswa/index', $data); // tampilkan view dashboard
    }

    public function ajaxDataTables()
    {
        $status_pengecekan = $this->request->getPost('status_pengecekan');
        $data_siswaModel = new data_siswaModel();
        if ($status_pengecekan == '1') {
            $builder = $data_siswaModel->get_data_siswa()->where('status_pengecekan', '1');
        } else if ($status_pengecekan == '2') {
            $builder = $data_siswaModel->get_data_siswa()->where('status_pengecekan', '2');
        } else if ($status_pengecekan == '0') {
            $builder = $data_siswaModel->get_data_siswa()->where('status_pengecekan', '0');
        }else{
            $builder = $data_siswaModel->get_data_siswa();
        }   
        // dd($builder);
        return DataTable::of($builder)
            
            ->add('action', function ($row) {
                return '
                    <div class="flex align-items-center list-user-action">
                        <a class="btn btn-sm btn-icon btn-info" href="' . base_url('Data_siswa/detail/' . $row->id_data_siswa) . '" target="_blank">
                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.334 2.75H7.665C4.644 2.75 2.75 4.889 2.75 7.916V16.084C2.75 19.111 4.635 21.25 7.665 21.25H16.333C19.364 21.25 21.25 19.111 21.25 16.084V7.916C21.25 4.889 19.364 2.75 16.334 2.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M11.9946 16V12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path d="M11.9896 8.2041H11.9996" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        </a>
                    </div>
                ';
            }, 'last')
            ->toJson(true);
    }

    public function import(){
        $file_excel = $this->request->getFile('file'); // get file excel
        $validation = \Config\Services::validation(); // get validation
        $data_siswaModel = new data_siswaModel(); // get model data_siswa
        $data_dapodikModel = new data_dapodikModel(); // get model data_dapodik
        // to get all data
        $data_siswa = $data_siswaModel->get_data_siswa()->findAll();
        $data_siswa = array_column($data_siswa, 'id_data_siswa', 'nis_data_siswa');
        $data_dapodik = $data_dapodikModel->get_data_dapodik();
        $data_dapodik = array_column($data_dapodik, 'id_data_dapodik', 'nis_data_dapodik');
        // dd($data_siswa, $data_dapodik);
        // Define validation rules
        $validation->setRules([ // set rules
            'file' => [
                'rules' => 'uploaded[file]|ext_in[file,xls,xlsx,csv]',
                'result' => [
                    'uploaded' => 'File tidak boleh kosong',
                    'required' => 'File tidak boleh kosong',
                    'ext_in' => 'File harus berupa xls, xlsx, csv'
                ]
            ]
        ]);

        // Validate the request data
        if (!$validation->run($this->request->getPost())) { // run validation
            return $this->response->setJSON([
                'error' => true,
                'data' => $validation->getresult(),
                'status' => '422'
            ]);
        }

        // Initialize the PhpSpreadsheet reader based on the file extension
        $ext = $file_excel->getClientExtension(); // get file extension
        if ($ext == 'xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } elseif ($ext == 'xlsx') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        } elseif ($ext == 'csv') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        }

        $spreadsheet = $reader->load($file_excel); // load file excel
        $data = $spreadsheet->getActiveSheet()->toArray(); // get data excel

        // add total data to process
        $total_data = count($data) - 2;
        $no = 0;
        $success = 0;
        $failed = 0;
        $result = [];
        // dd($total_data);
        foreach ($data as $x => $col) {

            if ($x < 2) {
                continue;
            }
            
            $no++;

            $nisn  = $col[3];
            $nama_lengkap = $col[2];
            $nis = $col[4];
            $kelas = $col[5];
            $jenis_kelamin = $col[6];
            $tempat_lahir = $col[7];
            $tanggal_lahir = $col[8];
            $agama = $col[9];
            $shdk = $col[10];
            $anak_ke = $col[11];
            $alamat = $col[12];
            $no_tlp = $col[13];
            $sekolah_asal = $col[14];
            $di_kelas_10 = $col[15];
            $tanggal_diterima = $col[16];
            $nama_ayah = $col[17];
            $pekerjaan_ayah = $col[18];
            $nama_ibu = $col[19];
            $pekerjaan_ibu = $col[20];
            $alamat_orang_tua = $col[21];
            $nama_wali = $col[22];
            $pekerjaan_wali = $col[23];
            $alamat_wali = $col[24];
            
            // dd($nisn, $nama_lengkap, $nis, $kelas, $jenis_kelamin, $agama, $shdk, $anak_ke, $alamat, $no_tlp, $sekolah_asal, $di_kelas_10, $tanggal_diterima, $nama_ayah, $pekerjaan_ayah, $nama_ibu, $pekerjaan_ibu, $alamat_orang_tua, $nama_wali, $pekerjaan_wali, $alamat_wali, $tempat_lahir, $tanggal_lahir);


            if (empty($nisn) || empty($nama_lengkap) || empty($nis) || empty($kelas)) {
                $failed++;
                $result[] = [
                    'no' => $no,
                    'data' => 'Baris ke-' . $no . ' ' . $nama_lengkap,
                    'status' => 'Failed',
                    'message' => 'Data tidak lengkap'
                ];
                continue;
            }
            // check if data already exists
            if (array_key_exists($nis, $data_dapodik)) {
                // dd($data_dapodik[$nis]);
                // update data dapodik
                $data_dapodikModel->update($data_dapodik[$nis], [
                    'nama_lengkap_data_dapodik' => $nama_lengkap,
                    'nis_data_dapodik' => $nis,
                    'kelas_data_dapodik' => $kelas, 
                    'jenis_kelamin_data_dapodik' => $jenis_kelamin,
                    'tempat_lahir_data_dapodik' => $tempat_lahir,
                    'tanggal_lahir_data_dapodik' =>$tanggal_lahir,
                    'agama_data_dapodik' => $agama,
                    'shdk_data_dapodik' => $shdk,
                    'anak_ke_data_dapodik' => $anak_ke,
                    'alamat_data_dapodik' => $alamat,
                    'no_tlp_data_dapodik' => $no_tlp,
                    'sekolah_asal_data_dapodik' => $sekolah_asal,
                    'di_kelas_10_data_dapodik' => $di_kelas_10,
                    'tanggal_diterima_data_dapodik' => $tanggal_diterima,
                    'nama_ayah_data_dapodik' => $nama_ayah,
                    'pekerjaan_ayah_data_dapodik' => $pekerjaan_ayah,
                    'nama_ibu_data_dapodik' => $nama_ibu,
                    'pekerjaan_ibu_data_dapodik' => $pekerjaan_ibu,
                    'alamat_orang_tua_data_dapodik' => $alamat_orang_tua,
                    'nama_wali_data_dapodik' => $nama_wali,
                    'pekerjaan_wali_data_dapodik' => $pekerjaan_wali,
                    'alamat_wali_data_dapodik' => $alamat_wali,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                // check if data siswa not exists
                if (!array_key_exists($nis, $data_siswa)) {
                    // insert data siswa
                    $id_data_siswa = Uuid::uuid4()->toString();
                    $data_siswaModel->insert([
                        'id_data_siswa' => $id_data_siswa,
                        'id_data_dapodik' => $data_dapodik[$nis],
                        'nisn_data_siswa' => $nisn,
                        'nama_lengkap_data_siswa' => $nama_lengkap,
                        'nis_data_siswa' => $nis,
                        'kelas_data_siswa' => $kelas,
                        'jenis_kelamin_data_siswa' => $jenis_kelamin,
                        'tempat_lahir_data_siswa' => $tempat_lahir,
                        'tanggal_lahir_data_siswa' => $tanggal_lahir,
                        'agama_data_siswa' => $agama,
                        'shdk_data_siswa' => $shdk,
                        'anak_ke_data_siswa' => $anak_ke,
                        'alamat_data_siswa' => $alamat,
                        'no_tlp_data_siswa' => $no_tlp,
                        'sekolah_asal_data_siswa' => $sekolah_asal,
                        'di_kelas_10_data_siswa' => $di_kelas_10,
                        'tanggal_diterima_data_siswa' => $tanggal_diterima,
                        'nama_ayah_data_siswa' => $nama_ayah,
                        'pekerjaan_ayah_data_siswa' => $pekerjaan_ayah,
                        'nama_ibu_data_siswa' => $nama_ibu,
                        'pekerjaan_ibu_data_siswa' => $pekerjaan_ibu,
                        'alamat_orang_tua_data_siswa' => $alamat_orang_tua,
                        'nama_wali_data_siswa' => $nama_wali,
                        'pekerjaan_wali_data_siswa' => $pekerjaan_wali,
                        'alamat_wali_data_siswa' => $alamat_wali,
                        'created_at' => date('Y-m-d H:i:s')
                    ]);

                    // add to array data siswa
                    $data_siswa[$nis] = $id_data_siswa;
                }
                
                $result[] = [
                    'no' => $no,
                    'data' => 'Baris ke-' . $no . ' ' . $nama_lengkap,
                    'status' => 'Success',
                    'message' => 'Data berhasil diupdate'
                ];
                $success++;
                continue;
            }

            // insert data dapodik
            $id_data_dapodik = $nisn;
            $data_dapodikModel->insert([
                'id_data_dapodik' => $id_data_dapodik,
                'nis_data_dapodik' => $nis,
                'nama_lengkap_data_dapodik' => $nama_lengkap,
                'kelas_data_dapodik' => $kelas,
                'jenis_kelamin_data_dapodik' => $jenis_kelamin,
                'tempat_lahir_data_dapodik' => $tempat_lahir,
                'tanggal_lahir_data_dapodik' =>$tanggal_lahir,
                'agama_data_dapodik' => $agama,
                'shdk_data_dapodik' => $shdk,
                'anak_ke_data_dapodik' => $anak_ke,
                'alamat_data_dapodik' => $alamat,
                'no_tlp_data_dapodik' => $no_tlp,
                'sekolah_asal_data_dapodik' => $sekolah_asal,
                'di_kelas_10_data_dapodik' => $di_kelas_10,
                'tanggal_diterima_data_dapodik' => $tanggal_diterima,
                'nama_ayah_data_dapodik' => $nama_ayah,
                'pekerjaan_ayah_data_dapodik' => $pekerjaan_ayah,
                'nama_ibu_data_dapodik' => $nama_ibu,
                'pekerjaan_ibu_data_dapodik' => $pekerjaan_ibu,
                'alamat_orang_tua_data_dapodik' => $alamat_orang_tua,
                'nama_wali_data_dapodik' => $nama_wali,
                'pekerjaan_wali_data_dapodik' => $pekerjaan_wali,
                'alamat_wali_data_dapodik' => $alamat_wali,
                'created_at' => date('Y-m-d H:i:s')
            ]);
            // update to array data dapodik
            $data_dapodik[$nis] = $id_data_dapodik;
            // insert data siswa
            $id_data_siswa = Uuid::uuid4()->toString();
            $data_siswaModel->insert([
                'id_data_siswa' => $id_data_siswa,
                'id_data_dapodik' => $id_data_dapodik,
                'nisn_data_siswa' => $nisn,
                'nama_lengkap_data_siswa' => $nama_lengkap,
                'nis_data_siswa' => $nis,
                'kelas_data_siswa' => $kelas,
                'jenis_kelamin_data_siswa' => $jenis_kelamin,
                'tempat_lahir_data_siswa' => $tempat_lahir,
                'tanggal_lahir_data_siswa' => $tanggal_lahir,
                'agama_data_siswa' => $agama,
                'shdk_data_siswa' => $shdk,
                'anak_ke_data_siswa' => $anak_ke,
                'alamat_data_siswa' => $alamat,
                'no_tlp_data_siswa' => $no_tlp,
                'sekolah_asal_data_siswa' => $sekolah_asal,
                'di_kelas_10_data_siswa' => $di_kelas_10,
                'tanggal_diterima_data_siswa' => $tanggal_diterima,
                'nama_ayah_data_siswa' => $nama_ayah,
                'pekerjaan_ayah_data_siswa' => $pekerjaan_ayah,
                'nama_ibu_data_siswa' => $nama_ibu,
                'pekerjaan_ibu_data_siswa' => $pekerjaan_ibu,
                'alamat_orang_tua_data_siswa' => $alamat_orang_tua,
                'nama_wali_data_siswa' => $nama_wali,
                'pekerjaan_wali_data_siswa' => $pekerjaan_wali,
                'alamat_wali_data_siswa' => $alamat_wali,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            // add to array data siswa
            $data_siswa[$nis] = $id_data_siswa;
            
            // add to result
            $result[] = [
                'no' => $no,
                'data' => 'Baris ke-' . $no . ' ' . $nama_lengkap,
                'status' => 'Success',
                'message' => 'Data berhasil ditambahkan'
            ];

            $success++;
            
        }

        return $this->response->setJSON([
            'error' => false,
            'data' => [
                'total_data' => $total_data,
                'success' => $success,
                'failed' => $failed,
                'result' => $result
            ],
            'status' => '200'
        ]);
    }

    public function detail($id){
        $data_siswaModel = new data_siswaModel();
        $data_siswa = $data_siswaModel->get_data_siswa($id);
        // dd($data_siswa);
        $data['title'] = 'SIMAS | Detail Data Siswa'; // set judul halaman
        $data['active'] = 'Data_siswa'; // set active menu
        $data['data_siswa'] = $data_siswa;
        return view('Admin/data_siswa/detail', $data); // tampilkan view dashboard
    }

    public function ubahDataSiswa(){
        $data_siswaModel = new data_siswaModel();
        $data_dapodikModel = new data_dapodikModel();
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
    
        $id_data_dapodik = $data_siswa['id_data_dapodik'];
        $data_dapodik = [
            'id_data_dapodik' => $this->request->getPost('id_data_dapodik'),
            'nama_lengkap_data_dapodik' => $this->request->getPost('nama_lengkap_data_dapodik'),
            'nis_data_dapodik' => $this->request->getPost('nis_data_dapodik'),
            'jenis_kelamin_data_dapodik' => $this->request->getPost('jenis_kelamin_data_dapodik'),
            'tempat_lahir_data_dapodik' => $this->request->getPost('tempat_lahir_data_dapodik'),
            'tanggal_lahir_data_dapodik' => $this->request->getPost('tanggal_lahir_data_dapodik'),
            'agama_data_dapodik' => $this->request->getPost('agama_data_dapodik'),
            'shdk_data_dapodik' => $this->request->getPost('shdk_data_dapodik'),
            'anak_ke_data_dapodik' => $this->request->getPost('anak_ke_data_dapodik'),
            'alamat_data_dapodik' => $this->request->getPost('alamat_data_dapodik'),
            'no_tlp_data_dapodik' => $this->request->getPost('no_tlp_data_dapodik'),
            'sekolah_asal_data_dapodik' => $this->request->getPost('sekolah_asal_data_dapodik'),
            'di_kelas_10_data_dapodik' => $this->request->getPost('di_kelas_10_data_dapodik'),
            'tanggal_diterima_data_dapodik' => $this->request->getPost('tanggal_diterima_data_dapodik'),
            'nama_ayah_data_dapodik' => $this->request->getPost('nama_ayah_data_dapodik'),
            'pekerjaan_ayah_data_dapodik' => $this->request->getPost('pekerjaan_ayah_data_dapodik'),
            'nama_ibu_data_dapodik' => $this->request->getPost('nama_ibu_data_dapodik'),
            'pekerjaan_ibu_data_dapodik' => $this->request->getPost('pekerjaan_ibu_data_dapodik'),
            'alamat_orang_tua_data_dapodik' => $this->request->getPost('alamat_orang_tua_data_dapodik'),
            'nama_wali_data_dapodik' => $this->request->getPost('nama_wali_data_dapodik'),
            'pekerjaan_wali_data_dapodik' => $this->request->getPost('pekerjaan_wali_data_dapodik'),
            'alamat_wali_data_dapodik' => $this->request->getPost('alamat_wali_data_dapodik'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        $data_siswa = [
            'id_data_dapodik' => $this->request->getPost('id_data_dapodik'),
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
            'status_pengecekan' => $this->request->getPost('status_pengecekan'),
            'ket_pengecekan' => $this->request->getPost('ket_pengecekan'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        // dd($data_siswa, $data_dapodik);
        $data_dapodikModel->update($id_data_dapodik, $data_dapodik); // update data dapodik
        $data_siswaModel->update($id_data_siswa, $data_siswa); // update data siswa

        $data_siswa = $data_siswaModel->get_data_siswa($id_data_siswa);
        return $this->response->setJSON([
            'error' => false,
            'data' => 'Data siswa berhasil diubah',
            'status' => '200'
        ]);

    }

    public function deleteAllData(){
        $data_siswaModel = new data_siswaModel();
        $data_dapodikModel = new data_dapodikModel();

        // hapus semua data siswa
        $data_siswaModel->truncate();
        // hapus semua data dapodik
        $data_dapodikModel->truncate();

        return $this->response->setJSON([
            'error' => false,
            'data' => 'Data berhasil dihapus',
            'status' => '200'
        ]);
    }
}