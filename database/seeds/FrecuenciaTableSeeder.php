<?php

use Illuminate\Database\Seeder;
use App\Modelos\Frecuencia;
use App\Modelos\FrecuenciaTraslation;

class FrecuenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
        $diasespanol = array('Diaria', 'Semanal', 'Quincenal', 'Mensual');
        $diasinlges = array('Daily', 'Weekly', 'Biweekly', 'Monthly');
        $diasfrances = array('Tous les jours', 'Hebdomadaire', 'Toutes les deux semaines', 'Mensuel');
        $diasaleman = array('Täglich', 'Wöchentlich', 'Zweiwöchentlich', 'Monatlich');
        $diasitaliano = array('Quotidiano', 'Settimanale', 'Quindicinale', 'Mensile');
        $diasportugues = array('Diariamente', 'Semanal', 'Quinzenalmente', 'Mensal');
        $cont1=0;
        $cont2=0;
        $cont3=0;
        $cont4=0;
        $cont5=0;
        $cont6=0;
        for ($i = 0; $i <=3; $i++)
        {
            $frecuencia = Frecuencia::create();

            foreach ($locales as $value)
            {
                if($value =='es'){

                    FrecuenciaTraslation::firstOrCreate(['frecuencia' => $diasespanol[$cont1],'locale'=>'es','frecuencias_id'=>$frecuencia->id]);
                    unset($diasespanol[$cont1]);
                    $cont1++;

                }
                elseif ($value =='en'){
                    FrecuenciaTraslation::firstOrCreate(['frecuencia' => $diasinlges[$cont2],'locale'=>'en','frecuencias_id'=>$frecuencia->id]);
                    unset($diasinlges[$cont2]);
                    $cont2++;
                }
                elseif ($value =='fr'){
                    FrecuenciaTraslation::firstOrCreate(['frecuencia' => $diasfrances[$cont3],'locale'=>'fr','frecuencias_id'=>$frecuencia->id]);
                    unset($diasfrances[$cont3]);
                    $cont3++;
                }
                elseif ($value =='de'){
                    FrecuenciaTraslation::firstOrCreate(['frecuencia' => $diasaleman[$cont4],'locale'=>'de','frecuencias_id'=>$frecuencia->id]);
                    unset($diasaleman[$cont4]);
                    $cont4++;
                }
                elseif ($value =='it'){
                    FrecuenciaTraslation::firstOrCreate(['frecuencia' => $diasitaliano[$cont5],'locale'=>'it','frecuencias_id'=>$frecuencia->id]);
                    unset($diasitaliano[$cont5]);
                    $cont5++;
                }
                elseif ($value =='pt'){
                    FrecuenciaTraslation::firstOrCreate(['frecuencia' => $diasportugues[$cont6],'locale'=>'pt','frecuencias_id'=>$frecuencia->id]);
                    unset($diasportugues[$cont6]);
                    $cont6++;
                }
            }
        }
    }
}
