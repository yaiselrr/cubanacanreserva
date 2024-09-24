<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class PasajerosFlexiDrive extends Model
{
    use PostSave;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','numero_vuelo_arribo_cuba', 'fecha_arribo', 'nacionalidad_id',];
    protected $table = 'pasajeros_flexi_drives';
    protected $primaryKey = 'id';

    public function resevas_flexi_fly_drives()
    {
        return $this->belongsToMany('App\Modelos\ReservarFlexiFlyDrive');
    }
}
