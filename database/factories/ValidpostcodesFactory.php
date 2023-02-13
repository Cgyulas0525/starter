<?php

namespace Database\Factories;

use App\Models\Validpostcodes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ValidpostcodesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Validpostcodes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'settlement_id' => $this->faker->randomDigitNotNull,
        'postcode' => $this->faker->randomDigitNotNull,
        'active' => $this->faker->randomDigitNotNull,
        'description' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
