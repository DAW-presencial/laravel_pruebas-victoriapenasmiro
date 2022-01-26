<?php

namespace Database\Seeders;

use App\Models\Ambito;
use App\Models\Centro;
use App\Models\Centro_Ambito;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            AmbitoSeeder::class, //completo los valores de la tabla ambito
        ]);

        //sentencias raw (dependientes del SGBD)
        DB::insert('insert into centros (nombre, descripcion, cod_asd, fec_comienzo_actividad, opcion_radio, guarderia, 
        categoria) values (?, ?, ?, ?, ?, ?, ?)', array('Centro Dayle', 'decripcion test', 1, '2020-09-23', 'segundo radio', 0, 2));

        //QueryBuilder
        $centros = [
            'nombre' => 'Centro Vicky',
            'descripcion' => 'Esto es una prueba de registro con QueryBuilder',
            'cod_asd' => 2,
            'fec_comienzo_actividad' => '2018-01-01',
            'opcion_radio' => 'radio primero',
            'guarderia' => 1,
            'categoria' => 5
        ];

        DB::table('centros')->insert($centros);

        //Eloquent
        Centro::factory(1)->create();

        //completo la tabla de comunidades con el id del administrador, sin factories
        $todos_centros = Centro::all();

        foreach ($todos_centros as $centro) {
            $ambito = Ambito::inRandomOrder()->first();

            $ca = Centro_Ambito::create([
                'centro_id' => $centro->id,
                'ambito_id' => $ambito->id,
            ]);
        }
    }
}
