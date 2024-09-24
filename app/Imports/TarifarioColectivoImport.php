<?php

namespace App\Imports;

use App\Modelos\TarifarioColectivo;
use Maatwebsite\Excel\Concerns\{Importable, WithStartRow,ToModel, WithHeadingRow, WithValidation,WithCalculatedFormulas};
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TarifarioColectivoImport implements ToModel,WithStartRow,WithCalculatedFormulas
{
    /**
    * (integer)param array $row
    *
    * (integer)return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TarifarioColectivo([
            //
            'origen' => (string)$row[0],
            'destino' => (string)$row[1],
            'taxi_standar_hdos_sin' => (integer)$row[2],
            'taxi_standar_hdos_con' => (integer)$row[3],
            'taxi_micro_hcuatro_sin' => (integer)$row[4],
            'taxi_micro_hcuatro_con' => (integer)$row[5],
            'transtur_micro_hocho_sin' => (integer)$row[6],
            'transtur_micro_hocho_con' => (integer)$row[7],
            'transtur_mini_hdoce_con' => (integer)$row[8],
            'transtur_mini_hveinte_con' => (integer)$row[9],
            'transtur_omnibus_htreinta_con' => (integer)$row[10],
            'transtur_omnibus_hcuarentatres_con' => (integer)$row[11],
        ]);
    }
    public  function startRow(): int
    {
        return 8;
    }
}
