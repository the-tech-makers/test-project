<?php

namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\AuthModel;

class Auth extends BaseController
{

 // protected $request;

 public function __construct()
 {
     // $this->request = $request;
     $this->AuthModel = new AuthModel();

     $this->session = \Config\Services::session($config);
     $this->session->start();

 }

    public function index()
    {
        return view('welcome_message');
    }

    public function login() 
    {
        return view('login');
    }

    public function login_post(){

        $table_name = 'admin_lte';

        
        $user_name = $_POST['email'];
        $password = md5($_POST['password']);

        $where = array('email' => $user_name, 'password' => $password);

        echo "<pre>"; print_r($where); echo "</pre>"; die;

        // Getting data

        $get_data = $this->AuthModel->get_data($table_name, $where);
    
        if($get_data){
            $user_id = $get_data[0]->id;

            if($user_id != ''){
                // echo $user_id; die;
                $this->session->set('user_id', $user_id);
                return redirect()->route('dashboard');
                // redirect to dashboard;
            }else{ echo "Error"; die;
                return redirect()->route('/login');
            }
        }else{
            return redirect()->route('login');
        }
       
    }


    public function logout() 
    {
        return view('logout');
    }

   

    // Register

    public function register() 
    {
        return view('register');
    }

    
    public function register_post(){

        $table_name = 'admin_lte';


        $name = $_POST['name'];
        $user_name = $_POST['email'];
        $status = 1;
        $password = md5($_POST['password']);
        $conf_password = md5($_POST['conf_password']);
        $add_time = date('Y-m-d h:i:s');


        if( $password !=  $conf_password ){
            echo "Password and confirm password is not same.";
        }else{

        $where = array('name' => $name, 'email' => $user_name, 'password' => $password, 'status' => $status, 'added_on' => $add_time, 'modified_on' => $add_time);

        // echo "<pre>"; print_r($where); echo "</pre>"; die;

        // Getting data

        $get_data = $this->AuthModel->insert_data($table_name, $where);

            
        // echo $get_data; die;
        if($get_data != ''){
            // $this->load->view('Register successfully');
            // if ($insert_data->query($get_data)) {
                // $this->session->set_flashdata('msg', 'Registered successfully.');    
        } else{
            echo "Could not registered record into table:";
            // $this->load->model('AuthModel');
            // $this->session->set_flashdata('msg', 'Could not registered record into table:');

            return redirect()->route('register');
        }
    }
  
       
    }





    public function recover_password()
    {
        return view('recover_password');
    }
    
}
