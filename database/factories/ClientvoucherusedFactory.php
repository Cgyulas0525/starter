<?php

namespace Database\Factories;

use App\Models\Clientvoucherused;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientvoucherusedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clientvoucherused::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'clientvoucher_id' => $this->faker->randomDigitNotNull,
        'usedtime' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
