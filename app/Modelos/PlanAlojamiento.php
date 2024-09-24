<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class PlanAlojamiento extends Model
{
    use PostSave;

    protected $fillable = ['id',
        'planalojamiento'
    ];
    protected $table = 'plan_alojamientos';
    protected $primaryKey = 'id';

    function hotel_planalojamiento()
    {
        return $this->belongsTo('App\Hotel');
    }
}
