<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Student extends BaseController
{
    public function index()
    {
        $data['student'] = $this->studentModel->where('email', $_SESSION['current_student'])->join('next_of_kins', 'students.id = next_of_kins.id')->first();

        return view('student/dashboard', $data);
    }

    public function loginChecker()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $student = $this->studentModel->where(
            'email',
            $email
        )->first();
        if ($student && password_verify($password, $student->password)) {

            $this->session->set('current_student', $email);
            $this->session->set(
                'current_student_fullname',
                $student->first_name . ' ' . $student->last_name
            );
            $this->session->set('current_student_id', $student->id);
            $this->session->set('student_logged_in', true);

            $data = [
                'status' => 'success',
                'success_message' => 'Logged In Successfully. Redirecting',
            ];

            echo json_encode($data);
        } else {
            $data = [
                'status' => 'error',
                'error_message' => 'Incorrect Login Details',
            ];

            echo json_encode($data);
        }
    }

    public function registerHandler()
    {
        $email = $this->request->getVar('email');

        $student = $this->studentModel->where(
            'email',
            $email
        )->first();
        if ($student) {
            if ($student->password == null) {
                // send email
                $token_number = mt_rand();
                $token = sha1($token_number);

                $data = [
                    'applicant' => $this->request->getVar('email'),
                    'token' => $token,
                ];

                $token = new \App\Entities\StudentTokens();
                $token->fill($data);

                $this->studentModel->save($token);

                $email = \Config\Services::email();

                $config['charset'] = 'utf-8';
                $config['wordWrap'] = true;
                $config['mailType'] = 'html';

                $email->initialize($config);

                $email_text =
                    "<div>
                          <img src='https://moh.knstate.healthcare/images/logo2.jpg' style='width:100px;height:100px;float:left;' alt='KN PHCMB Logo' />
                          <br>
                          <br>
                           <h1 style='text-align:center;' >EMAIL CONFIRMATION</h1>
                        </div>
      
                        <hr>
                        <div>
                          <p style='font-size:20px;'>
                            Your provide this email as the primary email for your student portal at School of Health Technology Kano. 
                            <br>
                            Click the link below to continue your application
                              <br><a href='https://shtkano.knstate.healthcare/student/setupPassword/" .
                    $this->request->getVar('email') .
                    "/$token/'>Click Here to continue</a>

                        <br>
                        <p>
                            If you see this email by mistake. Disregard the message and delete the mail immediately. Thank you. 
                        </p>
                          </p>
                        </div>
                      </div>";

                $email->setFrom(
                    'noreply@knstate.healthcare',
                    'SHT Kano'
                );
                $email->setTo($this->request->getVar('email'));
                $email->setSubject('Email Confirmation');
                $email->setMessage($email_text);

                $email->send();

                $data = [
                    'status' => 'success',
                    'success_message' => 'A mail has been sent to your email with link to reset your password.',
                ];

                echo json_encode($data);
            } else {
                $data = [
                    'status' => 'error',
                    'error_message' => 'You Have Already Setup Your Password',
                ];

                echo json_encode($data);
            }
        } else {
            $data = [
                'status' => 'error',
                'error_message' => 'Student Didn\'t Exist',
            ];

            echo json_encode($data);
        }
    }

    public function logout()
    {
        session_destroy();
        return redirect()->to('/');
    }
}
