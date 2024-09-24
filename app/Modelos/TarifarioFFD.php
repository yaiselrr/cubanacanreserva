<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Auth\PostSave;

class TarifarioFFD extends Model
{
    use PostSave;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $fillable = ['id','noches','auto_mercedes_benz_b180_1auto_1hab','auto_mercedes_benz_b180_1auto_2hab'
        ,'auto_mercedes_benz_c200_1auto_1hab','auto_mercedes_benz_c200_1auto_2hab','auto_maxus_g10_1auto_1hab',
        'auto_maxus_g10_1auto_2hab','auto_hyundai_santa_fe_1auto_1hab','auto_hyundai_santa_fe_1auto_2hab',
        'auto_mercedes_benz_e200_1auto_1hab','auto_mercedes_benz_e200_1auto_2hab'];

    protected $table = 'tarifario_f_f_d_s';

    function flexi_drive()
    {
        return $this->belongsTo('App\Modelos\FlexiDrive');
    }
}
