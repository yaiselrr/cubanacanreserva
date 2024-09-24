<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class StatusReservaTranslation extends Model
{
    use PostSave;
    protected $fillable = ['id','status','locale','status_reservas_id'];
    protected $table = 'status_reservas_translations';
    protected $primaryKey ='id';


    function status_reservas()
    {
        return $this->hasMany('App\Modelos\StatusReserva');
    }
}
