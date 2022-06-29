<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function login() 
    {
        return view('login');
    }

    public function register() 
    {
        return view('register');
    }
    
}
