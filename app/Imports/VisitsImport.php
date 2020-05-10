<?php

namespace App\Imports;

use App\Visit;
use Maatwebsite\Excel\Concerns\ToModel;

class VisitsImport implements ToModel
{
    /**
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Visit([
          'datetime'     => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[0]),
            'idParalax'    => $row[1],
            'action' => $row[2],

        ]);
    }
}
