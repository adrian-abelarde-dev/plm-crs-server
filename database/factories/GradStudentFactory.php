<?php

namespace Database\Factories;

use App\Models\GradStudent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GradStudent>
 */
class GradStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = GradStudent::class;
    public function definition()
    {
        return [
            'studentID' => $this->faker->numberBetween(202000000, 20230000),
            'userId' => $this->faker->numberBetween(23, 47),
            'balanceID' => $this->faker->numberBetween(1, 25),
            'paymentHistoryID' => $this->faker->numberBetween(1, 25),
            'assessmentHistoryID' => $this->faker->numberBetween(1, 25),
        ];
    }
}
