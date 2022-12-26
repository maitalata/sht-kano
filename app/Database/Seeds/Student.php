<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Student extends Seeder
{
    public function run()
    {
        $data = [
            [
                'registration_number'    
                    => 'Amina Ibrahim Mikail',
                'first_name' 
                    => 'UG14CSC010',
                'first_name' 
                    => 'UG14CSC010',
                'first_name' 
                    => 'UG14CSC010',
                'first_name' 
                    => 'UG14CSC010',
                'password' 
                    => '$2y$10$xhoZdbE7DbINXbc1BqLid.OSAzNrr8SUfCWOZfFl91U6aGm6uPqda'
            ],
            [
                'student_name'    
                    => 'Hamza Muhammad',
                'student_number' 
                    => 'UG17MTH021',
                'password' 
                    => '$2y$10$xhoZdbE7DbINXbc1BqLid.OSAzNrr8SUfCWOZfFl91U6aGm6uPqda'
            ],
            [
                'student_name'    
                    => 'Abdulkarim Abdulsalam Abdulkarim',
                'student_number' 
                    => 'UG19CSC030',
                'password' 
                    => '$2y$10$xhoZdbE7DbINXbc1BqLid.OSAzNrr8SUfCWOZfFl91U6aGm6uPqda'
            ]
        ];

        $this->db->table('students')->insertBatch($data);
    }
}
