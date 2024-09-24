<?php
/**
 * Created by PhpStorm.
 * User: yaisel.rodriguez
 * Date: 22/07/2020
 * Time: 14:31
 */

namespace App\Services;

use App\Modelos\RutaConectandoCuba;


class Rutas
{
    public function get()
    {
        $rutass = RutaConectandoCuba::get();
        $rutasArray[''] = 'Seleccione una Ruta';
        foreach ($rutass  as $ruta){
            $rutasArray[$ruta->id] = $ruta->ruta;

        }
        return $rutasArray;
    }

}