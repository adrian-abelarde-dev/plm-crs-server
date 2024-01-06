<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Balance>
 */
class BalanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'yearTerm' => $this->faker->numberBetween(202200, 202299),
            'termsOfPayment' => $this->faker->randomElement(['Cash', 'Installment']),
            'balanceStatus' => $this->faker->randomElement([0, 1, 2]),
            'assessment' => $this->faker->sentence,
            'tuitionFeePerUnit' => $this->faker->randomFloat(2, 500, 1500),
            'units' => $this->faker->numberBetween(1, 10),
            'tuitionUnitsTotal' => $this->faker->randomFloat(2, 5000, 15000),
            'miscFees' => json_encode(['fee1' => $this->faker->randomFloat(2, 100, 500)]),
            'otherFees' => json_encode(['fee2' => $this->faker->randomFloat(2, 50, 200)]),
            'totalAmount' => $this->faker->randomFloat(2, 5000, 20000),
            'paidAmount' => $this->faker->randomFloat(2, 0, 5000),
            'overallPaid' => $this->faker->randomFloat(2, 0, 15000),
            'overallBalance' => $this->faker->randomFloat(2, 0, 5000),
            'amountToBePaid' => $this->faker->randomFloat(2, 0, 5000),
            
        ];
    }
}
