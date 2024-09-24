<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class AutosFlexiFlyDriveTraslation extends Model
{
    use PostSave;
    protected $fillable = ['autosdrive_id', 'locale','id','caracteristicas'];
    protected $table = 'autos_flexi_fly_drive_traslations';
    protected  $primaryKey = 'id';

    function autos_flexifly_drive()
    {
        return $this->belongsTo('App\Modelos\AutosFlexiFlyDrive');
    }
}
