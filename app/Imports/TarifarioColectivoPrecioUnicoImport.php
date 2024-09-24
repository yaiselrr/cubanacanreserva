<?php

namespace App\Imports;

use App\Modelos\TarifarioColectivoPrecioUnico;
use Maatwebsite\Excel\Concerns\{Importable, WithStartRow,ToModel, WithHeadingRow, WithValidation,WithCalculatedFormulas};
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TarifarioColectivoPrecioUnicoImport implements ToModel,WithStartRow,WithCalculatedFormulas
{
    /**
     * (integer)param array $row
     *
     * (integer)return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new TarifarioColectivoPrecioUnico([
            //
            'aeropuerto' => (string)$row[1],
            'guion' => (string)$row[2],
            'hotel' => (string)$row[3],
            'ow' => (integer)$row[4],
            'cantidad' => (integer)$row[5],
        ]);
    }

    public  function startRow(): int
    {
        return 5;
    }
}
