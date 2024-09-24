<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class StatusReserva extends Model
{
    use PostSave;
    protected $fillable = ['id'];
    protected $table = 'status_reservas';
    protected $primaryKey ='id';


    function status_reservas_traslation()
    {
        return $this->belongsTo('App\Modelos\StatusReservaTranslation');
    }
}
