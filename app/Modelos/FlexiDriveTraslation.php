<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class FlexiDriveTraslation extends Model
{
    use PostSave;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','descripcion_general', 'descripcion_hoteles',
        'descripcion_autos','locale','flexi_drive_id'];
    protected $table = 'flexi_drive_traslations';
    protected $primaryKey = 'id';

    function flexi_drive()
    {
        return $this->belongsTo('App\Modelos\FlexiDrive');
    }
}
