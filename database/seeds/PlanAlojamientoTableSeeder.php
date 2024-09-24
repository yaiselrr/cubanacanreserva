<?php

use Illuminate\Database\Seeder;
use App\Modelos\PlanAlojamiento;

class PlanAlojamientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleNacional1 = PlanAlojamiento::firstOrCreate(['planalojamiento' => 'EP']);
        $roleNacional2 = PlanAlojamiento::firstOrCreate(['planalojamiento' => 'CP']);
        $roleProvincial3 = PlanAlojamiento::firstOrCreate(['planalojamiento' => 'MAP']);
        $roleMunicipal4 = PlanAlojamiento::firstOrCreate(['planalojamiento' => 'AP']);
        $roleMunicipal5 = PlanAlojamiento::firstOrCreate(['planalojamiento' => 'TI']);
    }
}
