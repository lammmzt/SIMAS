<?php 
namespace App\Controllers;
use App\Models\data_siswaModel;
use App\Models\data_dapodikModel;
use App\Models\semesterModel;
use App\Models\mapelModel;
use App\Models\nilai_raporModel;
use App\Models\urutanMapelModel;
use Hermawan\DataTables\DataTable;
use Ramsey\Uuid\Uuid;
use Mpdf\Mpdf;

class Kelulusan extends BaseController
{
    public function index(): string // menampilkan halaman dashboard
    { 
        $semesterModel = new semesterModel();
        $data['semester'] = $semesterModel->findAll();
        $data['title'] = 'SIMAS | Nilai SKL'; // set judul halaman
        $data['active'] = 'SKL'; // set active menu
        return view('Admin/Kelulusan/SKL/index', $data); // tampilkan view dashboard
    }
    
    public function ajaxDataTablesSKL()
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
                $nama_file = sprintf("skl_%s_%s.pdf", preg_replace('/[^A-Za-z0-9]/', '_', $row->nama_lengkap_data_siswa), $row->kelas_data_dapodik);
                $nama_file2 = sprintf("transkrip_%s_%s.pdf", preg_replace('/[^A-Za-z0-9]/', '_', $row->nama_lengkap_data_dapodik), $row->kelas_data_dapodik);
                // hapus petik yang ada pada nama file
                $nama_file = str_replace("'", "", $nama_file);
                $nama_file = str_replace("__039", "", $nama_file);
                $file_path = FCPATH . 'Assets/pdf/SKL/' . $nama_file;
                
                $nama_file2 = str_replace("'", "", $nama_file2);
                $nama_file2 = str_replace("__039", "", $nama_file2);
                $file_path2 = FCPATH . 'Assets/pdf/TRANSKRIP/' . $nama_file2;
                if (file_exists($file_path)) {
                    return '
                        <div class="flex align-items-center list-user-action">
                            <a class="btn btn-sm btn-icon btn-info" href="' . base_url('Assets/pdf/SKL/' . $nama_file) . '" target="_blank" data-toggle="tooltip" data-placement="top" title="Lihat Rapor Pelengkap">
                                <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg> Lihat SKL
                            </a>
                            ' . (file_exists($file_path2) ? '<a class="btn btn-sm btn-icon btn-primary" href="' . base_url('Assets/pdf/TRANSKRIP/' . $nama_file2) . '" target="_blank" data-toggle="tooltip" data-placement="top" title="Lihat Transkrip">
                                <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg> Lihat Transkrip
                            </a>' : '') . ' 
                        </div>
                    ';
                } else {
                    return $nama_file;
                }
                
                
            }, 'last')
            ->toJson(true);
    }

    public function generateSKL()
    {
        $nama_kelas = $this->request->getPost('kelas_data_dapodik');
        $siswaModel = new data_siswaModel(); // ambil model data siswa
        $urutanMapelModel = new urutanMapelModel();
        $nilaiRaporModel = new nilai_raporModel();
        $semesterModel = new semesterModel();
        $mapelModel = new mapelModel();
        $data_siswa = $siswaModel->getSiswaByKelas($nama_kelas); // ambil data siswa berdasarkan kelas
        
        if (!$data_siswa) {
            return $this->response->setJSON([
                'error' => true,
                'status' => '404',
                'data' => 'Data siswa kelas ' . $nama_kelas . ' tidak ditemukan'
            ]);
        }
        
        ini_set("pcre.backtrack_limit", "10000000");
        $semesterAktif = $semesterModel->where('status_semester', '1')->first();
        $data_urutan_mapel = $urutanMapelModel->getUrutanMapelBySemesterAndTingkatan($semesterAktif['id_semester'], 'XII')->findAll();
        // dd($data_urutan_mapel); 
        $data_nilai = $nilaiRaporModel->getNilaiByKelas($nama_kelas)->findAll();
        // dd($data_nilai, $data_nilai_ujian);
        $urutanMapelUmum = array();
        $urutanMapelPilihan = array();
        $urutanMapelLokal = array();
        foreach ($data_urutan_mapel as $key => $value) {
            if ($value['kel_mapel'] == 'Umum') {
                $urutanMapelUmum[] = $value;
            } elseif ($value['kel_mapel'] == 'Pilihan') {
                $urutanMapelPilihan[] = $value;
            } elseif ($value['kel_mapel'] == 'Muatan Lokal') {
                $urutanMapelLokal[] = $value;
            }
        }
        // dd($urutanMapelUmum, $urutanMapelPilihan, $urutanMapelLokal);
        // sort array urutan mapel by no_urutan_mapel
        usort($urutanMapelUmum, function ($a, $b) {
            return $a['no_urutan_mapel'] <=> $b['no_urutan_mapel'];
        });
        usort($urutanMapelPilihan, function ($a, $b) {
            return $a['no_urutan_mapel'] <=> $b['no_urutan_mapel'];
        });
        usort($urutanMapelLokal, function ($a, $b) {
            return $a['no_urutan_mapel'] <=> $b['no_urutan_mapel'];
        });
        // dd($urutanMapelUmum, $urutanMapelPilihan, $urutanMapelLokal);
        // goruping by siswa
        $data_nilai_group = array();
        foreach ($data_nilai as $key => $value) {
            $data_nilai_group[$value['id_data_dapodik']][] = $value;
        }
            
        $imagePath = FCPATH . 'Assets/img/kop_sekolah.png';
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/png;base64,' . $imageData;
        foreach ($data_nilai_group as $dtn) {

            // Buat nama file yang aman
            $nama_file = sprintf("skl_%s_%s.pdf", preg_replace('/[^A-Za-z0-9]/', '_', $dtn[0]['nama_lengkap_data_dapodik']), $nama_kelas);
            // hapus petik yang ada pada nama file
            $nama_file = str_replace("'", "", $nama_file);
            $file_path = FCPATH . 'Assets/pdf/SKL/' . $nama_file;
        
            // Jika file sudah ada, hapus
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        
            // Inisialisasi mPDF untuk setiap siswa (harus di dalam loop)
            // dd($data_nilai_group);
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                // 'format' => 'F4',
                'format' => [210, 330],
                'margin_left' => 6,
                'margin_right' => 6,
                'margin_top' => 6,
                'margin_bottom' => 5,
                'margin_header' => 0,
                'margin_footer' => 0,
            ]);
        
            $mpdf->showImageErrors = true;
            
            // Ambil tampilan HTML
            $data['data_nilai'] = $dtn;
            $data['urutan_mapel_umum'] = $urutanMapelUmum;
            $data['urutan_mapel_pilihan'] = $urutanMapelPilihan;
            $data['urutan_mapel_lokal'] = $urutanMapelLokal;
            $data['imageSrc'] = $imageSrc;
            $html = view('Admin/Kelulusan/SKL/Cetak/cetak_skl', $data);
        
            // Tulis HTML ke PDF
            $mpdf->WriteHTML($html);
            $mpdf->Output($file_path, 'F'); // Simpan ke file
        
            unset($mpdf); // Bebaskan memori setelah selesai
        }
    
        return $this->response->setJSON([
            'error' => false,
            'status' => '200',
            'data' => 'Berhasil generate data SKL siswa kelas ' . $nama_kelas
        ]);
    }

    public function cetakSemuaSKL()
    {
        $nama_kelas = $this->request->getPost('kelas_data_dapodik');
        $siswaModel = new data_siswaModel(); // ambil model data siswa
        $urutanMapelModel = new urutanMapelModel();
        $nilaiRaporModel = new nilai_raporModel();
        $semesterModel = new semesterModel();
        $mapelModel = new mapelModel();
        $data_siswa = $siswaModel->getSiswaByKelas($nama_kelas); // ambil data siswa berdasarkan kelas
        
        // dd($data_siswa);
        if ($data_siswa) { // jika data siswa ada
            ini_set("pcre.backtrack_limit", "10000000");
            $semesterAktif = $semesterModel->where('status_semester', '1')->first();
            $data_urutan_mapel = $urutanMapelModel->getUrutanMapelBySemesterAndTingkatan($semesterAktif['id_semester'], 'XII')->findAll();
            // dd($data_urutan_mapel); 
            $data_nilai = $nilaiRaporModel->getNilaiByKelas($nama_kelas)->findAll();
            // dd($data_nilai, $data_nilai_ujian);
            $urutanMapelUmum = array();
            $urutanMapelPilihan = array();
            $urutanMapelLokal = array();
            foreach ($data_urutan_mapel as $key => $value) {
                if ($value['kel_mapel'] == 'Umum') {
                    $urutanMapelUmum[] = $value;
                } elseif ($value['kel_mapel'] == 'Pilihan') {
                    $urutanMapelPilihan[] = $value;
                } elseif ($value['kel_mapel'] == 'Muatan Lokal') {
                    $urutanMapelLokal[] = $value;
                }
            }
            // dd($urutanMapelUmum, $urutanMapelPilihan, $urutanMapelLokal);
            // sort array urutan mapel by no_urutan_mapel
            usort($urutanMapelUmum, function ($a, $b) {
                return $a['no_urutan_mapel'] <=> $b['no_urutan_mapel'];
            });
            usort($urutanMapelPilihan, function ($a, $b) {
                return $a['no_urutan_mapel'] <=> $b['no_urutan_mapel'];
            });
            usort($urutanMapelLokal, function ($a, $b) {
                return $a['no_urutan_mapel'] <=> $b['no_urutan_mapel'];
            });
            // dd($urutanMapelUmum, $urutanMapelPilihan, $urutanMapelLokal);
            // goruping by siswa
            $data_nilai_group = array();
            foreach ($data_nilai as $key => $value) {
                $data_nilai_group[$value['id_data_dapodik']][] = $value;
            }
            
            // dd($data_nilai_group);
            $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            // 'format' => 'F4',
            'format' => [210, 330],
            'margin_left' => 6,
            'margin_right' => 6,
            'margin_top' => 6,
            'margin_bottom' => 5,
            'margin_header' => 0,
            'margin_footer' => 0,
            ]);

            
            $imagePath = FCPATH . 'Assets/img/kop_sekolah.png';
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/png;base64,' . $imageData;
            $data['data_nilai'] = $data_nilai_group;
            $data['imageSrc'] = $imageSrc;
            $data['urutan_mapel_umum'] = $urutanMapelUmum;
            $data['urutan_mapel_pilihan'] = $urutanMapelPilihan;
            $data['urutan_mapel_lokal'] = $urutanMapelLokal;
            $html = view('Admin/Kelulusan/SKL/Cetak/cetak_all_SKL', $data);
            $mpdf->WriteHTML($html);
            $nama_file = 'skl_' . $nama_kelas . '.pdf';
            
            // jika sudah ada file dengan nama yang sama, maka file tersebut akan dihapus
            if (file_exists(FCPATH . 'Assets/pdf/SKL/' . $nama_file)) {
                unlink(FCPATH . 'Assets/pdf/SKL/' . $nama_file);
            }
            
            // view result
            $mpdf->Output(FCPATH . 'Assets/pdf/SKL/' . $nama_file, 'F');
            return $this->response->setJSON([
                'error' => false,
                'status' => '200',
                'data' => $nama_file,
            ]);
            
            // exit(); 
        } else {
            return $this->response->setJSON([
                'error' => true,
                'status' => '404',
                'data' => 'Data siswa kelas ' . $nama_kelas . ' tidak ditemukan'
            ]);
        }
    }

    public function cetakSemuaTranskrip()
    {
        $nama_kelas = $this->request->getPost('kelas_data_dapodik');
        $siswaModel = new data_siswaModel(); // ambil model data siswa
        $urutanMapelModel = new urutanMapelModel();
        $nilaiRaporModel = new nilai_raporModel();
        $semesterModel = new semesterModel();
        $mapelModel = new mapelModel();
        $data_siswa = $siswaModel->getSiswaByKelas($nama_kelas); // ambil data siswa berdasarkan kelas
        // dd($data_siswa);
        // dd($data_siswa);
        if ($data_siswa) { // jika data siswa ada
            ini_set("pcre.backtrack_limit", "10000000");
            $semesterAktif = $semesterModel->where('status_semester', '1')->first();
            $data_urutan_mapel = $urutanMapelModel->getUrutanMapelBySemesterAndTingkatan($semesterAktif['id_semester'], 'XII')->findAll();
            // dd($data_urutan_mapel); 
            $data_nilai = $nilaiRaporModel->getNilaiByKelas($nama_kelas)->findAll();
            // dd($data_nilai, $data_nilai_ujian);
            $urutanMapelUmum = array();
            $urutanMapelPilihan = array();
            $urutanMapelLokal = array();
            foreach ($data_urutan_mapel as $key => $value) {
                if ($value['kel_mapel'] == 'Umum') {
                    $urutanMapelUmum[] = $value;
                } elseif ($value['kel_mapel'] == 'Pilihan') {
                    $urutanMapelPilihan[] = $value;
                } elseif ($value['kel_mapel'] == 'Muatan Lokal') {
                    $urutanMapelLokal[] = $value;
                }
            }
            // dd($urutanMapelUmum, $urutanMapelPilihan, $urutanMapelLokal);
            // sort array urutan mapel by no_urutan_mapel
            usort($urutanMapelUmum, function ($a, $b) {
                return $a['no_urutan_mapel'] <=> $b['no_urutan_mapel'];
            });
            usort($urutanMapelPilihan, function ($a, $b) {
                return $a['no_urutan_mapel'] <=> $b['no_urutan_mapel'];
            });
            usort($urutanMapelLokal, function ($a, $b) {
                return $a['no_urutan_mapel'] <=> $b['no_urutan_mapel'];
            });
            // dd($urutanMapelUmum, $urutanMapelPilihan, $urutanMapelLokal);
            // goruping by siswa
            $data_nilai_group = array();
            foreach ($data_nilai as $key => $value) {
                $data_nilai_group[$value['id_data_dapodik']][] = $value;
            }
            
            // dd($data_nilai_group);
            $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            // 'format' => 'F4',
            'format' => [210, 330],
            'margin_left' => 8,
            'margin_right' => 8,
            'margin_top' => 8,
            'margin_bottom' => 5,
            'margin_header' => 0,
            'margin_footer' => 0,
            ]);

            
            $imagePath = FCPATH . 'Assets/img/kop_sekolah.png';
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/png;base64,' . $imageData;
            $data['data_nilai'] = $data_nilai_group;
            $data['imageSrc'] = $imageSrc;
            $data['urutan_mapel_umum'] = $urutanMapelUmum;
            $data['urutan_mapel_pilihan'] = $urutanMapelPilihan;
            $data['urutan_mapel_lokal'] = $urutanMapelLokal;
            // dd($data);
            // return view('Admin/Kelulusan/SKL/Cetak/cetak_transkrip', $data);
            $html = view('Admin/Kelulusan/SKL/Cetak/cetak_all_transkrip', $data);
            $mpdf->WriteHTML($html);
            $nama_file = 'transkrip_' . $nama_kelas . '.pdf';
            
            // jika sudah ada file dengan nama yang sama, maka file tersebut akan dihapus
            if (file_exists(FCPATH . 'Assets/pdf/TRANSKRIP/' . $nama_file)) {
                unlink(FCPATH . 'Assets/pdf/TRANSKRIP/' . $nama_file);
            }
            
            // view result
            $mpdf->Output(FCPATH . 'Assets/pdf/TRANSKRIP/' . $nama_file, 'F');
            return $this->response->setJSON([
                'error' => false,
                'status' => '200',
                'data' => $nama_file,
            ]);
            
            // exit(); 
        } else {
            return $this->response->setJSON([
                'error' => true,
                'status' => '404',
                'data' => 'Data siswa kelas ' . $nama_kelas . ' tidak ditemukan'
            ]);
        }
    }

    public function generateTranskrip()
    {
        $nama_kelas = $this->request->getPost('kelas_data_dapodik');
        $siswaModel = new data_siswaModel(); // ambil model data siswa
        $urutanMapelModel = new urutanMapelModel();
        $nilaiRaporModel = new nilai_raporModel();
        $semesterModel = new semesterModel();
        $mapelModel = new mapelModel();
        $data_siswa = $siswaModel->getSiswaByKelas($nama_kelas); // ambil data siswa berdasarkan kelas
        
        if (!$data_siswa) {
            return $this->response->setJSON([
                'error' => true,
                'status' => '404',
                'data' => 'Data siswa kelas ' . $nama_kelas . ' tidak ditemukan'
            ]);
        }
        ini_set("pcre.backtrack_limit", "10000000");
        $semesterAktif = $semesterModel->where('status_semester', '1')->first();
        $data_urutan_mapel = $urutanMapelModel->getUrutanMapelBySemesterAndTingkatan($semesterAktif['id_semester'], 'XII')->findAll();
        // dd($data_urutan_mapel); 
        $data_nilai = $nilaiRaporModel->getNilaiByKelas($nama_kelas)->findAll();
        // dd($data_nilai, $data_nilai_ujian);
        $urutanMapelUmum = array();
        $urutanMapelPilihan = array();
        $urutanMapelLokal = array();
        foreach ($data_urutan_mapel as $key => $value) {
            if ($value['kel_mapel'] == 'Umum') {
                $urutanMapelUmum[] = $value;
            } elseif ($value['kel_mapel'] == 'Pilihan') {
                $urutanMapelPilihan[] = $value;
            } elseif ($value['kel_mapel'] == 'Muatan Lokal') {
                $urutanMapelLokal[] = $value;
            }
        }
        // dd($urutanMapelUmum, $urutanMapelPilihan, $urutanMapelLokal);
        // sort array urutan mapel by no_urutan_mapel
        usort($urutanMapelUmum, function ($a, $b) {
            return $a['no_urutan_mapel'] <=> $b['no_urutan_mapel'];
        });
        usort($urutanMapelPilihan, function ($a, $b) {
            return $a['no_urutan_mapel'] <=> $b['no_urutan_mapel'];
        });
        usort($urutanMapelLokal, function ($a, $b) {
            return $a['no_urutan_mapel'] <=> $b['no_urutan_mapel'];
        });
        // dd($urutanMapelUmum, $urutanMapelPilihan, $urutanMapelLokal);
        // goruping by siswa
        $data_nilai_group = array();
        foreach ($data_nilai as $key => $value) {
            $data_nilai_group[$value['id_data_dapodik']][] = $value;
        }
            
        $imagePath = FCPATH . 'Assets/img/kop_sekolah.png';
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/png;base64,' . $imageData;
        foreach ($data_nilai_group as $dtn) {

            // Buat nama file yang aman
            $nama_file = sprintf("transkrip_%s_%s.pdf", preg_replace('/[^A-Za-z0-9]/', '_', $dtn[0]['nama_lengkap_data_dapodik']), $nama_kelas);
            // hapus petik yang ada pada nama file
            $nama_file = str_replace("'", "", $nama_file);
            $file_path = FCPATH . 'Assets/pdf/TRANSKRIP/' . $nama_file;
        
            // Jika file sudah ada, hapus
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        
            // Inisialisasi mPDF untuk setiap siswa (harus di dalam loop)
            // dd($data_nilai_group);
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                // 'format' => 'F4',
                'format' => [210, 330],
                'margin_left' => 8,
                'margin_right' => 8,
                'margin_top' => 8,
                'margin_bottom' => 5,
                'margin_header' => 0,
                'margin_footer' => 0,
            ]);
        
            $mpdf->showImageErrors = true;
            
            // Ambil tampilan HTML
            $data['data_nilai'] = $dtn;
            $data['urutan_mapel_umum'] = $urutanMapelUmum;
            $data['urutan_mapel_pilihan'] = $urutanMapelPilihan;
            $data['urutan_mapel_lokal'] = $urutanMapelLokal;
            $data['imageSrc'] = $imageSrc;
            $html = view('Admin/Kelulusan/SKL/Cetak/cetak_transkrip', $data);
        
            // Tulis HTML ke PDF
            $mpdf->WriteHTML($html);
            $mpdf->Output($file_path, 'F'); // Simpan ke file
        
            unset($mpdf); // Bebaskan memori setelah selesai
        }
    
        return $this->response->setJSON([
            'error' => false,
            'status' => '200',
            'data' => 'Berhasil generate data Transkrip siswa kelas ' . $nama_kelas
        ]);
    }
    // =================== TRANSKRIP ==================


    // analisis
    public function Analisis(): string // menampilkan halaman dashboard
    { 
        if($this->request->getPost('kelas_data_dapodik')){
            $nama_kelas = $this->request->getPost('kelas_data_dapodik');
        }else{
            $nama_kelas = '';
        }
        
        $siswaModel = new data_siswaModel(); // ambil model data siswa
        $urutanMapelModel = new urutanMapelModel();
        $nilaiRaporModel = new nilai_raporModel();
        $semesterModel = new semesterModel();
        $mapelModel = new mapelModel();
        $data_siswa = $siswaModel->getSiswaByKelas($nama_kelas); // ambil data siswa berdasarkan kelas
        // dd($data_siswa);
        if ($data_siswa) { // jika data siswa ada
            $semesterAktif = $semesterModel->where('status_semester', '1')->first();
            $data_urutan_mapel = $urutanMapelModel->getUrutanMapelBySemesterAndTingkatan($semesterAktif['id_semester'], 'XII')->orderBy('kel_mapel', 'DESC')->orderBy('no_urutan_mapel', 'ASC')->findAll();
            // dd($data_urutan_mapel); 
            $data_nilai = $nilaiRaporModel->getNilaiByKelas($nama_kelas)->findAll();
            // dd($data_nilai);
            $urutanMapelUmum = array();
            $urutanMapelPilihan = array();
            $urutanMapelLokal = array();
            
            // dd($urutanMapelUmum, $urutanMapelPilihan, $urutanMapelLokal);
            // goruping by siswa
            $data_nilai_group = array();
            foreach ($data_nilai as $key => $value) {
                $data_nilai_group[$value['id_data_dapodik']][] = $value;
            }
            
            $data['data_nilai'] = $data_nilai_group;
            $data['data_mapel'] = $data_urutan_mapel;
            // dd($data);
        }else{
            $data['data_nilai'] = array();
            $data['data_mapel'] = array();
        }
        
        $data['nama_kelas'] = $nama_kelas;
        $semesterModel = new semesterModel();
        $data['semester'] = $semesterModel->findAll();
        $data['title'] = 'SIMAS | Nilai SKL'; // set judul halaman
        $data['active'] = 'Analisis_nilai'; // set active menu
        // dd($data);
        return view('Admin/Kelulusan/Analisis/index', $data); // tampilkan view dashboard
    }

    public function Analisis2(): string // menampilkan halaman dashboard
    { 
        $semesterModel = new semesterModel();
        $data['semester'] = $semesterModel->findAll();
        $data['title'] = 'SIMAS | Nilai SKL'; // set judul halaman
        $data['active'] = 'SKL'; // set active menu
        return view('Admin/Kelulusan/Analisis/index', $data); // tampilkan view dashboard
    }
    
    public function cetak_analisis($nama_kelas){
        // $nama_kelas = 'XII Kartini 2';
        
        $siswaModel = new data_siswaModel(); // ambil model data siswa
        $urutanMapelModel = new urutanMapelModel();
        $nilaiRaporModel = new nilai_raporModel();
        $semesterModel = new semesterModel();
        $mapelModel = new mapelModel();
        $data_siswa = $siswaModel->getSiswaByKelas($nama_kelas); // ambil data siswa berdasarkan kelas
        // dd($data_siswa);
        if ($data_siswa) { // jika data siswa ada
            $semesterAktif = $semesterModel->where('status_semester', '1')->first();
            $data_urutan_mapel = $urutanMapelModel->getUrutanMapelBySemesterAndTingkatan($semesterAktif['id_semester'], 'XII')->orderBy('kel_mapel', 'DESC')->orderBy('no_urutan_mapel', 'ASC')->findAll();
            // dd($data_urutan_mapel); 
            $data_nilai = $nilaiRaporModel->getNilaiByKelas($nama_kelas)->findAll();
            // dd($data_nilai);
            $urutanMapelUmum = array();
            $urutanMapelPilihan = array();
            $urutanMapelLokal = array();
            
            // dd($urutanMapelUmum, $urutanMapelPilihan, $urutanMapelLokal);
            // goruping by siswa
            $data_nilai_group = array();
            foreach ($data_nilai as $key => $value) {
                $data_nilai_group[$value['id_data_dapodik']][] = $value;
            }
            
            $data['data_nilai'] = $data_nilai_group;
            $data['data_mapel'] = $data_urutan_mapel;
            // dd($data);
        }else{
            $data['data_nilai'] = array();
            $data['data_mapel'] = array();
        }
        
        $data['nama_kelas'] = $nama_kelas;
        $semesterModel = new semesterModel();
        $data['semester'] = $semesterModel->findAll();
        $data['title'] = 'SIMAS | Nilai SKL'; // set judul halaman
        $data['active'] = 'Analisis_nilai'; // set active menu
        return view('Admin/Kelulusan/Analisis/Cetak/cetak_all_analisis', $data);
    }
    
    public function cetakSemuaAnalisis()
    {
        $nama_kelas = $this->request->getPost('kelas_data_dapodik');
        // $nama_kelas = 'XII Kartini 2';
        
        $siswaModel = new data_siswaModel(); // ambil model data siswa
        $urutanMapelModel = new urutanMapelModel();
        $nilaiRaporModel = new nilai_raporModel();
        $semesterModel = new semesterModel();
        $mapelModel = new mapelModel();
        $data_siswa = $siswaModel->getSiswaByKelas($nama_kelas); // ambil data siswa berdasarkan kelas
        // dd($data_siswa);
        if ($data_siswa) { // jika data siswa ada
            ini_set("pcre.backtrack_limit", "10000000");
            $semesterAktif = $semesterModel->where('status_semester', '1')->first();
            $data_urutan_mapel = $urutanMapelModel->getUrutanMapelBySemesterAndTingkatan($semesterAktif['id_semester'], 'XII')->orderBy('kel_mapel', 'DESC')->orderBy('no_urutan_mapel', 'ASC')->findAll();
            // dd($data_urutan_mapel); 
            $data_nilai = $nilaiRaporModel->getNilaiByKelas($nama_kelas)->findAll();
            // dd($data_nilai);
            $urutanMapelUmum = array();
            $urutanMapelPilihan = array();
            $urutanMapelLokal = array();
            
            // dd($urutanMapelUmum, $urutanMapelPilihan, $urutanMapelLokal);
            // goruping by siswa
            $data_nilai_group = array();
            foreach ($data_nilai as $key => $value) {
                $data_nilai_group[$value['id_data_dapodik']][] = $value;
            }
            
            $data['data_nilai'] = $data_nilai_group;
            $data['data_mapel'] = $data_urutan_mapel;
            // dd($data)
            $semesterModel = new semesterModel();
            $data['semester'] = $semesterModel->findAll();
            
            // dd($data_nilai_group);
            $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            // 'format' => 'F4',
            'format' => [330, 210],
            'margin_left' => 8,
            'margin_right' => 8,
            'margin_top' => 8,
            'margin_bottom' => 5,
            'margin_header' => 0,
            'margin_footer' => 0,
            ]);
            // dd($data);
            // return view('Admin/Kelulusan/SKL/Cetak/cetak_transkrip', $data);
            $html = view('Admin/Kelulusan/Analisis/Cetak/prints', $data);
            $mpdf->WriteHTML($html);
            $nama_file = 'analisis_' . $nama_kelas . '.pdf';
            
            // jika sudah ada file dengan nama yang sama, maka file tersebut akan dihapus
            if (file_exists(FCPATH . 'Assets/pdf/Analisis/' . $nama_file)) {
                unlink(FCPATH . 'Assets/pdf/Analisis/' . $nama_file);
            }
            
            // view result
            $mpdf->Output(FCPATH . 'Assets/pdf/Analisis/' . $nama_file, 'F');
            return $this->response->setJSON([
                'error' => false,
                'status' => '200',
                'data' => $nama_file,
            ]);
            
            // exit(); 
        } else {
            return $this->response->setJSON([
                'error' => true,
                'status' => '404',
                'data' => 'Data siswa kelas ' . $nama_kelas . ' tidak ditemukan'
            ]);
        }
    }

   
}

?>