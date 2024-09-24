<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class DiasSemanaTraslation extends Model
{
    //
    protected $table = 'dias_semana_traslations';

    protected $primaryKey = 'id';

    protected $fillable = ['diassemana','id','dias_semanas_id','locale'];

    protected $guarded = [];

    public function dias_semana(){
        return $this->hasMany('App\Modelos\DiasSemana');
    }
}
