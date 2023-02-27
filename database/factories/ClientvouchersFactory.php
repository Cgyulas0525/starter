<?php

namespace Database\Factories;

use App\Models\Clientvouchers;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientvouchersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clientvouchers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => $this->faker->randomDigitNotNull,
        'voucher_id' => $this->faker->randomDigitNotNull,
        'posted' => $this->faker->word,
        'used' => $this->faker->word,
        'description' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
