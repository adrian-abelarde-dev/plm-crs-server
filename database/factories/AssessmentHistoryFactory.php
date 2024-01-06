<?php

namespace Database\Factories;

use App\Models\AssessmentHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssessmentHistory>
 */
class AssessmentHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = AssessmentHistory::class;

    public function definition()
    {
        return [
            'yearTerm' => $this->faker->randomNumber(2),
            'totalTuition' => $this->faker->randomFloat(2, 1000, 5000),
            'paidAmount' => $this->faker->randomFloat(2, 0, 1000),
            'balance' => function (array $attributes) {
                // Calculate balance based on totalTuition and paidAmount
                return $attributes['totalTuition'] - $attributes['paidAmount'];
            },
        ];
    }
}
