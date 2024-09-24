<?php

use Illuminate\Database\Seeder;
use App\Modelos\Oficina;
use App\Modelos\OficinaTraslations;
use Faker\Factory as Faker;

class OficinasTableSeeder extends Seeder
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
        $oficina = Oficina::create(
            [
                'telefono' => $faker->phoneNumber(),
                'created_by'=>'Admin',
            ]
        );
        foreach ($locales as $value)
        {
            OficinaTraslations::firstOrCreate([
                'nombre'=>$faker->company(),
                'direccion' => $faker->company(),
                'idioma'=>$value,
                'created_by'=>$oficina->created_by,
                'oficina_id'=>$oficina->id
            ]);
        }
    }
}
