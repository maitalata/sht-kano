<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Student extends Seeder
{
    public function run()
    {
      
        $data1 = [
                'registration_number' => 'UG15CSC055',
                'first_name'          => 'Ummi',
                'last_name'           => 'Musa D\Iya',
                'email'               => 'musau.um@gmail.com',
                'phone'               => '08031229088',
                'password'            => '$2y$10$xhoZdbE7DbINXbc1BqLid.OSAzNrr8SUfCWOZfFl91U6aGm6uPqda',
                'address'             => 'Naibawa Yan Awaki',
                'gender'              => 'Female',
                'date_of_birth'       => '1994-09-15',
                'indigeneship'        => 'Kano Indigene',
                'local_government'    => 'Tarauni',
                'ward'                => 'Naibawa',
                'marital_status'      => 'Single',
                'religion'            => 'Islam'
        ];

        $this->db->table('students')->insert($data1);

        $data2 = [
                'registration_number' => 'UG15MTH009',
                'first_name'          => 'Sulaiman',
                'last_name'           => 'Habib',
                'email'               => 'sulaiman245@gmail.com',
                'phone'               => '07021870990',
                'password'            => '$2y$10$xhoZdbE7DbINXbc1BqLid.OSAzNrr8SUfCWOZfFl91U6aGm6uPqda',
                'address'             => 'Ja\'en Kano State',
                'gender'              => 'Male',
                'date_of_birth'       => '1994-05-24',
                'indigeneship'        => 'Kano Indigene',
                'local_government'    => 'Gwale',
                'ward'                => 'Dorayi',
                'marital_status'      => 'Single',
                'religion'            => 'Islam'
        ];

        $this->db->table('students')->insert($data2);

        $data3 = [
                'registration_number' => 'NDF/COM/11/022',
                'first_name'          => 'Harry',
                'last_name'           => 'Ikechukwu Kanikwu',
                'email'               => 'harrison222@gmail.com',
                'phone'               => '08122334409',
                'password'            => '$2y$10$xhoZdbE7DbINXbc1BqLid.OSAzNrr8SUfCWOZfFl91U6aGm6uPqda',
                'address'             => 'Sabon Gari Igbo Road',
                'gender'              => 'Male',
                'date_of_birth'       => '1991-07-12',
                'indigeneship'        => 'Non-Indigene',
                'marital_status'      => 'Single',
                'religion'            => 'Christianity'
        ];

        $this->db->table('students')->insert($data3);

        $data4 = [
                'registration_number' => 'UG16ANT033',
                'first_name'          => 'Amina',
                'last_name'           => 'Sunusi Maitalata',
                'email'               => 'aminasunusimaitalata1999m@gmail.com',
                'phone'               => '08123419088',
                'password'            => '$2y$10$xhoZdbE7DbINXbc1BqLid.OSAzNrr8SUfCWOZfFl91U6aGm6uPqda',
                'address'             => 'Dorayi Karshen Waya',
                'gender'              => 'Female',
                'date_of_birth'       => '1999-01-12',
                'indigeneship'        => 'Kano Indigene',
                'local_government'    => 'Gwale',
                'ward'                => 'Dorayi',
                'marital_status'      => 'Married',
                'religion'            => 'Islam'
        ];

        $this->db->table('students')->insert($data4);

        $data5 = [
                'registration_number' => 'UG16PHY022',
                'first_name'          => 'Ammar',
                'last_name'           => 'Sani Umar',
                'email'               => 'ammaru@gmail.com',
                'phone'               => '09021334599',
                'password'            => '$2y$10$xhoZdbE7DbINXbc1BqLid.OSAzNrr8SUfCWOZfFl91U6aGm6uPqda',
                'address'             => 'Sharada Kwanar Freedom',
                'gender'              => 'Male',
                'date_of_birth'       => '1993-10-31',
                'indigeneship'        => 'Kano Indigene',
                'local_government'    => 'Kano Municipal',
                'ward'                => 'Sharada',
                'marital_status'      => 'Single',
                'religion'            => 'Islam'
        ];
        

        $this->db->table('students')->insert($data5);
    }
}
