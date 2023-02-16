<?php
/**
 * Management.php the file handles all management actions and views
 * php version 8.1
 * 
 * @category Controllers
 * @package  App\Controllers
 * @author   Umar SUnusi Maitalata <maitalata@email.com>
 * @license  Labsity Technolohies Proprietory License
 * @link     https://shtkano.knstate.healthcare
 */
namespace App\Controllers;

use App\Controllers\BaseController;

/**
 * Management Controller
 * php version 8.1
 * 
 * @category Controllers
 * @package  App\Controllers
 * @author   Umar SUnusi Maitalata <maitalata@email.com>
 * @license  Labsity Technolohies Proprietory License
 * @link     https://shtkano.knstate.healthcare*
 */
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

    public function addNewStudent()
    {
        $data['programmes'] = $this->programmesModel->findAll();
        return view('management/add_new_student', $data);
    }

    public function pullStudent()
    {
        return view('management/add_from_applicants');
    }

    public function allStudents()
    {
        $data['students'] = $this->studentModel->findAll(2000);

        return view('management/all_students', $data);
    }

    public function allNewStudents()
    {
        $data['students'] = $this->studentModel->where('is_new', 'YES')->findAll();

        return view('management/all_students', $data);
    }
    
    public function allStudents2()
    {
        $data['students'] = $this->studentModel->findAll(1000, 2000);

        return view('management/all_students', $data);
    }
    
    public function allStudents3()
    {
        $data['students'] = $this->studentModel->findAll(1000, 3000);

        return view('management/all_students', $data);
    }
    
    public function allStudents4()
    {
        $data['students'] = $this->studentModel->findAll(1000, 4000);

        return view('management/all_students', $data);
    }
    
    public function allStudents5()
    {
        $data['students'] = $this->studentModel->findAll(100, 4000);

        return view('management/all_students', $data);
    }

    public function add()
    {
        return view('management/add');
    }

    public function student($studentID)
    {
        $data['student'] = $this->studentModel->where('id', $studentID)->first();
        $data['acceptance_fee'] = $this->acceptanceFeesModel->where('student', $studentID)->first();
        $data['medical_fee'] = $this->medicalFeesModel->where('student', $studentID)->first();
        $data['steps'] = $this->registrationStepsModel->where('student', $studentID)->first();


        return view('management/student', $data);
    }

    public function saveStudent()
    {
        $data = $this->request->getPost();

        $student = new \App\Entities\Student();
        $student->fill($data);
        if ($this->studentModel->save($student)) {
            $this->session->setFlashdata('success', 'Student Saved successfully');
            return redirect()->to('management');
        } else {
            $this->session->setFlashdata('errors', $this->studentModel->errors());
            return redirect()->back()->withInput();
        }
    }

    public function saveJambInfo()
    {
        $data = $this->request->getPost();

        $student = new \App\Entities\Student();
        $student->fill($data);
        if ($this->studentModel->save($student)) {
            $stepInfo = $this->registrationStepsModel->where('student', $this->request->getPost('id'))->first();
            $this->registrationStepsModel->where('id', $stepInfo->id)->set(['stage' => 'Confirmed By Admission Office'])->update();
            $this->session->setFlashdata('success', 'Operation Completed successfully');
            return redirect()->to('management');
        } else {
            $this->session->setFlashdata('errors', $this->studentModel->errors());
            return redirect()->back()->withInput();
        }
    }

    public function saveNewStudent()
    {
        $data = $this->request->getPost();

        $student = new \App\Entities\Student();
        $student->fill($data);
        if ($this->studentModel->save($student)) {
            $programme =$this->programmesModel->where('programme', $this->request->getPost('programme'))->first();

            $amount = 90900;
            $split_code = "SPL_xD89KmDJ1p";

            if ($programme->tier == 1) {
                $amount = 121562.50;
                $split_code = "SPL_ThbtaTmdUw";
            } else if ($programme->tier == 2) {
                $amount = 101200;
                $split_code = "SPL_uwU4m55YLQ";
            } else {
                $amount = 90900;
                $split_code = "SPL_xD89KmDJ1p";
            }


            $registrationPaymentData = [
                'students' => $this->studentModel->getInsertID(),
                'payment_reference' => 'SHTK' . $this->studentModel->getInsertID() . "-REG" . mt_rand(1, 99) . '-' . mt_rand(1, 9999),
                'amount' => $amount,
                'split_code' => $split_code,
                'status' => 'NOT PAID',
            ];

            $registrationPayment = new \App\Entities\RegistrationPayments();
            $registrationPayment->fill($registrationPaymentData);

            $this->registrationPaymentModel->save($registrationPayment);

            $acceptanceFeeData = [
                'student' => $this->studentModel->getInsertID(),
                'payment_reference' => 'SHTK' . $this->studentModel->getInsertID() . "-ACP" . mt_rand(1, 99) . '-' . mt_rand(1, 5000),
                'status' => 'NOT PAID',
            ];

            $acceptanceFees = new \App\Entities\AcceptanceFees();
            $acceptanceFees->fill($acceptanceFeeData);

            $this->acceptanceFeesModel->save($acceptanceFees);

            $medicalFeesData = [
                'student' => $this->studentModel->getInsertID(),
                'payment_reference' => 'SHTK' . $this->studentModel->getInsertID() . "-MED" . mt_rand(1, 99) . '-' . mt_rand(1, 5000),
                'status' => 'NOT PAID',
            ];

            $medicalFees = new \App\Entities\MedicalFees();
            $medicalFees->fill($medicalFeesData);

            $this->medicalFeesModel->save($medicalFees);

            $registrationStepsData = [
                'student' => $this->studentModel->getInsertID(),
            ];

            $registrationSteps = new \App\Entities\MedicalFees();
            $registrationSteps->fill($registrationStepsData);

            $this->registrationStepsModel->save($registrationSteps);

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
                           <h1 style='text-align:center;' >Added to SHT Server</h1>
                        </div>
      
                        <hr>
                        <div>
                          <p style='font-size:20px;'>
                            You have been added to the School of Health Technology, Kano student database. Follow the lin below and enter your email at the form titled register.
                            <br>
                            Click the link below to continue your application
                              <br><a href='https://shtkano.knstate.healthcare'>Click Here</a>

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


            $this->session->setFlashdata('success', 'Student Saved successfully');


            return redirect()->to('management');
        } else {
            $this->session->setFlashdata('errors', $this->studentModel->errors());
            return redirect()->back()->withInput();
        }
    }

    public function editStudent($studentID)
    {
        $data['student'] = $this->studentModel->find($studentID);
       
        //dd($data);

        return view('management/edit', $data);
    }

    public function confirmAcceptanceAndMedicalFees($studentID)
    {
        $stepsInfo = $this->registrationStepsModel->where('student', $studentID)->first();

        if ($this->registrationStepsModel->where('id', $stepsInfo->id)->set(['stage' => 'Confirmed Medical and Acceptance Fees By Bursary'])->update()) {
            $this->session->setFlashdata('success', 'Action Completed successfully');
            return redirect()->to('management');
        } else {
            $this->session->setFlashdata('errors', $this->registrationStepsModel->errors());
            return redirect()->back()->withInput();
        }
    }

    
    public function updateStudent($studentID)
    {
        $data = $this->request->getPost();

        // $student = new \App\Entities\Student();
        // $student->fill($data);
        
        if ($this->studentModel->update($studentID, $data)) {
            $this->session->setFlashdata('success', 'Student Updated successfully');
            return redirect()->to('management');
        } else {
            $this->session->setFlashdata('errors', $this->studentModel->errors());
            return redirect()->back()->withInput();
        }
    }

    public function utilAssign()
    {
        auth()->user()->addGroup('superadmin');
    }

    public function deleteStudent($studentID)
    {
        // $data = $this->request->getPost();

        // $student = new \App\Entities\Student();
        // $student->fill($data);
        if ($this->studentModel->delete($studentID)) {
            $this->session->setFlashdata('success', 'Student Deleted successfully');
            return redirect()->to('management');
        } else {
            $this->session->setFlashdata('errors', $this->studentModel->errors());
            return redirect()->back()->withInput();
        }
    }


}
