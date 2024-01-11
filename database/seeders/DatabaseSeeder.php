<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Users;
use App\Models\College;
use App\Models\Program;
use App\Models\StudentTerm;
use App\Models\Faculty;
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

        //Faculties
        Users::insert([
            'id' => 19901010,
            //'userType' => ['Student', 'StudentGrad', 'ChairpersonGrad', 'Faculty'],
            'firstName' => 'Sir',
            'middleName' => 'Dela',
            'lastName' => 'Cruz',
            'plmEmail' => 'sdcruz2020@plm.edu.ph'
        ]);

        Users::insert([
            'id' => 19901011,
            //'userType' => ['Student', 'StudentGrad', 'ChairpersonGrad', 'Faculty'],
            'firstName' => 'Maam',
            'middleName' => 'Dela',
            'lastName' => 'Cruz',
            'plmEmail' => 'maamdcruz2020@plm.edu.ph'
        ]);

        Faculty::insert([
            'id' => 19901010, //facultyId
            'userid' => 19901010,
            //'userType' => ['Student', 'StudentGrad', 'ChairpersonGrad', 'Faculty'],
            'tinNumber' => '000-123-456-001',
            'gsisNumber' => '123-123-456-001',
            'pedigree' => 'sample',
            'instructorCode' => 'ABC123',
            'onGraduate' => true
        ]);

        Faculty::insert([
            'id' => 19901011, //facultyId
            'userid' => 19901011,
            //'userType' => ['Student', 'StudentGrad', 'ChairpersonGrad', 'Faculty'],
            'tinNumber' => '111-222-333-444',
            'gsisNumber' => '222-111-444-333',
            'pedigree' => 'sample2',
            'instructorCode' => 'CDE123',
            'onGraduate' => true
        ]);

        //Collegegrad-classes
        GradClasses::insert([
            'courseCode' => 'CSC101',
            'section' => 'A',
            'courseTitle' => 'Advanced Computer Architecture 1',
            'units' => '3.0',
            'classSchedule' => 'MWF 10:00AM - 11:00AM',
            'studentCount' => '27',
            'creditedUnits' => '3.0',
            'college' => 'College of Engineering and Technology',
            'loadType' => 'RL',
            'aysem' => '20212',
            'facultyId' => '19901010'
        ]);

        GradClasses::insert([
            'courseCode' => 'CSC101',
            'section' => 'A',
            'courseTitle' => 'Advanced Computer Architecture 1',
            'units' => '3.0',
            'classSchedule' => 'MWF 10:00AM - 11:00AM',
            'studentCount' => '30',
            'creditedUnits' => '3.0',
            'college' => 'College of Engineering and Technology',
            'loadType' => 'RL',
            'aysem' => '20212',
            'facultyId' => '19901011'
        ]);

        GradClasses::insert([
            'courseCode' => 'CMSC 11',
            'section' => 'S11',
            'courseTitle' => 'Introduction to Computer Science',
            'units' => '3.0',
            'classSchedule' => 'MWF 10:00AM - 11:00AM',
            'studentCount' => '30',
            'creditedUnits' => '3.0',
            'college' => 'College of Engineering and Technology',
            'loadType' => 'RL',
            'aysem' => '20212',
            'facultyId' => '19901010'
        ]);

        GradClasses::insert([
            'courseCode' => 'CMSC 22',
            'section' => 'S22',
            'courseTitle' => 'Data Structures and Algorithms',
            'units' => '3.0',
            'classSchedule' => 'T 9:00AM-12:00PM',
            'studentCount' => '25',
            'creditedUnits' => '3.0',
            'college' => 'College of Engineering and Technology',
            'loadType' => 'EL',
            'aysem' => '20212',
            'facultyId' => '19901010'
        ]);
    }

}
