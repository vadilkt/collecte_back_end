<?php

namespace Database\Factories;

use App\Models\Objectif;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ObjectifFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Objectif::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'intitule_obj' => $this->faker->title,
            'intitule_eval' => $this->faker->title,
        ];
    }
}
