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
