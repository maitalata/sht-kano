<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Management extends BaseController
{
    public function index()
    {
        if (auth()->loggedIn()) {
            return view('management/dashboard');
        } else {
            return redirect()->to('manage');
        }
    }


    public function addStudent()
    {
        return view('management/add_student');
    }

}
