<?php

namespace Database\Factories;

use App\Models\Test7;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Test7>
 */
class Test7Factory extends Factory
{
    protected $model = Test7::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->firstName(),
            'surname'=>$this->faker->lastName(),
            'age'=> $this->faker->numberBetween(14,100),
            'gender'=> $this->faker->boolean(),
            'price'=> $this->faker->randomFloat(2,10,10000000),
            'description'=> $this->faker->text(),
            'paragraph'=> $this->faker->paragraph(),
            'email'=> $this->faker->email()->unique()->safeEmail(),
            'phone'=> $this->faker->phoneNumber(),
            'password'=> $this->faker->password(),
            'address'=> $this->faker->address(),
            'url'=> $this->faker->url(),
            'mac'=> $this->faker->macAddress(),
            'ipv4'=> $this->faker->ipv4(),
            'username'=> $this->faker->userName(),
            'useragent'=> $this->faker->userAgent(),
            'image'=> $this->faker->imageUrl(),
            'extension'=> $this->faker->extension(),
        ];
    }
}
