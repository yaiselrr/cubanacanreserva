<?php

use App\Modelos\StatusReserva;
use App\Modelos\StatusReservaTranslation;
use Illuminate\Database\Seeder;

class StatusReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
        $statusespanol = array('En espera', 'Pendiente de pago', 'Completado', 'Fallido');
        $statusinlges = array('On hold', 'Outstanding', 'Completed', 'Failed');
        $statusfrances = array('En attente', 'Exceptionnel', 'Terminé', 'Échoué');
        $statusaleman = array('In Wartestellung', 'Hervorragend', 'Abgeschlossen', 'Gescheitert');
        $statusitaliano = array('In attesa', 'Eccezionale', 'Completato', 'Fallito');
        $statusportugues = array('Em espera', 'Pendente de pagamento', 'Concluído', 'Falhou');
        for ($i = 0; $i <4; $i++)
        {
            $status = StatusReserva::create();

            foreach ($locales as $value)
            {
                if($value =='es'){
                    StatusReservaTranslation::firstOrCreate(['status' => $statusespanol[$i],'locale'=>'es','status_reservas_id'=>$status->id]);
                }
                elseif ($value =='en'){
                    StatusReservaTranslation::firstOrCreate(['status' => $statusinlges[$i],'locale'=>'en','status_reservas_id'=>$status->id]);
                }
                elseif ($value =='fr'){
                    StatusReservaTranslation::firstOrCreate(['status' => $statusfrances[$i],'locale'=>'fr','status_reservas_id'=>$status->id]);
                }
                elseif ($value =='de'){
                    StatusReservaTranslation::firstOrCreate(['status' => $statusaleman[$i],'locale'=>'de','status_reservas_id'=>$status->id]);
                }
                elseif ($value =='it'){
                    StatusReservaTranslation::firstOrCreate(['status' => $statusitaliano[$i],'locale'=>'it','status_reservas_id'=>$status->id]);
                }
                else{
                    StatusReservaTranslation::firstOrCreate(['status' => $statusportugues[$i],'locale'=>'pt','status_reservas_id'=>$status->id]);
                }
            }
        }
    }
}
