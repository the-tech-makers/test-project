<?php

namespace App\Controllers;

class Project extends BaseController
{
    public function index()
    { 
        return view('welcome_message');
    }
    public function dashboard(){
        return view('dashboard');
    }

    public function add_project(){
        return view('add_project');
    }

    public function main_project(){
        return view('main_project');
    }

    public function project_edit(){
        return view('project_edit');
    }

    public function project_detail(){
        return view('project_detail');
    }
    
}
