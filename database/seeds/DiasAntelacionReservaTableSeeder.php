<?php

use Illuminate\Database\Seeder;
use App\Modelos\DiasAntelacionReserva;

class DiasAntelacionReservaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 60; $i++)
        {
            DiasAntelacionReserva::firstOrCreate(['dias' => $i]);
        }
    }
}
