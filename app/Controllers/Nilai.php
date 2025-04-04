<?php

namespace App\Controllers;
use App\Models\data_siswaModel;
use App\Models\data_dapodikModel;
use App\Models\semesterModel;
use App\Models\mapelModel;
use App\Models\nilai_raporModel;
use Hermawan\DataTables\DataTable;
use Ramsey\Uuid\Uuid;

class Nilai extends BaseController
{  
    public function index(): string // menampilkan halaman dashboard
    { 
        $semesterModel = new semesterModel();
        $data['semester'] = $semesterModel->findAll();
        $data['title'] = 'SIMAS | Pelengkap Nilai'; // set judul halaman
        $data['active'] = 'Nilai'; // set active menu
        return view('Admin/Rapor/Nilai/index', $data); // tampilkan view dashboard
    }

    public function ajaxDataTables()
    {
        $kelas_data_dapodik = $this->request->getPost('kelas_data_dapodik');
        $data_siswaModel = new data_siswaModel();
        if ($kelas_data_dapodik == '') {
            $builder = $data_siswaModel->get_data_siswa()->where('kelas_data_dapodik', '0');
        }else{
            $builder = $data_siswaModel->get_data_siswa()->where('kelas_data_dapodik', $kelas_data_dapodik);
        }   
        
        // dd($builder);
        return DataTable::of($builder)
            
            ->add('action', function ($row) {
                return '
                <div class="flex align-items-center list-user-action">
                        <a class="btn btn-sm btn-info btn-edit" href="Nilai/detail/'.$row->id_data_dapodik.'" target="_blank">
                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                            <path d="M13.7476 20.4428H21.0002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.78 3.79479C13.5557 2.86779 14.95 2.73186 15.8962 3.49173C15.9485 3.53296 17.6295 4.83879 17.6295 4.83879C18.669 5.46719 18.992 6.80311 18.3494 7.82259C18.3153 7.87718 8.81195 19.7645 8.81195 19.7645C8.49578 20.1589 8.01583 20.3918 7.50291 20.3973L3.86353 20.443L3.04353 16.9723C2.92866 16.4843 3.04353 15.9718 3.3597 15.5773L12.78 3.79479Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M11.021 6.00098L16.4732 10.1881" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        </a>
                    </div>
                ';
            }, 'last')
            ->toJson(true);
    }

    public function import(){
        $file_excel = $this->request->getFile('file'); // get file excel
        $semester_aktif = $this->request->getPost('id_semester'); // get semester aktif
        $tipe_nilai = $this->request->getPost('tipe_nilai'); // get tipe nilai
        if ($file_excel == null) {
            return $this->response->setJSON([
                'error' => true,
                'data' => 'Data tidak lengkap',
                'status' => '422'
            ]);
        }
        
        $validation = \Config\Services::validation(); // get validation
        
        $data_dapodikModel = new data_dapodikModel(); // get model data_dapodik
        $data_semeser = new semesterModel(); // get model semester
        $data_mapel = new mapelModel(); // get model mapel
        $nilai_raporModel = new nilai_raporModel(); // get model nilaik

        // to get all data dapodik
        $data_dapodik = $data_dapodikModel->get_data_dapodik();
        $data_dapodik = array_column($data_dapodik, 'id_data_dapodik', 'nis_data_dapodik');
        
        // get mapel
        $data_mapel = $data_mapel->findAll();
        $data_mapel = array_column($data_mapel, 'id_mapel', 'kode_mapel');
        // get nilai rapor
        if($tipe_nilai == '1'){
            $data_nilai = $nilai_raporModel->getNilaiRapor()->where('nilai_rapor.id_semester', $semester_aktif)->where('nilai_rapor.tipe_nilai', $tipe_nilai)->findAll();
        }else{
            $data_nilai = $nilai_raporModel->where('tipe_nilai', $tipe_nilai)->findAll();
            $semester_aktif = $data_semeser->where('status_semester', '1')->first()['id_semester'];
        }
        $temp_data_nilai = [];
        foreach ($data_nilai as $item) {
            $temp_data_nilai[$item['id_nilai_rapor']] = [
                'nis_data_dapodik' => $item['nis_data_dapodik'],
                'id_mapel' => $item['id_mapel']
            ];
        }
        // dd($temp_data_nilai, $data_mapel, $data_dapodik, $semester_aktif);
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
        $total_data = count($data) - 1;
        $no = 0;
        $success = 0;
        $failed = 0;
        $result = [];
        $total_column = count($data[1]);
        $urutan_mapel = [];

        for ($i=4; $i < $total_column; $i++) { 
            $kode_mapel = $data[0][$i];
            // dd($kode_mapel);
            if($kode_mapel == ''){
                continue;
            }
            if (array_key_exists($kode_mapel, $data_mapel)) {
                $id_mapel = $data_mapel[$kode_mapel];
                $urutan_mapel[$i] = $id_mapel;
                // dd($urutan_mapel);
            }else{
                $failed++;
                $result[] = [
                    'no' => $no,
                    'data' => 'Nama mapel ' . $kode_mapel,
                    'status' => 'Failed',
                    'message' => 'Kode mapel tidak ditemukan'
                ];
            }
        }
        // dd($urutan_mapel);
        foreach ($data as $x => $col) {

            if ($x < 1) {
                continue;
            }
            
            $no++;

            $nis_data_dapodik  = $col[3];
            $nama_lengkap = $col[1];
            // dd($nis_data_dapodik, $nama_lengkap);
            if (empty($nis_data_dapodik)) {
                $failed++;
                $result[] = [
                    'no' => $no,
                    'data' => 'Baris ke-' . $no . ' ' .  $nama_lengkap,
                    'status' => 'Failed',
                    'message' => 'Data tidak lengkap'
                ];
                continue;
            }
            // check if data already exists
            if (array_key_exists($nis_data_dapodik, $data_dapodik)) {
                $id_data_dapodik = $data_dapodik[$nis_data_dapodik];
                // dd($id_data_dapodik);
                foreach ($urutan_mapel as $key => $value) {
                    // jika sudah ada nilai maka update
                    $nilai = $col[$key];
                    // dd($nilai);
                    $check = array_filter($temp_data_nilai, function($item) use ($nis_data_dapodik, $value){
                        return $item['nis_data_dapodik'] == $nis_data_dapodik && $item['id_mapel'] == $value;
                    });
                    // dd($check);
                    if (!empty($check)) {
                        $id_nilai_rapor = key($check);
                        $data = [
                            'nilai_rapor' => $nilai
                        ];
                        $nilai_raporModel->update($id_nilai_rapor, $data);
                    }else{
                        $data = [
                            'id_mapel' => $value,
                            'id_data_dapodik' => $id_data_dapodik,
                            'id_semester' => $semester_aktif,
                            'tipe_nilai' => $tipe_nilai,
                            'nilai_rapor' => $nilai,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        $nilai_raporModel->save($data);
                        // add to temp data nilai
                        $id_nilai_rapor = $nilai_raporModel->getInsertID();
                        $temp_data_nilai[$id_nilai_rapor] = [
                            'nis_data_dapodik' => $nis_data_dapodik,
                            'id_mapel' => $value
                        ];
                    }
                }
                $result[] = [
                    'no' => $no,
                    'data' => 'Baris ke-' . $no . ' ' . $nama_lengkap,
                    'status' => 'Success',
                    'message' => 'Data nilai' . ($tipe_nilai == '1' ? ' rapor' : ' ujian') . ' berhasil diimport'
                ];
                $success++;
                continue;
            }else{
                $failed++;
                $result[] = [
                    'no' => $no,
                    'data' => 'Baris ke-' . $no . ' ' . $nama_lengkap,
                    'status' => 'Failed',
                    'message' => 'Data tidak ditemukan'
                ];
                
            }
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

    public function save(){
        $nilai_raporModel = new nilai_raporModel();
        $semesterModel = new semesterModel();
        $id_data_dapodik = $this->request->getPost('id_data_dapodik');
        $id_mapel = $this->request->getPost('id_mapel');
        $id_semester = $this->request->getPost('id_semester');
        $nilai = $this->request->getPost('nilai_rapor');
        $tipe_nilai = $this->request->getPost('tipe_nilai');
        
        if($tipe_nilai == '0'){
            $semester_aktif = $semesterModel->where('status_semester', '1')->first();
            $id_semester = $semester_aktif['id_semester'];
            $check = $nilai_raporModel->where('id_data_dapodik', $id_data_dapodik)->where('id_mapel', $id_mapel)->where('tipe_nilai', $tipe_nilai)->first();
        }else{
            $check = $nilai_raporModel->where('id_data_dapodik', $id_data_dapodik)->where('id_mapel', $id_mapel)->where('id_semester', $id_semester)->where('tipe_nilai', $tipe_nilai)->first();
        }

        if ($check) {
            return $this->response->setJSON([
                'error' => true,
                'data' => 'Data sudah ada',
                'status' => '422'
            ]);
        }
        
        $data = [
            'id_mapel' => $id_mapel,
            'id_data_dapodik' => $id_data_dapodik,
            'nilai_rapor' => $nilai,
            'id_semester' => $id_semester,
            'tipe_nilai' => $tipe_nilai,
        ];
        $nilai_raporModel->save($data);
        return $this->response->setJSON([
            'error' => false,
            'data' => $data,
            'status' => '200'
        ]);
    }
    
    public function update(){
        $id_nilai_rapor = $this->request->getPost('id_nilai_rapor');
        $nilai = $this->request->getPost('nilai_rapor');
        $nilai_raporModel = new nilai_raporModel();
        $data = [
            'nilai_rapor' => $nilai
        ];
        $nilai_raporModel->update($id_nilai_rapor, $data);
        return $this->response->setJSON([
            'error' => false,
            'data' => $data,
            'status' => '200'
        ]);
    }
    
    public function detail($id){
        $data_dapodikModel = new data_dapodikModel();
        $nilai_raporModel = new nilai_raporModel();
        $semesterModel = new semesterModel();
        $mapelModel = new mapelModel();
        // $semester_aktif = $semesterModel->where('status_semester', '1')->first();

        $data_siswa = $data_dapodikModel->get_data_dapodik($id);
        $nilai_rapor = $nilai_raporModel->getNilaiBySiswa($id)->findAll();
        $nilai_rapor_grouped = [];
        $nilai_ujian_grouped = $nilai_raporModel->getNilaiBySiswa($id)->where('nilai_rapor.tipe_nilai', '0')->orderBy('mapel.nama_mapel', 'ASC')->findAll();
        for ($i=0; $i < count($nilai_rapor); $i++) {
            if ($nilai_rapor[$i]['tipe_nilai'] == '1') {
                $nilai_rapor_grouped[$nilai_rapor[$i]['id_semester']][] = $nilai_rapor[$i];
            }
        }
        
        // dd($nilai_rapor_grouped, $nilai_ujian_grouped);
        // dd($data_siswa);

        $data['title'] = 'SIMAS | Detail Data Siswa'; // set judul halaman
        $data['active'] = 'Nilai'; // set active menu
        $data['data_siswa'] = $data_siswa;
        $data['nilai_rapor'] = $nilai_rapor_grouped; 
        $data['nilai_ujian'] = $nilai_ujian_grouped;   
        $data['mapel'] = $mapelModel->findAll();
        $data['smt'] = $semesterModel->findAll();
        // dd($data);
        return view('Admin/Rapor/Nilai/detail_nilai', $data); // tampilkan view dashboard
    }

    public function delete(){
        $id_nilai_rapor = $this->request->getPost('id_nilai_rapor');
        $nilai_raporModel = new nilai_raporModel();
        $nilai_raporModel->delete($id_nilai_rapor);
        return $this->response->setJSON([
            'error' => false,
            'data' => 'Data berhasil dihapus',
            'status' => '200'
        ]);
    }

    public function hapusKelas(){
        $id_kelas = $this->request->getPost('id_kelas');
        $id_semester = $this->request->getPost('id_semester');
        $tipe_nilai = $this->request->getPost('tipe_nilai');
        $data_siswaModel = new data_siswaModel();
        $nilaiModel = new nilai_raporModel();

        $success = 0;
        $data_siswa = $data_siswaModel->get_data_siswa()->where('kelas_data_dapodik', $id_kelas)->findAll();
        foreach ($data_siswa as $siswa) {
            $nilaiModel->where('id_data_dapodik', $siswa['id_data_dapodik'])->where('id_semester', $id_semester)->where('tipe_nilai', $tipe_nilai)->delete();
            if($nilaiModel->affectedRows() > 0){
                $success++;
            }
        }

        return $this->response->setJSON([
            'error' => false,
            'data' => 'Data berhasil dihapus menghapus nilai'. ($tipe_nilai == '1' ? ' rapor ' : ' ujian ') . $success . ' data',
            'status' => '200'
        ]);

    }

    // skl
    public function SKL(): string // menampilkan halaman dashboard
    { 
        $semesterModel = new semesterModel();
        $data['semester'] = $semesterModel->findAll();
        $data['title'] = 'SIMAS | Nilai SKL'; // set judul halaman
        $data['active'] = 'SKL'; // set active menu
        return view('Admin/Rapor/SKL/index', $data); // tampilkan view dashboard
    }
}