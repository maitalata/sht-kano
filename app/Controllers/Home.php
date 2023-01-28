<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        //dd($_SESSION['student_logged_in']);
        return view('home');
    }
}
