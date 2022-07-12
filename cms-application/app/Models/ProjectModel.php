<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'tbl_projects';
    // .. other member variables
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        // OR $this->db = db_connect();
    }

    public function insert_data($tbl_name, $data = array())
    {
        $this->db->table($tbl_name)->insert($data);
        return $this->db->insertID();
    }

    public function update_data($id, $tbl_name, $data = array())
    {
        $this->db->table($this->table)->update($data, array(
            "id" => $id,
        ));
        return $this->db->affectedRows();
    }

    public function delete_data($id)
    {
        return $this->db->table($this->table)->delete(array(
            "id" => $id,
        ));
    }

    public function get_data($tbl_name, $arr){

        $query = $this->db->table($tbl_name)->select()->where($arr)->get()->getResult();

        // echo $this->db->getLastQuery(); die;
        return $query;
    }

    public function get_all_data()
    {
        $query = $this->db->query('select * from ' . $this->table);
        return $query->getResult();
    }
}