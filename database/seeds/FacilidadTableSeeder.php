<?php

use Illuminate\Database\Seeder;
use App\Modelos\Facilidad;
use App\Modelos\FacilidadTraslation;

class FacilidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
        $facilidadespanol = array('Piscina', 'Piscina exterior', 'Aparcamiento gratuito','Desayuno incluido'
        , 'Personal Multilingüe', 'Restaurante', 'Snack bar', 'Bar/Salón', 'Acceso para discapacitados'
        , 'Spa', 'Gimnasio','Wifi de pago', 'Recepción 24 horas', 'Animación', 'Zona infantil','Área de fumadores'
        , 'Aire Acondicionado en las habitaciones', 'Discoteca','Caja fuerte');

        $facilidadinlges = array('Swimming pool', 'Outdoor pool', 'Free parking', 'Breakfast included'
        , 'Multilingual staff', 'restaurant', 'Snack bar', 'Bar / Lounge', 'Disabled access', 'Spa', 'Gym'
        , 'Wifi payment', '24 hours reception', 'Animation', 'Childrens area','Smoking area', 'Air conditioning in the rooms'
        , 'Discotheque', 'Safe');

        $facilidadfrances = array('Piscine', 'Piscine extérieure', 'Stationnement gratuit', 'Petit déjeuner inclus'
        , 'Personnel multilingue', 'Le restaurant', 'Snack bar', 'Bar / Lounge', 'Accès handicapés', 'Spa', 'Gym'
        , 'Paiement Wifi', 'Réception 24h / 24', 'L animation', 'Espace enfants', 'Espace fumeur', 'Air conditionné dans les chambres'
        , 'disco', 'Coffre fort',);

        $facilidadaleman = array('Schwimmbad', 'Freibad', 'Kostenlose Parkplätze', 'Frühstück inklusive', 'Mehrsprachiges Personal', 'Restaurant'
        , 'Snackbar', 'Bar / Lounge', 'Zugang für Behinderte', 'Spa', 'Turnhalle', 'Wifi Zahlung', '24 Stunden Rezeption'
        , 'Animation', 'Kinderbereich', 'Raucherbereich', 'Klimaanlage in den Zimmern','Nachtclub', 'Sicher',);

        $facilidaditaliano = array('Piscina', 'Piscina all aperto', 'Parcheggio gratuito', 'Colazione inclusa', 'Personale multilingue'
        , 'ristorante', 'Snack bar', 'Bar / Lounge', 'Accesso per disabili', 'terme', 'palestra', 'Pagamento Wifi'
        , 'Reception aperta 24 ore al giorno', 'animazione', 'Area per bambini', 'Zona fumatori', 'Aria condizionata nelle camere'
        , 'discoteca', 'sicuro',);

        $facilidadportugues = array('Piscina', 'Piscina ao ar livre', 'Estacionamento grátis', 'Café da manhã incluso'
        , 'Equipe multilíngue', 'Restaurante', 'Lanchonete', 'Bar / Lounge', 'Acesso para deficientes', 'Spa', 'Ginásio'
        , 'Pagamento wifi', 'Recepção 24 horas', 'Animação', 'Área infantil', 'Área para fumantes', 'Ar condicionado nos quartos'
        , 'Discoteca', 'Cofre',);
        $cont1=0;
        $cont2=0;
        $cont3=0;
        $cont4=0;
        $cont5=0;
        $cont6=0;
        for ($i = 0; $i <=18; $i++)
        {
            $facilidad = Facilidad::create();

            foreach ($locales as $value)
            {
                if($value =='es'){

                    FacilidadTraslation::firstOrCreate(['facilidad' => $facilidadespanol[$cont1],'locale'=>'es','facilidad_id'=>$facilidad->id]);
                    unset($facilidadespanol[$cont1]);
                    $cont1++;

                }
                elseif ($value =='en'){
                    FacilidadTraslation::firstOrCreate(['facilidad' => $facilidadinlges[$cont2],'locale'=>'en','facilidad_id'=>$facilidad->id]);
                    unset($facilidadinlges[$cont2]);
                    $cont2++;
                }
                elseif ($value =='fr'){
                    FacilidadTraslation::firstOrCreate(['facilidad' => $facilidadfrances[$cont3],'locale'=>'fr','facilidad_id'=>$facilidad->id]);
                    unset($facilidadfrances[$cont3]);
                    $cont3++;
                }
                elseif ($value =='de'){
                    FacilidadTraslation::firstOrCreate(['facilidad' => $facilidadaleman[$cont4],'locale'=>'de','facilidad_id'=>$facilidad->id]);
                    unset($facilidadaleman[$cont4]);
                    $cont4++;
                }
                elseif ($value =='it'){
                    FacilidadTraslation::firstOrCreate(['facilidad' => $facilidaditaliano[$cont5],'locale'=>'it','facilidad_id'=>$facilidad->id]);
                    unset($facilidaditaliano[$cont5]);
                    $cont5++;
                }
                elseif ($value =='pt'){
                    FacilidadTraslation::firstOrCreate(['facilidad' => $facilidadportugues[$cont6],'locale'=>'pt','facilidad_id'=>$facilidad->id]);
                    unset($facilidadportugues[$cont6]);
                    $cont6++;
                }
            }
        }
    }
}
