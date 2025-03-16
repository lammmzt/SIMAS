<?php

namespace App\Controllers;
use App\Models\mapelModel;
use App\Models\data_dapodikModel;
use Hermawan\DataTables\DataTable;
use Ramsey\Uuid\Uuid;

class Mapel extends BaseController
{  
    public function index(): string // menampilkan halaman dashboard
    { 
        $data['title'] = 'SIMAS | Data Siswa'; // set judul halaman
        $data['active'] = 'Mapel'; // set active menu
        return view('Admin/Mapel/index', $data); // tampilkan view dashboard
    }

    public function ajaxDataTables()
    {   
        $mapelModel = new mapelModel();
        $builder = $mapelModel->getMapel();
        
       // dd($builder);
        return DataTable::of($builder)
            
            ->add('action', function ($row) {
                return '
                    <div class="flex align-items-center list-user-action">
                        <button class="btn btn-sm btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#edit" data-id="'.$row->id_mapel.'">
                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                            <path
                                d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        </button>
                    </div>
                ';
            }, 'last')
            ->toJson(true);
    }

    public function fetchMapel()
    {
        $mapelModel = new mapelModel();
        $id = $this->request->getPost('id');
        if ($id == null) {
            $data = $mapelModel->getMapel()->findAll();
        } else {
            $data = $mapelModel->getMapel($id);
        }

        return $this->response->setJSON([
            'error' => false,
            'data' => $data,
            'status' => 200
        ]);
    }

    public function save()
    {
        $mapelModel = new mapelModel();
        $validation =  \Config\Services::validation();
        $validation->setRules([
           'kode_mapel' => [
                'label' => 'Kode Mapel',
                'rules' => 'required|is_unique[mapel.kode_mapel]|max_length[5]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada',
                ],
            ],
            'nama_mapel' => [
                'label' => 'Nama Mapel',
                'rules' => 'required|is_unique[mapel.nama_mapel]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada',
                ],
            ],
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'errors' => true,
                'data' => $validation->getErrors(),
                'status' => 400
            ]);
        }else{
            $data = [
                'kode_mapel' => $this->request->getPost('kode_mapel'),
                'nama_mapel' => $this->request->getPost('nama_mapel'),
            ];
            $mapelModel->save($data);
            return $this->response->setJSON([
                'success' => true,
                'data' => 'Data berhasil disimpan',
                'status' => 200
            ]);
        }
    }

    public function update()
    {
        $mapelModel = new mapelModel();
        $id = $this->request->getPost('id_mapel');
        $validation =  \Config\Services::validation();
        $data_mapel = $mapelModel->getMapel($id);
        if ($this->request->getPost('kode_mapel') == $data_mapel['kode_mapel']) {
            $req_kode_mapel = 'required';
        } else {
            $req_kode_mapel = 'required|is_unique[mapel.kode_mapel]';
        }

        if ($this->request->getPost('nama_mapel') == $data_mapel['nama_mapel']) {
            $req_nama_mapel = 'required';
        } else {
            $req_nama_mapel = 'required|is_unique[mapel.nama_mapel]';
        }
        
        $validation->setRules([
            'kode_mapel' => [
                'label' => 'Kode Mapel',
                'rules' => $req_kode_mapel,
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada',
                ],
            ],
            'nama_mapel' => [
                'label' => 'Nama Mapel',
                'rules' => $req_nama_mapel,
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada',
                ],
            ],
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'errors' => true,
                'data' => $validation->getErrors(),
                'status' => 400
            ]);
        }else{
            $data = [
                'kode_mapel' => $this->request->getPost('kode_mapel'),
                'nama_mapel' => $this->request->getPost('nama_mapel'),
            ];
            $mapelModel->update($id, $data);
            return $this->response->setJSON([
                'success' => true,
                'data' => 'Data berhasil diupdate',
                'status' => 200
            ]);
        }
    }
}