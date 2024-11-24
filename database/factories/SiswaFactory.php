<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->randomElement(['Ali', 'Budi', 'Citra', 'Dewi']), // Nama acak
            'kelas' => $this->faker->randomElement(['X A1', 'XII B1', 'XI A1', 'X B1']),    // Kelas acak
            'username' => $this->faker->userName,                                    // Username acak
            'password' => bcrypt('password'),                                       // Password terenkripsi
        ];
    }
    
}
