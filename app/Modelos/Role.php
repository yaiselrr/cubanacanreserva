<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Role extends Model
{
    use PostSave;

    protected $guarded = [];
    protected $fillable = ['nombre'];

    public function users()
    {
        return $this->hasMany('App\Modelos\User');
    }
    public function permisos()
    {
        return $this->belongsToMany('App\Modelos\Permiso',
            'permisos_role','role_id','permiso_id');
    }
}
