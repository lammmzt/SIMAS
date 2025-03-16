<?php 
namespace App\Models;

use CodeIgniter\Model;

class semesterModel extends Model
{
    protected $table = 'semester';
    protected $primaryKey = 'id_semester';
    protected $allowedFields = ['id_semester', 'tahun_ajaran', 'nama_semester', 'status_semester','created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getSemester($id = false)
    {
        if ($id === false) {
            return $this
            ->select('id_semester, tahun_ajaran, nama_semester, status_semester');
        } else {
            return $this->where(['id_semester' => $id])->first();
        }
    }
}

?>