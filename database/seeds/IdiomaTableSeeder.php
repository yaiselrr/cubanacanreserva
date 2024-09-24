<?php

use Illuminate\Database\Seeder;
use App\Modelos\Idioma;

class IdiomaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleNacional1 = Idioma::firstOrCreate(['idioma' => 'Español']);
        $roleNacional2 = Idioma::firstOrCreate(['idioma' => 'Ingles']);
        $roleProvincial3 = Idioma::firstOrCreate(['idioma' => 'Frances']);
        $roleMunicipal4 = Idioma::firstOrCreate(['idioma' => 'Portugues']);
        $roleMunicipal5 = Idioma::firstOrCreate(['idioma' => 'Aleman']);
        $roleNacional6 = Idioma::firstOrCreate(['idioma' => 'Italiano']);
    }
}
