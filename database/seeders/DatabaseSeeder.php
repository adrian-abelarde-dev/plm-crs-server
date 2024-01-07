<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Users;
use App\Models\College;
use App\Models\Program;
use App\Models\StudentTerm;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Only for TESTING
        College::insert([
            'collegeId' => 'coe',
            'collegeName' => 'College of Engineering',
            'type' => 'Undergrad',
            'status' => 'Active'
        ]);

        Program::insert([
            'programId' => 'bscs',
            'collegeId' => 'coe',
            'programName' => 'Bachelor of Science in Computer Science',
            'status' => 'Active'
        ]);

        Users::insert([
            'id' => 202010101,
            //'userType' => ['Student', 'StudentGrad', 'ChairpersonGrad', 'Faculty'],
            'firstName' => 'Juan',
            'middleName' => 'Dela',
            'lastName' => 'Cruz',
            'plmEmail' => 'jdcruz2020@plm.edu.ph'
        ]);

        StudentTerm::insert([
            'studentId' => 202010101,
            'programId' => 'bscs',
            'collegeId' => 'coe',
            'blockId' => '1',
            'yearLevel' => 1,
            'studentStatus' => 'LOA',
            'studentType' => 'New',
            'aysem' => '20232',
            'isEnrolled' => false,
            'scholasticStatus' => 'Not Paying',
            'isGraduating' => true
        ]);

        Users::insert([
            'id' => 202010102,
            //'userType' => ['Student', 'StudentGrad', 'ChairpersonGrad', 'Faculty'],
            'firstName' => 'Maria',
            'middleName' => 'Dela',
            'lastName' => 'Cruz',
            'plmEmail' => 'mdcruz2020@plm.edu.ph'
        ]);

        StudentTerm::insert([
            'studentId' => 202010102,
            'programId' => 'bscs',
            'collegeId' => 'coe',
            'blockId' => '1',
            'yearLevel' => 1,
            'studentStatus' => 'LOA',
            'studentType' => 'New',
            'aysem' => '20232',
            'isEnrolled' => false,
            'scholasticStatus' => 'Not Paying',
            'isGraduating' => false
        ]);

        Users::insert([
            'id' => 202010103,
            //'userType' => ['Student', 'StudentGrad', 'ChairpersonGrad', 'Faculty'],
            'firstName' => 'Pedro',
            'middleName' => 'Dela',
            'lastName' => 'Cruz',
            'plmEmail' => 'pdcruz2020@plm.edu.ph'
        ]);

        StudentTerm::insert([
            'studentId' => 202010103,
            'programId' => 'bscs',
            'collegeId' => 'coe',
            'blockId' => '1',
            'yearLevel' => 1,
            'studentStatus' => 'LOA',
            'studentType' => 'New',
            'aysem' => '20232',
            'isEnrolled' => false,
            'scholasticStatus' => 'Not Paying',
            'isGraduating' => true
        ]);
    }

}
