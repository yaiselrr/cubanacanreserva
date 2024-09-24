<?php

namespace App\Modelos;

use App\Auth\PostSave;
use Illuminate\Database\Eloquent\Model;

class TarifarioColectivo extends Model
{
    use PostSave;
    protected $table = 'tarifarios_colectivos';

    protected $primaryKey = 'id';
    protected $fillable = [
        'origen',
        'destino',
        'taxi_standar_hdos_sin',
        'taxi_standar_hdos_con',
        'taxi_micro_hcuatro_sin',
        'taxi_micro_hcuatro_con',
        'transtur_micro_hocho_sin',
        'transtur_micro_hocho_con',
        'transtur_mini_hdoce_con',
        'transtur_mini_hveinte_con',
        'transtur_omnibus_htreinta_con',
        'transtur_omnibus_hcuarentatres_con'
    ];
    protected $guarded = [];
}
