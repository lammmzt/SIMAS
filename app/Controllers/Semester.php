<?php

namespace App\Controllers;
use App\Models\semesterModel;
use Hermawan\DataTables\DataTable;
use Ramsey\Uuid\Uuid;

class Semester extends BaseController
{  
    public function index(): string // menampilkan halaman dashboard
    { 
        $data['title'] = 'SIMAS | Data Siswa'; // set judul halaman
        $data['active'] = 'Semester'; // set active menu
        return view('Admin/Semester/index', $data); // tampilkan view dashboard
    }

    public function ajaxDataTables()
    {   
        $semesterModel = new semesterModel();
        $builder = $semesterModel->getSemester();
        
       // dd($builder);
        return DataTable::of($builder)
        //    <div class="form-check form-switch form-check-inline">
        //     <input class="form-check-input" type="checkbox" id="switch1" />
        //     <label class="form-check-label pl-2" for="switch1">Off Switch</label>
        // </div>
            ->add('status_semester', function ($row) {
                return '
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input change_status_semester" type="checkbox" id="'.$row->id_semester.'" '.($row->status_semester == 1 ? 'checked' : '').' />
                        <label class="form-check-label pl-2" for="'.$row->id_semester.'"></label>
                    </div>
                ';
            })
            ->add('action', function ($row) {
                return '
                    <div class="flex align-items-center list-user-action">
                        <button class="btn btn-sm btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#edit" data-id="'.$row->id_semester.'">
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

    public function fetchsemester()
    {
        $semesterModel = new semesterModel();
        $id = $this->request->getPost('id');
        if ($id == null) {
            $data = $semesterModel->getSemester()->findAll();
        } else {
            $data = $semesterModel->getSemester($id);
        }

        return $this->response->setJSON([
            'error' => false,
            'data' => $data,
            'status' => 200
        ]);
    }

    public function save()
    {
        $semesterModel = new semesterModel();
        $validation =  \Config\Services::validation();
        $check = $semesterModel->where('tahun_ajaran', $this->request->getPost('tahun_ajaran'))->where('nama_semester', $this->request->getPost('nama_semester'))->countAllResults();
        if ($check > 0) {
            return $this->response->setJSON([
                'errors' => true,
                'data' => 'Data sudah ada',
                'status' => 400
            ]);
        }
        $validation->setRules([
           'tahun_ajaran' => [
                'label' => 'Tajun Ajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ],
            ],
            'nama_semester' => [
                'label' => 'Nama semester',
                'rules' => 'required',
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
                'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
                'nama_semester' => $this->request->getPost('nama_semester'),
                'status_semester' => '0',
            ];
            $semesterModel->save($data);
            return $this->response->setJSON([
                'success' => true,
                'data' => 'Data berhasil disimpan',
                'status' => 200
            ]);
        }
    }

    public function update()
    {
        $semesterModel = new semesterModel();
        $id = $this->request->getPost('id_semester');
        $validation =  \Config\Services::validation();
        $data_semester = $semesterModel->getSemester($id);
        if($this->request->getPost('tahun_ajaran') != $data_semester['tahun_ajaran'] || $this->request->getPost('nama_semester') != $data_semester['nama_semester']){
            $check = $semesterModel->where('tahun_ajaran', $this->request->getPost('tahun_ajaran'))->where('nama_semester', $this->request->getPost('nama_semester'))->countAllResults();
            if ($check > 0) {
                return $this->response->setJSON([
                    'errors' => true,
                    'data' => 'Data sudah ada',
                    'status' => 400
                ]);
            }
        }
        
        $validation->setRules([
            'tahun_ajaran' => [
                'label' => 'Tajun Ajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ],
            ],
            'nama_semester' => [
                'label' => 'Nama semester',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
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
                'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
                'nama_semester' => $this->request->getPost('nama_semester'),
            ];
            $semesterModel->update($id, $data);
            return $this->response->setJSON([
                'success' => true,
                'data' => 'Data berhasil diupdate',
                'status' => 200
            ]);
        }
    }

    public function updateStatus()
    {
        $semesterModel = new semesterModel();
        $id = $this->request->getPost('id');
        $semesterModel->where('status_semester', '1')->set(['status_semester' => '0'])->update();
        $data_semester = $semesterModel->getSemester($id);
        $data = [
            'status_semester' => $data_semester['status_semester'] == '1'? '0' : '1',
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $semesterModel->update($id, $data);
        return $this->response->setJSON([
            'success' => true,
            'data' => 'Data berhasil diupdate',
            'status' => 200
        ]);
    }
}