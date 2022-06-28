<?php
require_once 'db.php';

date_default_timezone_set('Asia/Kolkata');

// session_start();

if(isset($_POST['register_user'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $conf_password = md5($_POST['conf_password']);
    $add_time = date('Y-m-d h:i:s');

    if( $password !=  $conf_password ){
        echo "Password and confirm password is not same.";
    }else{
        echo "User is already registered with this email id. Please try with anohter email id."; die;
        $admin_query = "INSERT INTO admin_lte (id, name, email, password, status, added_on, modified_on) VALUES ('', '$name', '$email', '$password', '1', '$add_time', '$add_time')";

        if ($mysqli->query($admin_query)) {
            $_SESSION['message'] = "Registered successfully.";
        }

        if ($mysqli->erron){
            $_SESSION['message'] = "Could not registered record into table: ". $mysqli->error;
        }

        header("Location: register.php");
    }
}

if(isset($_POST['login_user'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if( !empty($email) && !empty($password) ){
        $password = md5($password);
        $admin_query = "SELECT * FROM admin_lte WHERE email='$email' AND password = '$password'" ;
        $get_row = $mysqli->query( $admin_query);

        $total_records = $get_row->num_rows;

        if( $total_records == 0 ){
            echo "email and password are not correct.";
        }else{
            while ( $user_data = $get_row->fetch_assoc() ) {

                $user_id = $user_data['id'];
                $user_name = $user_data['name'];
                $user_email = $user_data['email'];

                $_SESSION['user_id'] = $user_id;
                $_SESSION['name'] = $user_name;
                $_SESSION['email'] = $user_email;
            }
        
            header("Location: dashboard.php");

        }
    }else{
        echo "Email and password cannot be blank.";
    }
}  

if(isset($_POST['create_user'])){
    $project_name = $_POST['project_name'];
    $project_desc = $_POST['project_desc'];
    $project_status = $_POST['project_status'];
    $client_company = $_POST['client_company'];
    $project_leader = $_POST['project_leader'];
    $estimated_budget = $_POST['estimated_budget'];
    $total_amount = $_POST['total_amount'];
    $estimated_project_duration = $_POST['estimated_project_duration'];
    $add_time = date('Y-m-d H:i:s');
    
    $project_query = "INSERT INTO tbl_projects (project_name, project_desc, `status`, client_company, project_leader, estimated_budget, total_amount, estimated_project_duration, added_on, modified_on) VALUES ( '$project_name', '$project_desc' , '$project_status', '$client_company', '$project_leader', '$estimated_budget', '$total_amount', '$estimated_project_duration', '$add_time', '$add_time')";


        if ($mysqli->query($project_query)) {
            $_SESSION['message'] = "Record inserted successfully.";
            header("Location: project.php"); 
        }

        if ($mysqli->errno) {
            $_SESSION['message'] = "Could not insert record into table: ". $mysqli->error;
        }

        header("Location: project_add.php");  

}


// Edit/Update data

if(isset($_POST['update_project'])){
    // echo "<pre>";
    //     print_r($_POST);
    //     echo "</pre>"; die;

    $id = $_POST['id'];
    $project_name = $_POST['project_name'];
    $project_desc = $_POST['project_desc'];
    $client_company = $_POST['client_company'];
    $project_leader = $_POST['project_leader'];
    $estimated_budget = $_POST['estimated_budget'];
    $total_amount = $_POST['total_amount'];
    $estimated_project_duration = $_POST['estimated_project_duration'];
    $add_time = date('Y-m-d H:i:s');

    $admin_query = "UPDATE tbl_projects SET 
    project_name = '$project_name', 
    project_desc = '$project_desc', 
    client_company = '$client_company',
    project_leader = '$project_leader', 
    estimated_budget = '$estimated_budget',  
    total_amount = '$total_amount', 
    estimated_project_duration = '$estimated_project_duration'   
    WHERE id = '$id'";


   if ($mysqli->query($admin_query)) {
    $_SESSION['message'] = "Record updated successfully. ";
    header("Location: project.php");
   }

   if ($mysqli->errno) {
    $_SESSION['message'] = "Could not update record into table: ". $mysqli->error;

   }

   header("Location: project_edit.php");
}



    //Delete table

if(isset($_POST['delete_btn'])){
    $id = $_POST['project_id'];
    if($id != 'user_data'){
    echo "Delete the record";
    }else{
        echo "Show an errror that project_id cannot be blank";
    }

    $admin_query = " DELETE FROM tbl_projects WHERE id = '$id' ";

    $res = $mysqli->query( $admin_query );

    if( $res ){
        $_SESSION["message"] = "Record deleted Successfully!";
    }

    header('location: project.php');
}

// if(isset($_POST['add_project'])){

// }

