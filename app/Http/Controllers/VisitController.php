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

class VisitController extends Controller
{
public function index()
{
    $actions = Action::select('*')
    ->get();

    return view('actions.list', ['actions' => $actions]);
}


}
