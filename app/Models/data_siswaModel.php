<?php 
namespace App\Models;

use CodeIgniter\Model;

class data_siswaModel extends Model
{
    protected $table = 'data_siswa'; // set tabel
    protected $primaryKey = 'id_data_siswa '; // set primary key
    protected $allowedFields = ['nis_data_siswa','nisn_data_siswa','id_data_siswa', 'nama_lengkap_data_siswa', 'id_data_dapodik', 'jenis_kelamin_data_siswa', 'agama_data_siswa','tempat_lahir_data_siswa','tanggal_lahir_data_siswa', 'shdk_data_siswa', 'anak_ke_data_siswa', 'alamat_data_siswa', 'no_tlp_data_siswa', 'sekolah_asal_data_siswa', 'di_kelas_10_data_siswa', 'tanggal_diterima_data_siswa', 'alamat_orang_tua_data_siswa', 'nama_ayah_data_siswa', 'nama_ibu_data_siswa', 'nomor_ijazah', 'nama_wali_data_siswa', 'alamat_wali_data_siswa', 'pekerjaan_ayah_data_siswa', 'pekerjaan_ibu_data_siswa', 'pekerjaan_wali_data_siswa','status_pengecekan', 'ket_pengecekan', 'created_at', 'updated_at']; // set field yang diizinkan untuk diinputkan
    protected $useTimestamps = true; // set timestamps


    public function get_data_siswa($id = false) // fungsi untuk mengambil data
    {
        if($id === false){
            return $this
            ->select('data_siswa.nis_data_siswa, data_siswa.nomor_ijazah, data_siswa.nisn_data_siswa, data_siswa.nama_lengkap_data_siswa, data_siswa.id_data_siswa, data_siswa.id_data_dapodik, data_siswa.jenis_kelamin_data_siswa, data_siswa.agama_data_siswa, data_siswa.shdk_data_siswa, data_siswa.tempat_lahir_data_siswa, data_siswa.tanggal_lahir_data_siswa, data_siswa.anak_ke_data_siswa, data_siswa.alamat_data_siswa, data_siswa.no_tlp_data_siswa, data_siswa.sekolah_asal_data_siswa, data_siswa.di_kelas_10_data_siswa, data_siswa.tanggal_diterima_data_siswa, data_siswa.alamat_orang_tua_data_siswa, data_siswa.nama_ayah_data_siswa, data_siswa.nama_ibu_data_siswa, data_siswa.nama_wali_data_siswa, data_siswa.alamat_wali_data_siswa, data_siswa.pekerjaan_ayah_data_siswa, data_siswa.pekerjaan_ibu_data_siswa, data_siswa.pekerjaan_wali_data_siswa, data_siswa.created_at, data_siswa.updated_at, data_dapodik.nis_data_dapodik, data_dapodik.id_data_dapodik, data_dapodik.jenis_kelamin_data_dapodik, data_dapodik.agama_data_dapodik, data_dapodik.shdk_data_dapodik, data_dapodik.anak_ke_data_dapodik, data_dapodik.alamat_data_dapodik, data_dapodik.no_tlp_data_dapodik, data_dapodik.sekolah_asal_data_dapodik, data_dapodik.di_kelas_10_data_dapodik, data_dapodik.tanggal_diterima_data_dapodik, data_dapodik.alamat_orang_tua_data_dapodik, data_dapodik.nama_ayah_data_dapodik, data_dapodik.nama_ibu_data_dapodik, data_dapodik.kelas_data_dapodik, data_dapodik.nama_wali_data_dapodik, data_dapodik.alamat_wali_data_dapodik, data_dapodik.pekerjaan_ayah_data_dapodik, data_dapodik.nama_lengkap_data_dapodik, data_dapodik.pekerjaan_ibu_data_dapodik, data_dapodik.pekerjaan_wali_data_dapodik, data_siswa.status_pengecekan, data_siswa.ket_pengecekan, data_dapodik.created_at, data_dapodik.tempat_lahir_data_dapodik, data_dapodik.tanggal_lahir_data_dapodik, data_dapodik.updated_at')
            ->join('data_dapodik', 'data_dapodik.id_data_dapodik = data_siswa.id_data_dapodik');
        } else {
            return $this
            ->select('data_siswa.nis_data_siswa, data_siswa.nomor_ijazah, data_siswa.nisn_data_siswa, data_siswa.nama_lengkap_data_siswa, data_siswa.id_data_siswa, data_siswa.id_data_dapodik, data_siswa.jenis_kelamin_data_siswa, data_siswa.agama_data_siswa, data_siswa.shdk_data_siswa, data_siswa.tempat_lahir_data_siswa, data_siswa.tanggal_lahir_data_siswa, data_siswa.anak_ke_data_siswa, data_siswa.alamat_data_siswa, data_siswa.no_tlp_data_siswa, data_siswa.sekolah_asal_data_siswa, data_siswa.di_kelas_10_data_siswa, data_siswa.tanggal_diterima_data_siswa, data_siswa.alamat_orang_tua_data_siswa, data_siswa.nama_ayah_data_siswa, data_siswa.nama_ibu_data_siswa, data_siswa.nama_wali_data_siswa, data_siswa.alamat_wali_data_siswa, data_siswa.pekerjaan_ayah_data_siswa, data_siswa.pekerjaan_ibu_data_siswa, data_siswa.pekerjaan_wali_data_siswa, data_siswa.created_at, data_siswa.updated_at, data_dapodik.nis_data_dapodik, data_dapodik.id_data_dapodik, data_dapodik.jenis_kelamin_data_dapodik, data_dapodik.agama_data_dapodik, data_dapodik.shdk_data_dapodik, data_dapodik.anak_ke_data_dapodik, data_dapodik.alamat_data_dapodik, data_dapodik.no_tlp_data_dapodik, data_dapodik.sekolah_asal_data_dapodik, data_dapodik.di_kelas_10_data_dapodik, data_dapodik.tanggal_diterima_data_dapodik, data_dapodik.alamat_orang_tua_data_dapodik, data_dapodik.nama_ayah_data_dapodik, data_dapodik.nama_ibu_data_dapodik, data_dapodik.kelas_data_dapodik, data_dapodik.nama_wali_data_dapodik, data_dapodik.alamat_wali_data_dapodik, data_dapodik.pekerjaan_ayah_data_dapodik, data_dapodik.nama_lengkap_data_dapodik, data_dapodik.pekerjaan_ibu_data_dapodik, data_dapodik.pekerjaan_wali_data_dapodik, data_siswa.status_pengecekan, data_siswa.ket_pengecekan, data_dapodik.created_at, data_dapodik.tempat_lahir_data_dapodik, data_dapodik.tanggal_lahir_data_dapodik, data_dapodik.updated_at')
            ->join('data_dapodik', 'data_dapodik.id_data_dapodik = data_siswa.id_data_dapodik')
            ->where('data_siswa.id_data_siswa', $id)
            ->first();
        }
    }
    
    public function getSiswaByKelas($id = false) // fungsi untuk mengambil data
    {
        return $this
        ->select('data_siswa.nis_data_siswa, data_siswa.nomor_ijazah, data_siswa.nisn_data_siswa, data_siswa.nama_lengkap_data_siswa, data_siswa.id_data_siswa, data_siswa.id_data_dapodik, data_siswa.jenis_kelamin_data_siswa, data_siswa.agama_data_siswa, data_siswa.shdk_data_siswa, data_siswa.tempat_lahir_data_siswa, data_siswa.tanggal_lahir_data_siswa, data_siswa.anak_ke_data_siswa, data_siswa.alamat_data_siswa, data_siswa.no_tlp_data_siswa, data_siswa.sekolah_asal_data_siswa, data_siswa.di_kelas_10_data_siswa, data_siswa.tanggal_diterima_data_siswa, data_siswa.alamat_orang_tua_data_siswa, data_siswa.nama_ayah_data_siswa, data_siswa.nama_ibu_data_siswa, data_siswa.nama_wali_data_siswa, data_siswa.alamat_wali_data_siswa, data_siswa.pekerjaan_ayah_data_siswa, data_siswa.pekerjaan_ibu_data_siswa, data_siswa.pekerjaan_wali_data_siswa, data_siswa.created_at, data_siswa.updated_at, data_dapodik.nis_data_dapodik, data_dapodik.id_data_dapodik, data_dapodik.jenis_kelamin_data_dapodik, data_dapodik.agama_data_dapodik, data_dapodik.shdk_data_dapodik, data_dapodik.anak_ke_data_dapodik, data_dapodik.alamat_data_dapodik, data_dapodik.no_tlp_data_dapodik, data_dapodik.sekolah_asal_data_dapodik, data_dapodik.di_kelas_10_data_dapodik, data_dapodik.tanggal_diterima_data_dapodik, data_dapodik.alamat_orang_tua_data_dapodik, data_dapodik.nama_ayah_data_dapodik, data_dapodik.nama_ibu_data_dapodik, data_dapodik.kelas_data_dapodik, data_dapodik.nama_wali_data_dapodik, data_dapodik.alamat_wali_data_dapodik, data_dapodik.pekerjaan_ayah_data_dapodik, data_dapodik.nama_lengkap_data_dapodik, data_dapodik.pekerjaan_ibu_data_dapodik, data_dapodik.pekerjaan_wali_data_dapodik, data_siswa.status_pengecekan, data_siswa.ket_pengecekan, data_dapodik.created_at, data_dapodik.tempat_lahir_data_dapodik, data_dapodik.tanggal_lahir_data_dapodik, data_dapodik.updated_at')
        ->join('data_dapodik', 'data_dapodik.id_data_dapodik = data_siswa.id_data_dapodik')
        ->where('data_dapodik.kelas_data_dapodik', $id)
        ->orderBy('data_siswa.nama_lengkap_data_siswa', 'ASC')
        ->findAll();
    } 
}

?>