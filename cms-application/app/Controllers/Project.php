<?php

namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\ProjectModel;

class Project extends BaseController
{

    // protected $request;

 public function __construct()
 {
     // $this->request = $request;
     $this->ProjectModel = new ProjectModel();

     $this->session = \Config\Services::session($config);
     $this->session->start();

 }

    public function dashboard(){
        return view('dashboard');
    }

    public function add_project(){
        return view('add_project');
    }

    public function add_project_post(){

    $table_name = 'tbl_projects';
    $project_name = $_POST['project_name'];
    $project_desc = $_POST['project_desc'];
    $project_status = $_POST['project_status'];
    $client_company = $_POST['client_company'];
    $project_leader = $_POST['project_leader'];
    $estimated_budget = $_POST['estimated_budget'];
    $total_amount = $_POST['total_amount'];
    $estimated_project_duration = $_POST['estimated_project_duration'];
    $add_time = date('Y-m-d H:i:s');
    

    $where = array ('project_name' => $project_name, 'project_desc' => $project_desc, 'status'=> $project_status, 'client_company' => $client_company, 'project_leader' => $project_leader, 'estimated_budget' => $estimated_budget, 'total_amount' => $total_amount, 'estimated_project_duration' => $estimated_project_duration, 'added_on' => $add_time, 'modified_on' => $add_time); 
    

    $get_data = $this->ProjectModel->insert_data($table_name, $where);

    if($get_data != '') {

        return redirect()->route('main_project');
       
    }else{

        return redirect()->route('add_project');
    }
}


    

    public function main_project(){

        $where = array();
        $data = array();
        $table_name = 'tbl_projects';

        $get_data = $this->ProjectModel->get_data($table_name, $where);

       if($get_data){
        $data['result'] = $get_data;
       }
        return view('main_project', $data);
    }

    








    public function project_edit(){
        return view('project_edit');
    }

    public function project_detail(){
        return view('project_detail');
    }
    
}
