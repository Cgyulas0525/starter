<?php

namespace Database\Factories;

use App\Models\Vouchers;
use Illuminate\Database\Eloquent\Factories\Factory;

class VouchersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vouchers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'vouchertype_id' => $this->faker->randomDigitNotNull,
        'partner_id' => $this->faker->randomDigitNotNull,
        'content' => $this->faker->word,
        'validityfrom' => $this->faker->word,
        'validityto' => $this->faker->word,
        'qrcode' => $this->faker->word,
        'discount' => $this->faker->randomDigitNotNull,
        'discountpercent' => $this->faker->randomDigitNotNull,
        'usednumber' => $this->faker->randomDigitNotNull,
        'active' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
