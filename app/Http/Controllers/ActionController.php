<?php

namespace App\Http\Controllers;

use App\Visit;
use App\Action;
use App\Worker;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class ActionController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
public function index()
{
    $actions = Action::select('*')
    ->get();

    return view('actions.list', ['actions' => $actions]);
}

public function read(){

if (($handle = fopen ( public_path () . '/audittrail.csv', 'w' )) !== FALSE) {
while ( ($data = fgetcsv ( $handle, 15, ',' )) !== FALSE ) {
  $csv_data = new Visit ();
  $csv_data->date = $data [1];
  $csv_data->idParalax = $data [3];
  $csv_data->action = $data [4];
  $data [5];
  $data [6];
  $csv_data->save ();
}
fclose ( $handle );
}
$actions = $csv_data::all ();
return view ( 'actions.list',['actions' => $actions]);
}
}
