<?php

use Illuminate\Database\Seeder;
use App\Modelos\Role;
use App\Modelos\Permiso;

class PermisoRolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleE = Role::where('nombre', 'Editor')->firstOrFail();

        $permissions = Permiso::all();
        $roleE->permisos()->sync(
            $permissions->pluck('id')->all()
        );
    }
}
