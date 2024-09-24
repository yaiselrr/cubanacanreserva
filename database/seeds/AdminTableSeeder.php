<?php

use Illuminate\Database\Seeder;
use App\Modelos\User;
use App\Modelos\Role;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (User::count() == 0) {
            $role = Role::where('nombre', 'Editor')->firstOrFail();
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@cubanacan.cu',
                'password' => bcrypt('password'),
                'remember_token' => Str::random(60),
                'role_id'=> $role->id
            ]);


        }
    }
}
