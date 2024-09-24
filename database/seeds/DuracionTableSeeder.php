<?php

use Illuminate\Database\Seeder;
use App\Modelos\Duracion;

class DuracionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++)
        {
            Duracion::firstOrCreate(['duracion' => $i]);
        }
    }
}
