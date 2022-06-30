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

    public function logout() 
    {
        return view('logout');
    }

    public function register() 
    {
        return view('register');
    }
    public function recover_password()
    {
        return view('recover_password');
    }
    
}
