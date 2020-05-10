<?php

namespace App\Http\Controllers;
use App\Visit;
use Illuminate\Http\Request;
use App\Exports\VisitsExport;
use App\Imports\VisitsImport;
use Maatwebsite\Excel\Facades\Excel;

class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new UsersExport, 'visits.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new VisitsImport,request()->file('file'));

        $visits = Visit::select('*')
        ->get();

        return view('workers.visit', ['visits' => $visits]);
    }
}
