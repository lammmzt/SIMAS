<?php 
namespace App\Models;

use CodeIgniter\Model;

class data_dapodikModel extends Model
{
    protected $table = 'data_dapodik'; // set tabel
    protected $primaryKey = 'id_data_dapodik '; // set primary key
    protected $allowedFields = ['nis_data_dapodik','id_data_dapodik', 'kelas_data_dapodik', 'nama_lengkap_data_dapodik', 'jenis_kelamin_data_dapodik', 'agama_data_dapodik', 'shdk_data_dapodik', 'tanggal_lahir_data_dapodik', 'tempat_lahir_data_dapodik', 'anak_ke_data_dapodik', 'alamat_data_dapodik', 'no_tlp_data_dapodik', 'sekolah_asal_data_dapodik', 'di_kelas_10_data_dapodik', 'tanggal_diterima_data_dapodik', 'alamat_orang_tua_data_dapodik', 'nama_ayah_data_dapodik', 'nama_ibu_data_dapodik', 'nama_wali_data_dapodik', 'alamat_wali_data_dapodik', 'pekerjaan_ayah_data_dapodik', 'pekerjaan_ibu_data_dapodik', 'pekerjaan_wali_data_dapodik', 'created_at', 'updated_at']; // set field yang diizinkan untuk diinputkan
    protected $useTimestamps = true; // set timestamps


    public function get_data_dapodik($id = false) // fungsi untuk mengambil data
    {
        if($id === false){
            return $this
            ->select('data_dapodik.nis_data_dapodik,data_dapodik.nama_lengkap_data_dapodik, data_dapodik.id_data_dapodik, data_dapodik.tempat_lahir_data_dapodik, data_dapodik.tanggal_lahir_data_dapodik, data_dapodik.jenis_kelamin_data_dapodik, data_dapodik.agama_data_dapodik, data_dapodik.shdk_data_dapodik, data_dapodik.anak_ke_data_dapodik, data_dapodik.alamat_data_dapodik, data_dapodik.no_tlp_data_dapodik, data_dapodik.sekolah_asal_data_dapodik, data_dapodik.di_kelas_10_data_dapodik, data_dapodik.tanggal_diterima_data_dapodik, data_dapodik.alamat_orang_tua_data_dapodik, data_dapodik.nama_ayah_data_dapodik, data_dapodik.nama_ibu_data_dapodik, data_dapodik.nama_wali_data_dapodik, data_dapodik.alamat_wali_data_dapodik, data_dapodik.pekerjaan_ayah_data_dapodik, data_dapodik.pekerjaan_ibu_data_dapodik, data_dapodik.pekerjaan_wali_data_dapodik, data_dapodik.created_at, data_dapodik.updated_at')
            ->orderBy('data_dapodik.nama_lengkap_data_dapodik', 'ASC')
            ->findAll();
        } else {
            return $this->where(['id_data_dapodik' => $id])->first();
        }   
    }
}

?>