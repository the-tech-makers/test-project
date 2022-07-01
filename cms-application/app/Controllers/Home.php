<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    { echo "This is for test."; die;
        return view('welcome_message');
    }
   
}
