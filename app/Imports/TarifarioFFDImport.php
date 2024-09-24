<?php

namespace App\Imports;

use App\Modelos\TarifarioFFD;
use Maatwebsite\Excel\Concerns\{Importable, WithStartRow,ToModel, WithHeadingRow, WithValidation,WithCalculatedFormulas};
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TarifarioFFDImport implements ToModel,WithStartRow,WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   public function model(array $row)
    {

            return new TarifarioFFD([
                'noches' =>(string)$row[1],
                'auto_mercedes_benz_b180_1auto_1hab' =>(integer) $row[2],
                'auto_mercedes_benz_b180_1auto_2hab' => (integer) $row[3],
                'auto_mercedes_benz_c200_1auto_1hab' => (integer)$row[4],
                'auto_mercedes_benz_c200_1auto_2hab' =>(integer) $row[5],
                'auto_maxus_g10_1auto_1hab' => (integer)$row[6],
                'auto_maxus_g10_1auto_2hab' => (integer)$row[7],
                'auto_hyundai_santa_fe_1auto_1hab' => (integer)$row[8],
                'auto_hyundai_santa_fe_1auto_2hab' => (integer)$row[9],
                'auto_mercedes_benz_e200_1auto_1hab' => (integer)$row[10],
                'auto_mercedes_benz_e200_1auto_2hab' => (integer)$row[11],
            ]);
    }
    public  function startRow(): int
    {
        return 7;
    }

    /*public function collection(Collection $rows)
    {
        for ($i = 6; $i <=21; $i++)
        {
           foreach ($rows->toArray() as $item)
           {
               dd($item);
           }
           for ($j = 0; $j <=count($rows); $j++)
           {
            TarifarioFFD::create([
                'noches' =>$i,
                'auto_mercedesBenz_B180_1auto_1hab' => $j[$i]['C'],
                'auto_mercedesBenz_B180_1auto_2hab' => $j[$i]['D'],
                'auto_mercedesBenz_C200_1auto_1hab' => $j[$i]['E'],
                'auto_mercedesBenz_C200_1auto_2hab' => $j[$i]['F'],
                'auto_maxus_1auto_1hab' => $j[$i]['G'],
                'auto_maxus_1auto_2hab' => $j[$i]['H'],
                'auto_hyundaiSantaFE_1auto_1hab' => $j[$i]['I'],
                'auto_hyundaiSantaFE_1auto_2hab' => $j[$i]['J'],
                'auto_mercedesBenz_E200_1auto_1hab' => $j[$i]['K'],
                'auto_mercedesBenz_E200_1auto_2hab' => $j[$i]['L'],
            ]);
           }
        }
    }*/

    /*public function rules(): array
    {
        return [

            // Siempre valida por lotes
            // Fila.columna
            '1.0' => 'in:Noches',
            '0.1' => 'in:Mercedes Ben',
            '0.2' => 'in:Ud',
            '0.3' => 'in:Resumen',

        ];
    }*/
}
