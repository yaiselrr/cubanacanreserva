<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class FlexiDrive extends Model
{
    use PostSave;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'imagen','fichero_listado_hoteles','fichero_informacion_ampliada'
        ,'tarifario_FFD','dias_antelacion_rese_alta_id','dias_antelacion_rese_baja_id'];
    protected $table = 'flexi_drives';
    protected $primaryKey = 'id';

    function flexi_drive_translations()
    {
        return $this->hasMany('App\Modelos\FlexiDriveTraslation');
    }

    function tarifario_FFD()
    {
        return $this->hasOne('App\Modelos\FlexiDrive');
    }
}
