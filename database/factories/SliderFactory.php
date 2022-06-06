<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ar_title' => $this->faker->sentence,
            'en_title' => $this->faker->sentence,
            'ar_details' => $this->faker->text,
            'en_details' => $this->faker->text,
            'image' => $this->faker->image,
        ];
    }
}
