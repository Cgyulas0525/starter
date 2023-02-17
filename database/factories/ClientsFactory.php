<?php

namespace Database\Factories;

use App\Models\Clients;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clients::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'email' => $this->faker->word,
        'phonenumber' => $this->faker->word,
        'birthday' => $this->faker->word,
        'password' => $this->faker->word,
        'postcode' => $this->faker->randomDigitNotNull,
        'settlement_id' => $this->faker->randomDigitNotNull,
        'address' => $this->faker->word,
        'addresscardnumber' => $this->faker->word,
        'addresscardurl' => $this->faker->word,
        'validated' => $this->faker->randomDigitNotNull,
        'active' => $this->faker->randomDigitNotNull,
        'local' => $this->faker->randomDigitNotNull,
        'description' => $this->faker->word,
        'gender' => $this->faker->randomDigitNotNull,
        'facebookid' => $this->faker->word,
        'facebookname' => $this->faker->word,
        'facebookemail' => $this->faker->word,
        'gmailid' => $this->faker->word,
        'gmailname' => $this->faker->word,
        'gmailemail' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
