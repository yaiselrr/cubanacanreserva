<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Nacionalidad extends Model
{
    use PostSave;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nacionalidad'];
    protected $table = 'nacionalidads';
    protected $primaryKey = 'id';

    public function pasajeros_flexi_drive(){
        return $this->hasOne('App\Modelos\Nacionaldad');
    }

    public function reservarTransferColectivo(){
        return $this->hasMany('App\Modelos\Nacionaldad');
    }
}
