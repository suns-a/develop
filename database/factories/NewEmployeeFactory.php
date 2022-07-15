<?php

namespace Database\Factories;

use App\Models\NewEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewEmployee>
 */
class NewEmployeeFactory extends Factory
{
    protected $model = NewEmployee::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' =>$this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'salary' => $this->faker->numberBetween(30000, 50000),
            'department' => $this->faker->randomElement(array('Accounting', 'Marketing', 'Sales', 'Quality'))
        ];
    }
}
