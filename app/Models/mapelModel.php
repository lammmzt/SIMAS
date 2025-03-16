<?php 
namespace App\Models;

use CodeIgniter\Model;

class mapelModel extends Model
{
    protected $table = 'mapel';
    protected $primaryKey = 'id_mapel';
    protected $allowedFields = ['id_mapel', 'kode_mapel', 'nama_mapel', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getMapel($id = false)
    {
        if ($id === false) {
            return $this
            ->select('id_mapel, kode_mapel, nama_mapel');
        } else {
            return $this->where(['id_mapel' => $id])->first();
        }
    }
}

?>