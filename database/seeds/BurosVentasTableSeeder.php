<?php

use Illuminate\Database\Seeder;
use App\Modelos\Buro;
use App\Modelos\BuroTraslations;
use App\Modelos\Oficina;
use App\Modelos\OficinaTraslations;
use Faker\Factory as Faker;

class BurosVentasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $oficina =   Oficina::where('id', 1)->firstOrFail();
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
        $buros = Buro::create(
            [
                'telefono' => $faker->phoneNumber(),
                'oficina_id'=>'Admin',
                'created_by'=>'Admin',
                'oficina_id'=>$oficina->id
            ]
        );
        foreach ($locales as $value)
        {
            BuroTraslations::firstOrCreate([
                'nombre'=>$faker->company(),
                'direccion' => $faker->company(),
                'idioma'=>$value,
                'created_by'=>$buros->created_by,
                'buro_id'=>$buros->id
            ]);
        }
    }
}
