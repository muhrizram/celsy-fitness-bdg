<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1,6),
            'current_height' => mt_rand(160,190),
            'current_weight' => mt_rand(50,90),
            'target' => 'naik',
            'liveliness' => 'aktif',
            'gender' => 'l',
            'date_of_birth'  => 'a',
            'weekly_target' => '0.5'
        ];
    }
}
