<?php

use Illuminate\Database\Seeder;
use App\Modelos\QuienesSomos;
use App\Modelos\QuienesSomosTraslation;

use Illuminate\Http\File;
use Faker\Factory as Faker;

class QuienesSomosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $image =base_path('public/files/googlemap.png');
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
        $quienessomos = QuienesSomos::create(
            [
                'imagen' => Storage::disk('public')->putFile('quienessomos',new File($image)),
                'created_by'=>'Admin'
            ]
        );
        foreach ($locales as $value)
        {
            QuienesSomosTraslation::firstOrCreate([
                'titulo'=>$faker->company(),
                'descripcion' => $faker->paragraph(),
                'quienessomos_id'=>$quienessomos->id,
                'created_by'=>$quienessomos->created_by,
                'locale'=>$value
            ]);
        }
    }
}
