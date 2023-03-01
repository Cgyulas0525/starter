<?php

namespace Database\Factories;

use App\Models\Clientquestionnaries;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientquestionnariesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clientquestionnaries::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => $this->faker->randomDigitNotNull,
        'questionnarie_id' => $this->faker->randomDigitNotNull,
        'posted' => $this->faker->word,
        'retrieved' => $this->faker->word,
        'description' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
