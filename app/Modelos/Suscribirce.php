<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Suscribirce extends Model
{
    protected $fillable = ['nombre','email'];
    protected $table = 'suscribirces';
    protected $primaryKey ='id';
}
