<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Management extends BaseController
{
    public function index()
    {
        return view('management/dashboard');
    }


    public function addStudent()
    {
        return view('management/add_student');
    }

    public function pullStudent()
    {
        return view('management/add_from_applicants');
    }

}
