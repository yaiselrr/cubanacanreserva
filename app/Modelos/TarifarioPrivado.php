<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;
class TarifarioPrivado extends Model
{
    use PostSave;
    protected $table = 'tarifarios_privados';

    protected $primaryKey = 'id';
    protected $fillable = [
        'origen',
        'destino',
        'taxi_standar_dos_sin',
        'taxi_standar_dos_con',
        'taxi_micro_cuatro_sin',
        'taxi_micro_cuatro_con',
        'transtur_micro_diez_sin',
        'transtur_micro_diez_con',
        'transtur_mini_quice_con',
        'transtur_mini_veintecuatro_con',
        'transtur_omnibus_treintacuatro_con',
        'transtur_omnibus_cuarentacuatro_con'
    ];
    protected $guarded = [];
}
