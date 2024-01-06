<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName' => $this->faker->firstName(),
            'middleName'=> $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'nameExtension' => $this->faker->randomElement(['', 'Jr.', 'Sr.']), //add constraint to db - field can be null
            'gender' => $this->faker->randomElement([0, 1]), //gender was set to integer M=0, F=1
            'maidenName' => $this->faker->name(), //add constraint to db - field can be null
            'plmEmail' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => $this->faker->password(), // password
            'birthday' =>$this->faker->dateTimeBetween('-90 years', '-16 years')->format('Y-m-d'),
            'birthplace' =>$this->faker->text(20),
            'civilStatus' =>$this->faker->randomElement(['Single', 'Married', 'Widowed', 'Legally Separated']),
            //'country' => $this->faker->country(),     //left out country in migration
            'mobilePhone' => $this->faker->phoneNumber(),
            'streetAddress'=> $this->faker->address(),
            'zipCode' => $this->faker->postcode(),
            'provinceCity' => $this->faker->city(),
            'unit' => $this->faker->randomElement([0, 1]),
            'status' => $this->faker->boolean,
            'updatedBy' => $this->faker->firstName . ' ' . $this->faker->optional()->firstName . ' ' . $this->faker->lastName,
            'remember_token' => Str::random(10),
            'expiryDate' => now(),
            'role' => $this->faker->randomElement(['UG', 'GS', 'AD'])
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
