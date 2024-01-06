<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;

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
        Users::insert([
            'id' => 202010101,
            //'userType' => ['Student', 'StudentGrad', 'ChairpersonGrad', 'Faculty'],
            'firstName' => 'Juan',
            'middleName' => 'Dela',
            'lastName' => 'Cruz',
            'plmEmail' => 'jdcruz2020@plm.edu.ph'
        ]);

        Users::insert([
            'id' => 202010102,
            //'userType' => ['Student', 'StudentGrad', 'ChairpersonGrad', 'Faculty'],
            'firstName' => 'Maria',
            'middleName' => 'Dela',
            'lastName' => 'Cruz',
            'plmEmail' => 'mdcruz2020@plm.edu.ph'
        ]);

        Users::insert([
            'id' => 202010103,
            //'userType' => ['Student', 'StudentGrad', 'ChairpersonGrad', 'Faculty'],
            'firstName' => 'Pedro',
            'middleName' => 'Dela',
            'lastName' => 'Cruz',
            'plmEmail' => 'pdcruz2020@plm.edu.ph'
        ]);
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
    }
}
