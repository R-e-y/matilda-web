<?php

namespace App\Http\Controllers;

use App\Worker;
use App\Post;
use App\Office;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class WorkerController extends Controller
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


public function finditem(Worker $worker , $item)
    {
 $workers = $worker->where('idParalax', '$item')
        ->leftJoin('offices', 'workers.idOffice', '=', 'offices.idOffice')
        ->leftJoin('posts', 'workers.idPost', '=', 'posts.idPost')
        ->get();

        return view('workers.list', ['workers' => $workers]);
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::select('*')
        ->leftJoin('offices', 'workers.idOffice', '=', 'offices.idOffice')
        ->leftJoin('posts', 'workers.idPost', '=', 'posts.idPost')
        ->get();

        return view('workers.list', ['workers' => $workers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function create()
    {
        $offices = Office::select('*')->get();
        $posts = Post::select('*')->get();

        return view('workers.add',['posts' => $posts],['offices' => $offices]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation=$request->validate([
            'idParalax'=> 'required|min:5|max:6',
            'name' => 'required|min:3|max:255',
            'fixedSalary' => 'required|min:3|max:6',
            'idPost' => 'required',
            'idOffice' => 'required'

        ]);

        $worker = new Worker;
        $worker->idParalax = $request['idParalax'];
        $worker->name = $request['name'];
        $worker->fixedSalary = $request['fixedSalary'];
        $worker->idPost = $request['idPost'];
        $worker->idOffice = $request['idOffice'];
        $worker->save();

        return redirect('/workers');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Worker  $worker
     * @return \Illuminate\Http\Response
     */

       public function edit(Worker $worker)
    {
       $offices = Office::select('*')->get();
        $posts = Post::select('*')->get();


        return view('workers.edit', ['worker' => $worker,'posts' => $posts],['offices' => $offices]);
    }


 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Worker  $worker
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, Worker $worker )
    {
       // var_dump($worker);
       // var_dump($request->all());
       // die();
        Worker::where('id', $worker->id)->update($request->except(['_token', '_method']));
       return redirect('/workers');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
        $worker->delete();

        return redirect('/workers');
    }


    public function admin(Request $req){
    return redirect('/workers');
    }

        public function accountant(Request $req){
    return view('middleware')->withMessage("Accountant");
    }
}
