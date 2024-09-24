<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(PermisoTableSeeder::class);
        $this->call(PermisoRolTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(ServicioTableSeeder::class);
        $this->call(ContactoTableSeeder::class);
        $this->call(OficinasTableSeeder::class);
        $this->call(BurosVentasTableSeeder::class);
        $this->call(QuienesSomosTableSeeder::class);
        $this->call(ProvinciaTableSeeder::class);
        $this->call(PlanAlojamientoTableSeeder::class);
        $this->call(CategoriaTableSeeder::class);
        $this->call(FacilidadTableSeeder::class);
        $this->call(DiasAntelacionReservaTableSeeder::class);
        $this->call(NacionalidadTableSeeder::class);
        $this->call(DuracionTableSeeder::class);
        $this->call(FrecuenciaTableSeeder::class);
        $this->call(IdiomaTableSeeder::class);
        $this->call(DiasSemanaTableSeeder::class);
        $this->call(StatusReservasSeeder::class);
    }
}
