<?php

namespace App\Models;

use CodeIgniter\Model;

class TimesheetModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'timesheetdata';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['entity_email','entity_name','entity_location','start_time','end_time','hours_worked','cost_per_head','milage'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function updateTimesheetData($entity_email, $location, $created_at, $data)
    {
       $builder = $this->db->table('timesheetdata');
       $builder->update($data, ['entity_email' => $entity_email, 'entity_location' => $location, 'date(created_at)' => $created_at] );
    }

    public function deleteTimesheetData($entity_email, $location, $created_at)
    {
       $builder = $this->db->table('timesheetdata');
       $builder->delete(['entity_email' => $entity_email, 'entity_location' => $location, 'date(created_at)' => $created_at] );
    }

    public function getTimesheetData($entity_email)
    {
        $db = db_connect();
        $query = $db->query("select entity_email,entity_name,entity_location,start_time,end_time,hours_worked,cost_per_head,milage,created_at from timesheetdata where month(created_at)=month(now())-1 AND entity_email='$entity_email'");
        $result = $query->getResultArray();
        return $result;       
    }

    public function checkEmailexist($entity_email, $date)
    {
       $db = db_connect();
        $query = $db->query("select * from timesheetdata where entity_email='$entity_email' and date(created_at) = '$date'");
        $result = $query->getRow();
        return $result;     
    }
}
//select * from timesheetdata where month(created_at)=month(now())-1