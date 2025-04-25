<?php 
namespace App\Models;

use CodeIgniter\Model;

class urutanMapelModel extends Model
{
    protected $table = 'urutan_mapel';
    protected $primaryKey = 'id_urutan_mapel';
    protected $allowedFields = ['tingkatan_urutan_mapel', 'id_semester', 'id_mapel', 'no_urutan_mapel', 'kel_mapel','created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getUrutanMapel($id = false)
    {
        if ($id === false) {
            return $this
            ->select('urutan_mapel.id_urutan_mapel, urutan_mapel.kel_mapel, urutan_mapel.tingkatan_urutan_mapel, urutan_mapel.id_semester, urutan_mapel.id_mapel, urutan_mapel.no_urutan_mapel, mapel.nama_mapel, semester.nama_semester, semester.tahun_ajaran')
            ->join('mapel', 'mapel.id_mapel = urutan_mapel.id_mapel')
            ->join('semester', 'semester.id_semester = urutan_mapel.id_semester');
        } else {
            return $this
            ->select('urutan_mapel.id_urutan_mapel, urutan_mapel.tingkatan_urutan_mapel, urutan_mapel.kel_mapel, urutan_mapel.id_semester, urutan_mapel.id_mapel, urutan_mapel.no_urutan_mapel, mapel.nama_mapel, semester.nama_semester, semester.tahun_ajaran')
            ->join('mapel', 'mapel.id_mapel = urutan_mapel.id_mapel')
            ->join('semester', 'semester.id_semester = urutan_mapel.id_semester')
            ->where(['urutan_mapel.id_urutan_mapel' => $id])->first();   
        }
    }

    public function getUrutanMapelBySemesterAndTingkatan($semester, $tingkatan)
    {
        return $this
        ->select('urutan_mapel.id_urutan_mapel,mapel.kode_mapel, urutan_mapel.kel_mapel, urutan_mapel.tingkatan_urutan_mapel, urutan_mapel.id_semester, urutan_mapel.id_mapel, urutan_mapel.no_urutan_mapel, mapel.nama_mapel, semester.nama_semester, semester.tahun_ajaran')
        ->join('mapel', 'mapel.id_mapel = urutan_mapel.id_mapel')
        ->join('semester', 'semester.id_semester = urutan_mapel.id_semester')
        ->where(['urutan_mapel.id_semester' => $semester, 'urutan_mapel.tingkatan_urutan_mapel' => $tingkatan]);
    }
}

?>