<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use tcpdf;

class Student extends BaseController
{
    public function index()
    {
        $data['student'] = $this->studentModel->where('email', $_SESSION['current_student'])->first();

        return view('student/dashboard', $data);
    }

    public function passport()
    {
        return view('student/passport');
    }

    public function res()
    {
        return view('student/res');
    }

    public function paymentVerify()
    {
        $payment_details = $this->examinationPaymentModel->where('student', $_SESSION['current_student_id'])->first();

        $applicant_details = $this->studentModel->find($_SESSION['current_student_id']);

        $secret_key = "sk_live_3c90121980dd2f20d37c9370cf4a2066ff13cf37";


        if ($payment_details) {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://api.paystack.co/transaction/verify/' . $payment_details->payment_reference,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer ' . $secret_key . '',
                    'Cache-Control: no-cache',
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            //echo $response->status;

            $response = json_decode($response);

            if ($response->status) {
                if ($response->data->status == 'success') {
                    $this->session->setFlashdata('success', 'Your payment has been verified successfully by our server. You can print your exam card now.');

                    $pay_data = $this->examinationPaymentModel->select("examination_payments.id AS pay_id ")->where('student', $_SESSION['current_student_id'])->join('students', 'students.id = examination_payments.student')->first();

                  
                    $this->examinationPaymentModel->where('id', $pay_data->pay_id)->set(['payment_status' => 'Paid'])->update();
                    
                     //dd($pay_data);

                    // $this->examinationPaymentModel->update($pay_data->id, $data);


                    // $this->home_model->update_applicant_payment($applicant, $data = ['payment' => 'PAID']);
                    return redirect()->to('studentDashboard/');
                } else {
                    $this->session->setFlashdata('errors', array('Your Payment Could Not Be Verified.'));
                    return redirect()->to('pay/');
                }
            } else {
                $this->session->setFlashdata('errors', array('Make Your Exam Paymentc.'));
                return redirect()->to('pay/');
            }
        }
    }

    public function pay()
    {
        $data['payment_details'] = $this->examinationPaymentModel->where('student', $_SESSION['current_student_id'])->join('students', 'students.id = examination_payments.student')->first();

        return view('student/pay', $data);
    }

    public function payAcceptance()
    {
        $data['payment_details'] = $this->acceptanceFeesModel->where('student', $_SESSION['current_student_id'])->join('students', 'students.id = acceptance_fees.student')->first();

        $payment_details = $this->acceptanceFeesModel->where('student', $_SESSION['current_student_id'])->first();

        $applicant_details = $this->studentModel->find($_SESSION['current_student_id']);

        $secret_key = "sk_live_3c90121980dd2f20d37c9370cf4a2066ff13cf37";


        if ($payment_details) {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://api.paystack.co/transaction/verify/' . $payment_details->payment_reference,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer ' . $secret_key . '',
                    'Cache-Control: no-cache',
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            //echo $response->status;

            $response = json_decode($response);

            if ($response->status) {
                if ($response->data->status == 'success') {
                    $this->session->setFlashdata('success', 'Your acceptane fee has been verified successfully by our server.');

                    $pay_data = $this->acceptanceFeesModel->select("acceptance_fees.id AS pay_id ")->where('student', $_SESSION['current_student_id'])->join('students', 'students.id = acceptance_fees.student')->first();

                  
                    $this->acceptanceFeesModel->where('id', $pay_data->pay_id)->set(['status' => 'Paid'])->update();
                    
                     //dd($pay_data);

                    // $this->examinationPaymentModel->update($pay_data->id, $data);


                    // $this->home_model->update_applicant_payment($applicant, $data = ['payment' => 'PAID']);
                    return redirect()->to('studentDashboard/');
                } else {
                    $this->session->setFlashdata('errors', array('Your Payment Could Not Be Verified.'));
                    //return redirect()->to('pay/');
                }
            } else {
                $this->session->setFlashdata('errors', array('Make Your Acceptance Payment.'));
                //return redirect()->to('pay/');
            }
        }

        return view('student/pay_acceptance', $data);
    }

    public function payMedical()
    {
        $data['payment_details'] = $this->medicalFeesModel->where('student', $_SESSION['current_student_id'])->join('students', 'students.id = medical_fees.student')->first();

        $payment_details = $this->medicalFeesModel->where('student', $_SESSION['current_student_id'])->first();

        $applicant_details = $this->studentModel->find($_SESSION['current_student_id']);

        $secret_key = "sk_live_3c90121980dd2f20d37c9370cf4a2066ff13cf37";


        if ($payment_details) {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://api.paystack.co/transaction/verify/' . $payment_details->payment_reference,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer ' . $secret_key . '',
                    'Cache-Control: no-cache',
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            //echo $response->status;

            $response = json_decode($response);

            if ($response->status) {
                if ($response->data->status == 'success') {
                    $this->session->setFlashdata('success', 'Your medical fee has been verified successfully by our server.');

                    $pay_data = $this->medicalFeesModel->select("medical_fees.id AS pay_id ")->where('student', $_SESSION['current_student_id'])->join('students', 'students.id = medical_fees.student')->first();

                  
                    $this->medicalFeesModel->where('id', $pay_data->pay_id)->set(['status' => 'Paid'])->update();
                    
                     //dd($pay_data);

                    // $this->examinationPaymentModel->update($pay_data->id, $data);


                    // $this->home_model->update_applicant_payment($applicant, $data = ['payment' => 'PAID']);
                    return redirect()->to('studentDashboard/');
                } else {
                    $this->session->setFlashdata('errors', array('Your Payment Could Not Be Verified.'));
                    //return redirect()->to('pay/');
                }
            } else {
                $this->session->setFlashdata('errors', array('Make Your Medical Payment.'));
                //return redirect()->to('pay/');
            }
        }

        return view('student/pay_medical', $data);
    }

    public function payRegistration()
    {
        $steps = $this->registrationStepsModel->where('student', $_SESSION['current_student_id'])->first();

        if ($steps->stage == null) {
            $this->session->setFlashdata('errors', ['Make Sure You Make Acceptance and Registration Payments, then go to the Bursary for Confirmation.']);
            return redirect()->to('res');
        }

        if ($steps->stage == 'Confirmed Medical and Acceptance Fees By Bursary') {
            $this->session->setFlashdata('errors', ['Your Medical and Acceptance Fees Has Been Verfied By The Bursary. But The Admission Office Did Not Verify Your Credentials. Your Credentials Must Be Verified Before You Make Your Registration Payment']);
            return redirect()->to('res');
        }

        $data['payment_details'] = $this->registrationPaymentModel->where('students', $_SESSION['current_student_id'])->join('students', 'students.id = registration_payments.students')->first();

        $payment_details = $this->registrationPaymentModel->where('students', $_SESSION['current_student_id'])->first();

        $applicant_details = $this->studentModel->find($_SESSION['current_student_id']);

        $secret_key = "sk_live_3c90121980dd2f20d37c9370cf4a2066ff13cf37";


        if ($payment_details) {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://api.paystack.co/transaction/verify/' . $payment_details->payment_reference,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer ' . $secret_key . '',
                    'Cache-Control: no-cache',
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            //echo $response->status;

            $response = json_decode($response);

            if ($response->status) {
                if ($response->data->status == 'success') {
                    $this->session->setFlashdata('success', 'Your Registration Payment has been verified successfully by our server.');

                    $pay_data = $this->registrationPaymentModel->select("medical_fees.id AS pay_id ")->where('students', $_SESSION['current_student_id'])->join('students', 'students.id = registration_payments.students')->first();

                  
                    $this->registrationPaymentModel->where('id', $pay_data->pay_id)->set(['status' => 'Paid'])->update();
                    
                     //dd($pay_data);

                    // $this->examinationPaymentModel->update($pay_data->id, $data);


                    // $this->home_model->update_applicant_payment($applicant, $data = ['payment' => 'PAID']);
                    return redirect()->to('studentDashboard/');
                } else {
                    $this->session->setFlashdata('errors', array('Your Payment Could Not Be Verified.'));
                    //return redirect()->to('pay/');
                }
            } else {
                $this->session->setFlashdata('errors', array('Make Your Registration Payment.'));
                //return redirect()->to('pay/');
            }
        }

        return view('student/pay_registration', $data);
    }

    public function savePassport()
    {
        helper(['form', 'url']);

        $validation = \Config\Services::validation();

        $validation->setRules(
            [
                'credential' => [
                    'label' => 'Profile Picture',
                    'rules' => 'uploaded[passport]'
                        . '|mime_in[passport,image/jpg,image/jpeg]'
                        . '|max_size[passport,1000]',
                    'errors' => [
                        'mime_in' => 'File must be jpg',
                        'max_size' => 'File size must not exceed 1MB',
                    ],
                ],
            ]
        );

        if ($validation->withRequest($this->request)->run()) {

            if (file_exists("uploads/students/passport_" . $_SESSION['current_student_id'] . "_.jpg")) {
                unlink('uploads/students/passport_' . $_SESSION['current_student_id'] . '_.jpg');
            }

            $img = $this->request->getFile('passport');

            if (!$img->hasMoved()) {

                $photo_name = "passport_" . $_SESSION['current_student_id'] . "_.jpg";

                $img->move('uploads/students/', $photo_name);
            } else {
                $this->session->setFlashdata('errors', array('File cannot be moved'));
                return redirect()->to('passport');
            }

            return redirect()->to('passport');
        } else {
            $this->session->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('passport');
        }
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
                $student->fullname
            );
            $this->session->set('current_student_id', $student->id);
            $this->session->set('is_new', $student->is_new);
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
                $token_string = sha1($token_number);

                $data = [
                    'student' => $student->id,
                    'token' => $token_string,
                    'token_type' => 'Password Setup',
                ];

                $token = new \App\Entities\StudentTokens();
                $token->fill($data);

                $this->tokenModel->save($token);

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
                              <br><a href='https://shtkano.knstate.healthcare/setupPassword/" .
                    $student->id .
                    "/$token_string/'>Click Here to continue</a>

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
                $email->setTo($student->email);
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

    public function util()
    {
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
                              <br><a href='https://shtkano.knstate.healthcare/student/setupPassword'>Click Here to continue</a>

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

        $email->setTo("maitalata@gmail.com");
        $email->setSubject('Email Confirmation');
        $email->setMessage($email_text);

        $email->send();

        $data = [
            'status' => 'success',
            'success_message' => 'A mail has been sent to your email with link to reset your password.',
        ];

        echo json_encode($data);
    }

    public function examCard()
    {
        $student = $this->studentModel->where(['id' => $_SESSION['current_student_id']])->first();

        if ($student->session_fee != "Paid") {
            $this->session->setFlashdata('errors', ['You Did Not Pay Your Session Fee']);
            return redirect()->to('res');
        }

        $examPayment = $this->examinationPaymentModel->where(['student' => $_SESSION['current_student_id']])->first();

        if (!$examPayment) {
            $data = [
                'student' => $student->id,
                'year' => '2023',
                'semester' => 'First',
                'payment_reference' => 'SHTK' . $student->id . "-EXAM" . mt_rand(1, 1000) . '-' . mt_rand(1000000, 9999999),
                'payment_status' => 'NOT PAID',
            ];

            $payment = new \App\Entities\ExaminationPayments();
            $payment->fill($data);

            $this->examinationPaymentModel->save($payment);

            $this->session->setFlashdata('success', 'Your Payment Reference Has Been Generated Click The Button Below To Pay');
            return redirect()->to('pay'); 
        } else {
            $examPayment = $this->examinationPaymentModel->where(['student' => $_SESSION['current_student_id']])->first();  
            
            

            if ($examPayment->payment_status != "Paid") {
                 return redirect()->to('paymentVerify');
                $this->session->setFlashdata('success', 'Your Payment Reference Has Been Generated Click The Button Below To Pay');
                return redirect()->to('pay');
            } 
        }

        // Include the main TCPDF library (search for installation path).
        require_once(realpath('/home/accurane/projects/sht/vendor/tecnickcom/tcpdf/examples/tcpdf_include.php'));

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 002');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 20);

        // add a page
        $pdf->AddPage();

        // set some text to print
        //         $txt = <<<EOD
        // TCPDF Example 002

        // Default page header and footer are disabled using setPrintHeader() and setPrintFooter() methods.
        // EOD;

        //         // print a block of text using Write()
        //         $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

        // ---------------------------------------------------------
        // writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
        // writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

        // create some HTML content
        $html = '<div style="text-align:center;margin-top:1px;">
        <img src="images/sht_kano_logo_no_border.jpg" alt="test alt attribute" width="100" height="100" border="0" /><>
                <h1 style="text-align:center" >School of Health Technology, Kano</h1>
                <p style="text-align:center;line-height:1px;" >Student Examination Card</p>
            
                </div>

               
                <img src="<' . (is_file("uploads/students/passport_" . $_SESSION['current_student_id'] . "_.jpg") ? 'uploads/students/passport_' . $_SESSION['current_student_id'] . '_.jpg' : base_url('images/avatar.png')) . '" alt="Passport Picture" class="img-circle profile_img" style="display:inline;width:100px;height:100px;float:left;" >
              <span style="font-size:20px;">
                ' . $student->first_name . ' ' . $student->last_name . '<br>
                ' . $student->email . '<br>
                ' . $student->department . '<br>
                ' . $student->registration_number . '<br>
                Level ' . $student->level . '<br>
                </span>
                
                
                <p>
                    <table border="1" style="padding:3px;font-size:12px;">
                        <tr>
                            <td>Course Code</td><td>Course Title</td><td>Invigilator Sign</td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                    </table>
                </p>
                
                <span style="font-size:10px;">
                    <b>Instructions</b> <br />
                    1. Be at the exam venue 30 minutes before the commencement of the examination. <br />
                    2. Phone and other electronic gadgets are not allowed into the examination hall. <br />
                    3. Discussion of any kind is forbidden in the examination hall. <br />
                    4. Raise your hand if you want to draw attention of the invigilator.
                </span>

                ';

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        $style = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );

        // QRCODE,L : QR-CODE Low error correction
        $pdf->write2DBarcode($student->registration_number.' \n'.$student->fullname, 'QRCODE,L', 160, 260, 25, 25, $style, 'N');


        //Close and output PDF document
        $this->response->setHeader("Content-Type", "application/pdf");
        $pdf->Output('exam_card.pdf', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
    }
}
