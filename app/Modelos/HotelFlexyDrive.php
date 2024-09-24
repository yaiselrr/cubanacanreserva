<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class HotelFlexyDrive extends Model
{
    use PostSave;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'provincia_id','hotel_id', 'cantidad_habitaciones_dobles'];
    protected $table = 'hotel_flexy_drives';
    protected $primaryKey = 'id';


    function provincia()
    {
        return $this->hasOne('App\Modelos\Provincia');
    }
    function hotel_flexy_drive()
    {
        return $this->hasOne('App\Modelos\Hotel');
    }

    public function reservar_flexi_drives()
    {
        return $this->belongsToMany('App\Modelos\ReservarFlexiFlyDrive','reservar_hoteles_flexi_fly_drive','hotel_id','reserva_id')
                ->withPivot('cantidad_habitaciones_dobles')
                ->withTimestamps();
    }

}
