<?php

use Illuminate\Database\Seeder;
use App\Modelos\DiasSemana;
use App\Modelos\DiasSemanaTraslation;

class DiasSemanaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
        $diasespanol = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
        $diasinlges = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $diasfrances = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
        $diasaleman = array('Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Domingo');
        $diasitaliano = array('Lunedi', 'Martedì', 'Mercoledì', 'Giovedi', 'Venerdì', 'Sabato', 'Domenica');
        $diasportugues = array('Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sabado', 'Domingo');
        $cont1=0;
        $cont2=0;
        $cont3=0;
        $cont4=0;
        $cont5=0;
        $cont6=0;
        for ($i = 0; $i <= 6; $i++)
        {
            $diassemanaes = DiasSemana::create();
           foreach ($locales as $value)
           {
               if($value =='es'){
                   DiasSemanaTraslation::firstOrCreate(['diassemana' => $diasespanol[$cont1],'locale'=>'es','dias_semanas_id'=>$diassemanaes->id]);
                   $cont1++;
               }
               elseif ($value =='en'){
                   DiasSemanaTraslation::firstOrCreate(['diassemana' => $diasinlges[$cont2],'locale'=>'en','dias_semanas_id'=>$diassemanaes->id]);
                   $cont2++;
               }
               elseif ($value =='fr'){
                   DiasSemanaTraslation::firstOrCreate(['diassemana' => $diasfrances[$cont3],'locale'=>'fr','dias_semanas_id'=>$diassemanaes->id]);
                   $cont3++;
               }
               elseif ($value =='de'){
                   DiasSemanaTraslation::firstOrCreate(['diassemana' => $diasaleman[$cont4],'locale'=>'de','dias_semanas_id'=>$diassemanaes->id]);
                   $cont4++;
               }
               elseif ($value =='it'){
                   DiasSemanaTraslation::firstOrCreate(['diassemana' => $diasitaliano[$cont5],'locale'=>'it','dias_semanas_id'=>$diassemanaes->id]);
                   $cont5++;
               }
               elseif ($value =='pt'){
                   DiasSemanaTraslation::firstOrCreate(['diassemana' => $diasportugues[$cont6],'locale'=>'pt','dias_semanas_id'=>$diassemanaes->id]);
                   $cont6++;
               }
           }
        }
       /*$diassemanaes = DiasSemana::create();
        $diassemanaen = DiasSemana::create();
        $diassemanafr = DiasSemana::create();
        $diassemanade = DiasSemana::create();
        $diassemanait = DiasSemana::create();
        $diassemanapt = DiasSemana::create();

        //***Espanol****
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Lunes','locale'=>'es','dias_semanas_id'=>$diassemanaes->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Martes','locale'=>'es','dias_semanas_id'=>$diassemanaes->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Miercoles','locale'=>'es','dias_semanas_id'=>$diassemanaes->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Jueves','locale'=>'es','dias_semanas_id'=>$diassemanaes->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Viernes','locale'=>'es','dias_semanas_id'=>$diassemanaes->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Sabado','locale'=>'es','dias_semanas_id'=>$diassemanaes->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Domingo','locale'=>'es','dias_semanas_id'=>$diassemanaes->id]);

        //***Ingles****
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Monday','locale'=>'en','dias_semanas_id'=>$diassemanaen->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Tuesday','locale'=>'en','dias_semanas_id'=>$diassemanaen->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Wednesday','locale'=>'en','dias_semanas_id'=>$diassemanaen->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Thursday','locale'=>'en','dias_semanas_id'=>$diassemanaen->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Friday','locale'=>'en','dias_semanas_id'=>$diassemanaen->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Saturday','locale'=>'en','dias_semanas_id'=>$diassemanaen->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Sunday','locale'=>'en','dias_semanas_id'=>$diassemanaen->id]);

        //***Frances****
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Lundi','locale'=>'fr','dias_semanas_id'=>$diassemanafr->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Mardi','locale'=>'fr','dias_semanas_id'=>$diassemanafr->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Mercredi','locale'=>'fr','dias_semanas_id'=>$diassemanafr->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Jeudi','locale'=>'fr','dias_semanas_id'=>$diassemanafr->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Vendredi','locale'=>'fr','dias_semanas_id'=>$diassemanafr->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Samedi','locale'=>'fr','dias_semanas_id'=>$diassemanafr->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Dimanche','locale'=>'fr','dias_semanas_id'=>$diassemanafr->id]);


        //***Aleman****
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Montag','locale'=>'de','dias_semanas_id'=>$diassemanade->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Dienstag','locale'=>'de','dias_semanas_id'=>$diassemanade->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Mittwoch','locale'=>'de','dias_semanas_id'=>$diassemanade->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Donnerstag','locale'=>'de','dias_semanas_id'=>$diassemanade->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Freitag','locale'=>'de','dias_semanas_id'=>$diassemanade->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Samstag','locale'=>'de','dias_semanas_id'=>$diassemanade->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Sonntag','locale'=>'de','dias_semanas_id'=>$diassemanade->id]);


        //***Italiano****
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Lunedi','locale'=>'it','dias_semanas_id'=>$diassemanait->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Martedì','locale'=>'it','dias_semanas_id'=>$diassemanait->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Mercoledì','locale'=>'it','dias_semanas_id'=>$diassemanait->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Giovedi','locale'=>'it','dias_semanas_id'=>$diassemanait->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Venerdì','locale'=>'it','dias_semanas_id'=>$diassemanait->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Sabato','locale'=>'it','dias_semanas_id'=>$diassemanait->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Domenica','locale'=>'it','dias_semanas_id'=>$diassemanait->id]);

        //***Portugues****
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Segunda-feira','locale'=>'pt','dias_semanas_id'=>$diassemanapt->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Terça-feira','locale'=>'pt','dias_semanas_id'=>$diassemanapt->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Quarta-feira','locale'=>'pt','dias_semanas_id'=>$diassemanapt->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Quinta-feira','locale'=>'pt','dias_semanas_id'=>$diassemanapt->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Sexta-feira','locale'=>'pt','dias_semanas_id'=>$diassemanapt->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Sabado','locale'=>'pt','dias_semanas_id'=>$diassemanapt->id]);
        DiasSemanaTraslation::firstOrCreate(['diassemana' => 'Domingo','locale'=>'pt','dias_semanas_id'=>$diassemanapt->id]);
*/
    }
}
