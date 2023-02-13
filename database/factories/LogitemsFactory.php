<?php

namespace Database\Factories;

use App\Models\Logitems;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogitemsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Logitems::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'logitemtype_id' => $this->faker->randomDigitNotNull,
        'client_id' => $this->faker->randomDigitNotNull,
        'user_id' => $this->faker->randomDigitNotNull,
        'partnercontact_id' => $this->faker->randomDigitNotNull,
        'datatable' => $this->faker->word,
        'eventdatetime' => $this->faker->date('Y-m-d H:i:s'),
        'remoteaddress' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
