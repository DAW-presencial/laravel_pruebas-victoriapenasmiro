<?php

namespace Database\Seeders;

use App\Models\Ambito;
use Illuminate\Database\Seeder;

class AmbitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ambitos = [
            ['nombre' => 'infantil'],
            ['nombre' => 'primaria'],
            ['nombre' => 'eso'],
            ['nombre' => 'bachiller'],
            ['nombre' => 'fp'],
        ];
    }
}
