<?php

use Illuminate\Database\Seeder;
use App\Modelos\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleNacional = Role::firstOrCreate(['nombre' => 'Editor']);
        $roleNacional = Role::firstOrCreate(['nombre' => 'Nacional']);
        $roleProvincial = Role::firstOrCreate(['nombre' => 'Provincial']);
        $roleMunicipal = Role::firstOrCreate(['nombre' => 'Municipal']);
    }
}
