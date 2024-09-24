<?php

use Illuminate\Database\Seeder;
use App\Modelos\Provincia;

class ProvinciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleNacional1 = Provincia::firstOrCreate(['provincia' => 'Pinar del Río']);
        $roleNacional2 = Provincia::firstOrCreate(['provincia' => 'Artemisa']);
        $roleProvincial3 = Provincia::firstOrCreate(['provincia' => 'Ciudad de La Habana']);
        $roleMunicipal4 = Provincia::firstOrCreate(['provincia' => 'Mayabeque']);
        $roleMunicipal5 = Provincia::firstOrCreate(['provincia' => 'Matanzas']);
        $roleNacional6 = Provincia::firstOrCreate(['provincia' => 'Cienfuegos']);
        $roleNacional7 = Provincia::firstOrCreate(['provincia' => 'Villa Clara']);
        $roleProvincia8 = Provincia::firstOrCreate(['provincia' => 'Sancti Spíritus']);
        $roleMunicipal9 = Provincia::firstOrCreate(['provincia' => 'Ciego de Ávila']);
        $roleMunicipal10 = Provincia::firstOrCreate(['provincia' => 'Camagüey']);
        $roleNacional11 = Provincia::firstOrCreate(['provincia' => 'Las Tunas']);
        $roleNacional12 = Provincia::firstOrCreate(['provincia' => 'Granma']);
        $roleProvincial13 = Provincia::firstOrCreate(['provincia' => 'Holguín']);
        $roleMunicipal14 = Provincia::firstOrCreate(['provincia' => 'Santiago de Cuba']);
        $roleMunicipal15 = Provincia::firstOrCreate(['provincia' => 'Guantánamo']);
        $roleNacional12 = Provincia::firstOrCreate(['provincia' => 'Municipio Especial Isla de la Juventud']);
    }
}
