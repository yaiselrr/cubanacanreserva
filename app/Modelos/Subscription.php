<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['nombre','email'];
    protected $table = 'suscribirces';
    protected $primaryKey ='id';
}
