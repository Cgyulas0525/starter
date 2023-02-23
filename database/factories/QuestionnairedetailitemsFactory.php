<?php

namespace Database\Factories;

use App\Models\Questionnairedetailitems;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionnairedetailitemsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Questionnairedetailitems::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'questionnariedetail_id' => $this->faker->randomDigitNotNull,
        'value' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
