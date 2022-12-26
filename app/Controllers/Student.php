<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Student extends BaseController
{
    public function index()
    {
        return view('student/dashboard');
    }

    public function loginChecker()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $student = $this->studentModel->where(
            'email', $email
        )->first();
        if ($student && password_verify($password, $student->password)) {

            $this->session->set('current_student', $email);
            $this->session->set(
                'current_student_fullname',
                $student->first_name.' '.$student->last_name
            );
            $this->session->set('current_student_id', $student->id);
            $this->session->set('student_logged_in', true);
            return redirect()->to('/board');
        } else {
            $data = [
                'status' => 'error',
                'error_message' => 'Incorrect Login Details',
            ];
            
            echo json_encode($data);
        }
    }


}
