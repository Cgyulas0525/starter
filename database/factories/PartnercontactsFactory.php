<?php

namespace Database\Factories;

use App\Models\Partnercontacts;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnercontactsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partnercontacts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'partner_id' => $this->faker->randomDigitNotNull,
        'name' => $this->faker->word,
        'password' => $this->faker->word,
        'email' => $this->faker->word,
        'phonenumber' => $this->faker->word,
        'active' => $this->faker->randomDigitNotNull,
        'description' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
