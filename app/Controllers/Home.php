<?php

namespace App\Controllers;

use tcpdf;

class Home extends BaseController
{
    public function index()
    {
        //dd($_SESSION['student_logged_in']);
        return view('home');
    }

    public function response()
    {
        //dd($_SESSION['student_logged_in']);
        return view('response');
    }

    public function pdfviewer()
    {

        // Include the main TCPDF library (search for installation path).
        require_once('../vendor/tecnickcom/tcpdf/examples/tcpdf_include.php');

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
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', 'BI', 20);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $txt = <<<EOD
TCPDF Example 002

Default page header and footer are disabled using setPrintHeader() and setPrintFooter() methods.
EOD;

        // print a block of text using Write()
        $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

        // ---------------------------------------------------------

        //Close and output PDF document
        $this->response->setHeader("Content-Type", "application/pdf");
        $pdf->Output('example_002.pdf', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
    }

    public function setupPassword($studentID, $token)
    {
        //dd($_SESSION['student_logged_in']);

        $student = $this->tokenModel->where(['student' => $studentID, 'token' => $token])->join('students', 'students.id = students_tokens.student')->first();

        if(!$student){
            $this->session->setFlashdata(
                'errors',
                [
                    'Invalid Link',
                ]
            );
            return redirect()->to('response');
        }
        

        $data['student']  = $student;


        return view('set_password', $data);
    }

    public function savePassword()
    {
        //dd($_POST);
        $studentID = $this->request->getVar('student');
        $password = $this->request->getVar('password');
        $confirm = $this->request->getVar('confirm');

 
            $data = [
                'id' => $studentID,
                'password' => $password,
                'confirm' => $confirm,
            ];

            $student = new \App\Entities\Student();
           
            $student->fill($data);
            //dd($student);
            if ($this->studentModel->save($student)) {
                $this->session->setFlashdata('success', 'Password Setuo Successfully. Click <a href="'.base_url().'">Here</a> to go back to home and login ');
                return redirect()->to('response');
            } else {
                $this->session->setFlashdata('errors', $this->studentModel->errors());
                return redirect()->back()->withInput();
            }
    }

}
