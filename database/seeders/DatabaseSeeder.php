<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Users;
use App\Models\College;
use App\Models\Program;
use App\Models\StudentTerm;
use App\Models\GradClasses;

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

        GradClasses::insert([
            'courseCode' => 'CSC101',
            'section' => 'A',
            'courseTitle' => 'Advanced Computer Architecture 1',
            'units' => '3',
            'classSchedule' => 'MWF 10:00AM - 11:00AM',
            'studentCount' => '30',
            'creditedUnits' => '3',
            'college' => 'College of Engineering',
            'loadType' => 'Regular',
            'aysem' => '20212',
            'facultyId' => '202010101'
        ]);

        GradClasses::insert([
            'courseCode' => 'CSC201',
            'section' => 'B',
            'courseTitle' => 'Advanced Computer Architecture 2',
            'units' => '3',
            'classSchedule' => 'TTh 10:00AM - 11:00AM',
            'studentCount' => '35',
            'creditedUnits' => '3',
            'college' => 'College of Engineering',
            'loadType' => 'Regular',
            'aysem' => '20212',
            'facultyId' => '202010101'
        ]);

        GradClasses::insert([
            'courseCode' => 'CSC301',
            'section' => 'C',
            'courseTitle' => 'Advanced Computer Architecture 3',
            'units' => '3',
            'classSchedule' => 'S 10:00AM - 11:00AM',
            'studentCount' => '32',
            'creditedUnits' => '3',
            'college' => 'College of Engineering',
            'loadType' => 'Regular',
            'aysem' => '20212',
            'facultyId' => '202010101'
        ]);


    }
}
