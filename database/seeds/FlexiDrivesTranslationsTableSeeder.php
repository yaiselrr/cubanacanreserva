<?php

use   Illuminate\Database\Seeder;
use   App\Modelos\FlexiDrive;
use   App\Modelos\FlexiDriveTraslation;


class FlexiDrivesTranslationsTableSeeder extends Seeder
{
    private  $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()    {

            $flexiflydrive=FlexiDrive::create(
            [
                'fichero_listado_hoteles'=>'flexidrive/ListadoHoteles.pdf',
                'fichero_informacion_ampliada'=>'flexidrive/infogeneral.pdf',
                'imagen'=>'flexidrive/HSFeZWoArFcBeYzQjasL9eDASdQK4loIEjX0KEPv.png',
                'tarifario_FFD'=>'flexidrive/e1bEEUnWMEiGWyei9Za5zMuXXeT9cctwPRCA1LHr.xlsx',
                'dias_antelacion_rese_alta_id'=>'15',
                'dias_antelacion_rese_baja_id'=>'10',
                'created_by'=>'Admin'
            ]
        );
        foreach($this->locales as $locale)
        {
            $flexiflydrivetranslation=FlexiDriveTraslation::firstOrCreate([
                'flexi_drive_id'=>$flexiflydrive->id,
                'locale'=>$locale,
                'descripcion_general'=>"<p>\r\n            El programa Flexi Fly and Drive establece un mínimo de 6 noches de alojamiento e igual cantidad de días de renta de auto.\r\n            Cada noche de reserva de alojamiento es equivalente a un día renta de auto.\r\n        </p>",
                'descripcion_hoteles'=>"<p><strong>Hoteles:</strong><br>Podrás seleccionar entre más de 100 hoteles en 12 provincias del país.</p>",
                'descripcion_autos'=>"<p>\r\n            <strong>Autos:</strong><br>Modelos de autos disponibles para el paquete Flexi, Fly and Drive, varía según la categoría elegida.<br>\r\n            El Programa dispone de 5 categorías (C, E, H, G, y F+) representadas por los siguientes modelos de autos de la compañía Rex.\r\n        </p>",
                'created_by'=>'Admin'
            ]);
        }
    }
}
