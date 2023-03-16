<?php

namespace Database\Factories;

use App\Models\Clientquestionnariedetails;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientquestionnariedetailsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clientquestionnariedetails::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'clientquestionnarie_id' => $this->faker->randomDigitNotNull,
        'questionnariedetail_id' => $this->faker->randomDigitNotNull,
        'reply' => $this->faker->word,
        'description' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
