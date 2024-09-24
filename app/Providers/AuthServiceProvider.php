<?php

namespace App\Providers;

use App\Modelos\Permiso;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerCubanacanPolicies();

        //
    }
    public function registerCubanacanPolicies(){
        if (Schema::hasTable('permisos')) {
            $permissions=Permiso::all();
            foreach ($permissions as $perm) {
                $name=$perm->nombre;
                Gate::define($perm->nombre, function ($user) use($name){
                    return $user->hasAccess($name);
                });
            }
        }

    }
}
