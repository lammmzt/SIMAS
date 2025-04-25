<?php 
namespace App\Models;

use CodeIgniter\Model;

class nilai_raporModel extends Model
{
    protected $table = 'nilai_rapor';
    protected $primaryKey = 'id_nilai_rapor';
    protected $allowedFields = ['id_nilai_rapor', 'id_mapel', 'tipe_nilai','id_data_dapodik','id_semester', 'nilai_rapor', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getNilaiRapor($id = false)
    {
        if ($id === false) {
            return $this
            ->select('nilai_rapor.id_nilai_rapor,nilai_rapor.tipe_nilai, nilai_rapor.id_mapel, nilai_rapor.id_data_dapodik, nilai_rapor.id_semester, nilai_rapor.nilai_rapor, mapel.nama_mapel, semester.nama_semester, semester.tahun_ajaran, data_dapodik.nama_lengkap_data_dapodik, data_dapodik.nis_data_dapodik, data_dapodik.kelas_data_dapodik')
            ->join('mapel', 'mapel.id_mapel = nilai_rapor.id_mapel')
            ->join('semester', 'semester.id_semester = nilai_rapor.id_semester')
            ->join('data_dapodik', 'data_dapodik.id_data_dapodik = nilai_rapor.id_data_dapodik');
            
        } else {
            return $this
            ->select('nilai_rapor.id_nilai_rapor,nilai_rapor.tipe_nilai, nilai_rapor.id_mapel, nilai_rapor.id_data_dapodik, nilai_rapor.id_semester, nilai_rapor.nilai_rapor, mapel.nama_mapel, semester.nama_semester, semester.tahun_ajaran, data_dapodik.nama_lengkap_data_dapodik, data_dapodik.nis_data_dapodik, data_dapodik.kelas_data_dapodik')
            ->join('mapel', 'mapel.id_mapel = nilai_rapor.id_mapel')
            ->join('semester', 'semester.id_semester = nilai_rapor.id_semester')
            ->join('data_dapodik', 'data_dapodik.id_data_dapodik = nilai_rapor.id_data_dapodik')
            ->where(['nilai_rapor.id_nilai_rapor' => $id])->first();
            
        }
    }

    public function getNilaiBySiswa($id_dapodik, $id_semester = false)
    {
        if ($id_semester === false) {
            return $this
            ->select('nilai_rapor.id_nilai_rapor, nilai_rapor.tipe_nilai, nilai_rapor.id_mapel, nilai_rapor.id_data_dapodik, nilai_rapor.id_semester, nilai_rapor.nilai_rapor, mapel.nama_mapel, semester.nama_semester, semester.tahun_ajaran, data_dapodik.nama_lengkap_data_dapodik, data_dapodik.nis_data_dapodik, data_dapodik.kelas_data_dapodik' )
            ->join('mapel', 'mapel.id_mapel = nilai_rapor.id_mapel')
            ->join('semester', 'semester.id_semester = nilai_rapor.id_semester')
            ->join('data_dapodik', 'data_dapodik.id_data_dapodik = nilai_rapor.id_data_dapodik')
            ->where(['nilai_rapor.id_data_dapodik' => $id_dapodik])
            ->orderBy('nilai_rapor.id_semester', 'ASC');
        } else {
            return $this
            ->select('nilai_rapor.id_nilai_rapor, nilai_rapor.tipe_nilai, nilai_rapor.id_mapel, nilai_rapor.id_data_dapodik, nilai_rapor.id_semester, nilai_rapor.nilai_rapor, mapel.nama_mapel, semester.nama_semester, semester.tahun_ajaran, data_dapodik.nama_lengkap_data_dapodik, data_dapodik.nis_data_dapodik, data_dapodik.kelas_data_dapodik')
            ->join('mapel', 'mapel.id_mapel = nilai_rapor.id_mapel')
            ->join('semester', 'semester.id_semester = nilai_rapor.id_semester')
            ->join('data_dapodik', 'data_dapodik.id_data_dapodik = nilai_rapor.id_data_dapodik')
            ->where(['nilai_rapor.id_data_dapodik' => $id_dapodik, 'nilai_rapor.id_semester' => $id_semester]);
        }
    }

    public function getNilaiByKelas($id_kelas){
        return $this
        ->select('nilai_rapor.id_nilai_rapor, nilai_rapor.tipe_nilai, nilai_rapor.id_mapel, nilai_rapor.id_data_dapodik, nilai_rapor.id_semester, nilai_rapor.nilai_rapor, mapel.nama_mapel, mapel.kode_mapel, urutan_mapel.no_urutan_mapel, urutan_mapel.kel_mapel, semester.nama_semester, semester.tahun_ajaran, data_dapodik.nama_lengkap_data_dapodik, data_dapodik.nama_ayah_data_dapodik, data_dapodik.tempat_lahir_data_dapodik, data_dapodik.tanggal_lahir_data_dapodik, data_dapodik.nis_data_dapodik, data_dapodik.kelas_data_dapodik')
        ->join('mapel', 'mapel.id_mapel = nilai_rapor.id_mapel')
        ->join('urutan_mapel', 'urutan_mapel.id_mapel = mapel.id_mapel')
        ->join('semester', 'semester.id_semester = nilai_rapor.id_semester')
        ->join('data_dapodik', 'data_dapodik.id_data_dapodik = nilai_rapor.id_data_dapodik')
        ->where(['data_dapodik.kelas_data_dapodik' => $id_kelas]);
    }
}
?>