<?php

namespace App\Modelos;

use Illuminate\Notifications\Notifiable;
use App\Auth\PostSave;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use PostSave;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','avatar', 'password', 'role_id','provincia_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function provincia(){
        return $this->belongsTo('App\Modelos\Provincia','provincia_id');
    }

    public function rol (){
        return $this->belongsTo('App\Modelos\Role','role_id');
    }
    public function hasAccess($permission){
        return $this->rol->permisos()->where('nombre',$permission)->exists();
    }
}
