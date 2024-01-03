<?php

namespace Database\Factories;

use App\Models\PaymentHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentHistory>
 */
class PaymentHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PaymentHistory::class;
    
    public function definition()
    {
        return [
            'paymentType' => $this->faker->randomElement(['Cash', 'Credit Card', 'Bank Transfer']),
            'paymentMethod' => $this->faker->randomElement(['Online', 'In-person']),
            'yearTerm' => $this->faker->numberBetween(202200, 202299),
            'orNumber' => $this->faker->randomNumber(6),
            'amount' => $this->faker->randomFloat(2, 100, 10000),
            'code' => $this->faker->word,
            'remarks' => $this->faker->sentence,
        ];
    }
}
