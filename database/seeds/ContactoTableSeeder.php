<?php

use Illuminate\Database\Seeder;
use App\Modelos\Contacto;
use App\Modelos\ContactoTraslation;
use Faker\Factory as Faker;

class ContactoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
        $contacto = Contacto::create(
            [
                'telefono'=>$faker->phoneNumber(),
                'email'=>$faker->companyEmail(),
                'created_by'=>'Admin'
            ]
        );
        foreach ($locales as $value)
        {
            ContactoTraslation::firstOrCreate([
                'direccion' => $faker->paragraph(),
                'contacto_id'=>$contacto->id,
                'created_by'=>$contacto->created_by,
                'locale'=>$value
            ]);
        }



    }
}
