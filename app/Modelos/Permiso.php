<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class Permiso extends Model
{
    use PostSave;

    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany('App\Modelos\Role');
    }

    public static function generateFor($table_name, $display)
    {
        self::firstOrCreate(['nombre' => $table_name.'.index', 'nombre_tabla' => $table_name, 'nombre_accion'=> 'Navegar en '._($display)]);
        self::firstOrCreate(['nombre' => $table_name.'.show', 'nombre_tabla' => $table_name, 'nombre_accion'=> 'Ver detalles de '._($display)]);
        self::firstOrCreate(['nombre' => $table_name.'.edit', 'nombre_tabla' => $table_name, 'nombre_accion'=> 'Editar '._($display)]);
        self::firstOrCreate(['nombre' => $table_name.'.create', 'nombre_tabla' => $table_name, 'nombre_accion'=> 'Crear '._($display)]);
        self::firstOrCreate(['nombre' => $table_name.'.destroy', 'nombre_tabla' => $table_name, 'nombre_accion'=> 'Eliminar '._($display)]);
    }

    public static function removeFrom($table_name)
    {
        self::where(['nombre_tabla' => $table_name])->delete();
    }
}
