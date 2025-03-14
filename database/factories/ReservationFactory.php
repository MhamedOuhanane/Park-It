<?php

namespace Database\Factories;

use App\Models\Parking;
use App\Models\Reservation;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Reservation::class;

    public function definition(): array
    {
        return [
            'start_date' => $this->faker->dateTimeBetween('now', '+4 hours'),
            'end_date' => $this->faker->dateTimeBetween('+4 hours', '+10 hours'),
            'utilisateur_id' => Utilisateur::factory(),
            'parking_id' => Parking::factory(),
        ];
    }
}
