<?php

namespace App\Exports;

use App\Visit;
use Maatwebsite\Excel\Concerns\FromCollection;

class VisitsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Visit::all();
    }
}
