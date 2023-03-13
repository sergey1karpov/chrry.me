<?php

namespace Database\Factories;

use App\Models\UserHash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserHash>
 */
class UserHashFactory extends Factory
{
    protected $model = UserHash::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'hash' => rand(),
        ];
    }
}
