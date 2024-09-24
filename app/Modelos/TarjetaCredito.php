<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class TarjetaCredito extends Model
{
    use PostSave;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'id','imagen','nombre'];
    protected $table = 'tarjeta_creditos';
    protected $primaryKey = 'id';

}
