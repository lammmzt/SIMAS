<?php

namespace App\Controllers;
use App\Models\urutanMapelModel;
use App\Models\mapelModel;
use App\Models\semesterModel;
use Hermawan\DataTables\DataTable;

class UrutanMapel extends BaseController
{  
    public function index(): string // menampilkan halaman dashboard
    { 
        $mapelModel = new mapelModel();
        
        $data['title'] = 'SIMAS | Data Urutan Mapel'; // set judul halaman
        $data['active'] = 'UrutanMapel'; // set active menu
        $data['mapel'] = $mapelModel->findAll(); // ambil semua data mapel
        return view('Admin/UrutanMapel/index', $data); // tampilkan view dashboard
    }

    public function ajaxDataTables()
    {   
        $urutanMapelModel = new urutanMapelModel();
        $semesterModel = new semesterModel();
        $semesterAktif = $semesterModel->where('status_semester', '1')->first();
        $tingkatan = $this->request->getVar('tingkatan_urutan_mapel');
        $builder = $urutanMapelModel->getUrutanMapel()
            ->where('urutan_mapel.tingkatan_urutan_mapel', $tingkatan)
            ->where('urutan_mapel.id_semester', $semesterAktif['id_semester'])
            ->orderBy('urutan_mapel.kel_mapel', 'DESC')
            ->orderBy('urutan_mapel.no_urutan_mapel', 'ASC');
            //dd($builder);
        return DataTable::of($builder)
            ->add('no_urutan_mapel', function ($row) {
                return '
                <input type="number" class="form-control change_no_urutan_mapel" name="no_urutan_mapel" id="no_urutan_mapel" value="'.$row->no_urutan_mapel.'" min="1" max="50" style="width: 75px; min-width: 75px; max-width: 75px; align-items: center;" 
                 data-id="'.$row->id_urutan_mapel.'">
                ';
            })
            ->add('kel_mapel', function ($row) {
                return '
                <select class="form-control change_kel_mapel" name="kel_mapel" id="kel_mapel" style="width: 150px; min-width: 150px; max-width: 150px; align-items: center;" data-id="'.$row->id_urutan_mapel.'">
                    <option value="Umum" '.($row->kel_mapel == 'Umum' ? 'selected' : '').'>Umum</option>
                    <option value="Pilihan" '.($row->kel_mapel == 'Pilihan' ? 'selected' : '').'>Pilihan</option>
                    <option value="Muatan Lokal" '.($row->kel_mapel == 'Muatan Lokal' ? 'selected' : '').'>Muatan Lokal</option>
                </select>
                ';
            })
            ->add('action', function ($row) {
                return '
                    <div class="flex align-items-center list-user-action">
                        <button class="btn btn-sm btn-danger btn-hapus" data-id="'.$row->id_urutan_mapel.'">
                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                            <path d="M3 6H5H21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8 6V4C8 3.44772 8.44772 3 9 3H15C15.5523 3 16 3.44772 16 4V6M19 6V20C19 20.5523 18.5523 21 18 21H6C5.44772 21 5 20.5523 5 20V6M10 11V17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 11V17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 6H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        </button>
                    </div>
                ';
            }, 'last')
            ->toJson(true);
    }

    public function save(){
        $urutanMapelModel = new urutanMapelModel();
        $semesterModel = new semesterModel();
        $no_urutan_mapel = $this->request->getVar('id_mapel');
        $tingkatan = $this->request->getVar('tingkatan_urutan_mapel');
        $semesterAktif = $semesterModel->where('status_semester', '1')->first();
        $kel_mapel = $this->request->getVar('kel_mapel');
        $urutanMapel = $urutanMapelModel
            ->where('id_mapel', $no_urutan_mapel)
            ->where('tingkatan_urutan_mapel', $tingkatan)
            ->where('id_semester', $semesterAktif['id_semester'])
            ->findAll();

        if ($urutanMapel) {
            return $this->response->setJSON([
                'error' => true,
                'data' => 'Data sudah ada',
                'status' => 400,
            ]);
        } else {
            $urutanMapelModel->save([
                'id_mapel' => $no_urutan_mapel,
                'tingkatan_urutan_mapel' => $tingkatan,
                'no_urutan_mapel' => '1',
                'id_semester' => $semesterAktif['id_semester'],
                'kel_mapel' => $kel_mapel,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            return $this->response->setJSON([
                'error' => false,
                'data' => 'Data berhasil disimpan',
                'status' => 200,
            ]);
        }
    }

    public function updateNoUrutanMapel()
    {
        $urutanMapelModel = new urutanMapelModel();
        $id_urutan_mapel = $this->request->getVar('id_urutan_mapel');
        $no_urutan_mapel = $this->request->getVar('no_urutan_mapel');
        
        $urutanMapelModel->update($id_urutan_mapel, [
            'no_urutan_mapel' => $no_urutan_mapel,
        ]);
        
        return $this->response->setJSON([
            'error' => false,
            'data' => 'Data berhasil diubah',
            'status' => 200,
        ]);
    }

    public function updateKelMapel()
    {
        $urutanMapelModel = new urutanMapelModel();
        $id_urutan_mapel = $this->request->getVar('id_urutan_mapel');
        $kel_mapel = $this->request->getVar('kel_mapel');
        
        $urutanMapelModel->update($id_urutan_mapel, [
            'kel_mapel' => $kel_mapel,
        ]);
        
        return $this->response->setJSON([
            'error' => false,
            'data' => 'Data berhasil diubah',
            'status' => 200,
        ]);
    }

    public function delete()
    {
        $urutanMapelModel = new urutanMapelModel();
        $id_urutan_mapel = $this->request->getVar('id_urutan_mapel');
        
        $urutanMapelModel->delete($id_urutan_mapel);
        
        return $this->response->setJSON([
            'error' => false,
            'data' => 'Data berhasil dihapus',
            'status' => 200,
        ]);
    }
}