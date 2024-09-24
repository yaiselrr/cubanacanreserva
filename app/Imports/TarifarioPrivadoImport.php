<?php

namespace App\Imports;

use App\Modelos\TarifarioPrivado;
//use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\{Importable, WithStartRow,ToModel, WithHeadingRow, WithValidation,WithCalculatedFormulas};
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TarifarioPrivadoImport implements ToModel,WithStartRow,WithCalculatedFormulas
{
    /**
    * (integer)param array $row
    *
    * (integer)return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TarifarioPrivado([
            'origen' => (string)$row[0],
            'destino' => (string)$row[1],
            'taxi_standar_dos_sin' => (integer)$row[2],
            'taxi_standar_dos_con' => (integer)$row[3],
            'taxi_micro_cuatro_sin' => (integer)$row[4],
            'taxi_micro_cuatro_con' => (integer)$row[5],
            'transtur_micro_diez_sin' => (integer)$row[6],
            'transtur_micro_diez_con' => (integer)$row[7],
            'transtur_mini_quice_con' => (integer)$row[8],
            'transtur_mini_veintecuatro_con' => (integer)$row[9],
            'transtur_omnibus_treintacuatro_con' => (integer)$row[10],
            'transtur_omnibus_cuarentacuatro_con' => (integer)$row[11],
        ]);
    }
    public  function startRow(): int
    {
        return 8;
    }
}
