<?php

use Illuminate\Database\Seeder;
use App\Modelos\Servicio;
use App\Modelos\ServicioTraslation;
use Faker\Factory as Faker;

class ServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
        $servicio = Servicio::create(
            [
                'created_by'=>'Admin'
            ]
        );
        foreach ($locales as $value)
        {
            ServicioTraslation::firstOrCreate([
                'descripcion' => $faker->paragraph(),
                'servicio_id'=>$servicio->id,
                'created_by'=>$servicio->created_by,
                'locale'=>$value
            ]);
        }
    }
}
