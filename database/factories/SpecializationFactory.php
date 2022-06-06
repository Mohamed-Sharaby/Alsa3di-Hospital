<?php

namespace Database\Factories;

use App\Models\Specialization;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecializationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Specialization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ar_name' => $this->faker->streetName,
            'en_name' => $this->faker->streetName,
            'ar_details' => $this->faker->text,
            'en_details' => $this->faker->text,
            'image' => $this->faker->image,
        ];
    }
}
