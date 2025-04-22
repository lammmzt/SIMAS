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

class Rapor extends BaseController
{  
    public function Pelengkap(): string // menampilkan halaman dashboard
    { 
        $data['title'] = 'SIMAS | Pelengkap Rapor'; // set judul halaman
        $data['active'] = 'pelengkap_rapor'; // set active menu
        return view('Admin/Rapor/Pelengkap', $data); // tampilkan view dashboard
    }

    public function generatePelengkap()
    {
        $nama_kelas = $this->request->getPost('kelas_data_dapodik');
        $siswaModel = new data_siswaModel();
        $data_siswa = $siswaModel->getSiswaByKelas($nama_kelas);
    
        if (!$data_siswa) {
            return $this->response->setJSON([
                'error' => true,
                'status' => '404',
                'data' => 'Data siswa kelas ' . $nama_kelas . ' tidak ditemukan'
            ]);
        }
        ini_set("pcre.backtrack_limit", "10000000");
        $imagePath = FCPATH . 'Assets/img/foto_siswa.png';
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/png;base64,' . $imageData;
        $ttd_kepsek = FCPATH . 'Assets/img/ttd_kepsek.png';
        $imageData2 = base64_encode(file_get_contents($ttd_kepsek));
        $imageSrc2 = 'data:image/png;base64,' . $imageData2;
        foreach ($data_siswa as $siswa) {
            // Buat nama file yang aman
            $nama_file = sprintf("plk_%s_%s.pdf", preg_replace('/[^A-Za-z0-9]/', '_', $siswa['nama_lengkap_data_siswa']), $nama_kelas);
            // hapus petik yang ada pada nama file
            $nama_file = str_replace("'", "", $nama_file);
            $file_path = FCPATH . 'Assets/pdf/rapor_pelengkap/' . $nama_file;
        
            // Jika file sudah ada, hapus
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        
            // Inisialisasi mPDF untuk setiap siswa (harus di dalam loop)
            $mpdf = new \Mpdf\Mpdf([
                'mode'          => 'utf-8',
                // 'format'        => 'A4',
                'format' => [210, 297],
                'margin_left'   => 15,
                'margin_right'  => 15,
                'margin_top'    => 15,
                'margin_bottom' => 15,
                'margin_header' => 0,
                'margin_footer' => 0,
            ]);
        
            $mpdf->showImageErrors = true;
            
            // Ambil tampilan HTML
            $data['data_siswa'] = $siswa;
            $data['imageSrc'] = $imageSrc;
            $data['ttd_kepsek'] = $imageSrc2;
            $html = view('Admin/Rapor/cetak/cetak_pelengkap', $data);
        
            // Tulis HTML ke PDF
            $mpdf->WriteHTML($html);
            $mpdf->Output($file_path, 'F'); // Simpan ke file
        
            unset($mpdf); // Bebaskan memori setelah selesai
        }
    
        return $this->response->setJSON([
            'error' => false,
            'status' => '200',
            'data' => 'Berhasil generate data pelengkap siswa kelas ' . $nama_kelas
        ]);
    }

    public function cetakSemuaPelengkap()
    {
        $nama_kelas = $this->request->getPost('kelas_data_dapodik');
        $siswaModel = new data_siswaModel();
        $data_siswa = $siswaModel->getSiswaByKelas($nama_kelas);
        // dd($data_siswa);
        if ($data_siswa) {      
           
            $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            // 'format' => 'A4',
            'format' => [210, 297],
            'margin_left' => 15,
            'margin_right' => 15,
            'margin_top' => 15,
            'margin_bottom' => 15,
            'margin_header' => 0,
            'margin_footer' => 0,
            ]);

            ini_set("pcre.backtrack_limit", "10000000");
            $imagePath = FCPATH . 'Assets/img/foto_siswa.png';
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/png;base64,' . $imageData;
            $data['data_siswa'] = $data_siswa;
            $data['imageSrc'] = $imageSrc;

            $ttd_kepsek = FCPATH . 'Assets/img/ttd_kepsek.png';
            $imageData2 = base64_encode(file_get_contents($ttd_kepsek));
            $imageSrc2 = 'data:image/png;base64,' . $imageData2;
            $data['ttd_kepsek'] = $imageSrc2;
            $html = view('Admin/Rapor/cetak/cetak_all_pelengkap', $data);
            $mpdf->WriteHTML($html);
            $nama_file = 'plk_' . $nama_kelas . '.pdf';
            // jika sudah ada file dengan nama yang sama, maka file tersebut akan dihapus
            if (file_exists(FCPATH . 'Assets/pdf/rapor_pelengkap/' . $nama_file)) {
                unlink(FCPATH . 'Assets/pdf/rapor_pelengkap/' . $nama_file);
            }
            $mpdf->Output(FCPATH . 'Assets/pdf/rapor_pelengkap/' . $nama_file, 'F');
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

    public function ajaxDataTablesKelas()
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
                $nama_file = sprintf("plk_%s_%s.pdf", preg_replace('/[^A-Za-z0-9]/', '_', $row->nama_lengkap_data_siswa), $row->kelas_data_dapodik);
                // hapus petik yang ada pada nama file
                $nama_file = str_replace("'", "", $nama_file);
                $nama_file = str_replace("__039", "", $nama_file);
                $file_path = FCPATH . 'Assets/pdf/rapor_pelengkap/' . $nama_file;
                if (file_exists($file_path)) {
                    return '
                        <div class="flex align-items-center list-user-action">
                            <a class="btn btn-sm btn-icon btn-info" href="' . base_url('Assets/pdf/rapor_pelengkap/' . $nama_file) . '" target="_blank" data-toggle="tooltip" data-placement="top" title="Lihat Rapor Pelengkap">
                                <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg> Lihat Rapor Pelengkap
                            </a>
                        </div>
                    ';
                } else {
                    return $nama_file;
                }
            }, 'last')
            ->toJson(true);
    }

}