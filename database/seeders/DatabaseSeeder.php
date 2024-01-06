<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create(); //create 10 fake records
        \App\Models\Balance::factory(5)->create();
        \App\Models\PaymentHistory::factory(5)->create();
        \App\Models\AssessmentHistory::factory(5)->create();
        //\App\Models\GradStudent::factory()->create();
    }
}
