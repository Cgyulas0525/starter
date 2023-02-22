<?php

namespace Database\Factories;

use App\Models\Questionnairedetails;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionnairedetailsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Questionnairedetails::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'questionnaire_id' => $this->faker->randomDigitNotNull,
        'name' => $this->faker->word,
        'detailtype_id' => $this->faker->randomDigitNotNull,
        'required' => $this->faker->randomDigitNotNull,
        'readonly' => $this->faker->randomDigitNotNull,
        'long' => $this->faker->randomDigitNotNull,
        'rowcount' => $this->faker->randomDigitNotNull,
        'description' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
