<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class TransferPrecioUnico extends Model
{
    //
    use PostSave;
    protected $table = 'transfer_precio_unicos';

    protected $primaryKey = 'id';

    protected $fillable = [




        'dias_antelacion',
        'tarifario',

    ];

    protected $guarded = [



    ];

    public static function tarifario($fileName, $transfer)
    {

        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('tarifario/preciounico/',$filename);
            $transfer->tarifario = $filename;
        }
    }
}
