<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;
class ColectivoPrivado extends Model
{
    use PostSave;
    protected $table = 'colectivos_privados';

    protected $primaryKey = 'id';

    protected $fillable = [

        
       
        'tipo_traslado',
        'dias_antelacion',
        'tarifario',

    ];

    protected $guarded = [

        

    ];

    public function traslado(){
        return $this->belongsTo('App\Models\Traslado','traslado_id');
    }

    public static function tarifario($fileName, $privado)
    {

        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('tarifario/privados/',$filename);
            $privado->tarifario = $filename;
        }
    }

    public static function tarifariocolectivo($fileName, $privado)
    {

        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('tarifario/colectivos/',$filename);
            $privado->tarifario = $filename;
        }
    }
}
