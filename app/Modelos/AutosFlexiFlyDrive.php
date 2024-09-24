<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class AutosFlexiFlyDrive extends Model
{
    use PostSave;
    protected $fillable = ['imagen','id','capacidad_pasajero','aire_acondicionado','air_baqs'
        ,'motor','puertas','motor','categoria','rentadora','reproductor','trasnmision','tipo'];
    protected $table = 'autos_flexi_fly_drives';
    protected $primaryKey ='id';

    function autos_flexifly_drive_traslations()
    {
        return $this->hasMany('App\Modelos\AutosFlexiFlyDriveTraslation');
    }
}
