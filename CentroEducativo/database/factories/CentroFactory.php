<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CentroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->Sentence(),
            'cod_asd' => $this->faker->randomDigit(),
            'fec_comienzo_actividad' => $this->faker->date(),
            'opcion_radio' => $this->faker->word(),
            'guarderia' => $this->faker->boolean(),
            'categoria' => $this->faker->randomDigit(),
        ];

        //$this->faker->phoneNumber()
        //$this->faker->unique()->vat(),
        //'partes' => $this->faker->numerify('###'), //all # characters are replaced by digits between 0 and 10
        //'presidente' => $this->faker->firstName() . " " . $this->faker->lastName(),
        // 'iban' => $this->faker->bankAccountNumber(),
        // 'banco' => $this->faker->randomElement(['BBVA', 'ING', 'EVO']),
        // 'fecha_apertura' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
        // 'cmd_id' => $this->faker->numberBetween(1,Comunidad::count()),
        // 'importe' => $this->faker->randomFloat(2),
        // 'concepto' => $this->faker->sentence(),
        // 'cuenta_destino' => $this->faker->bankAccountNumber(),//->bothify('??################') --> Generate a string where ? characters are replaced with a random letter, and # characters are replaces with a random digit between 0 and 10
        // 'cuenta' => $this->faker->numberBetween(1,Cuenta::count()),
        //'dni' => $this->faker->dni(),
        //'email_verified_at' => now(),
    }
}
