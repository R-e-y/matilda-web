<?php

namespace App\Http\Controllers;

use App\Worker;
use App\Post;
use App\Office;
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
   /* public function __construct()
    {
        $this->middleware('auth');
    }
*/
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
        $workers = Office::select('*')->get();

        return view('workers.edit', ['worker' => $worker, 'workers' => $workers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workere $worker)
    {
        // var_dump($request->all());
        Worker::update($request->except(['_token', '_method']) )->where('id', $worker->id);

        // return redirect('workers');
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
}
