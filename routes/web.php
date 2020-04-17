<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Course;
use Illuminate\Http\Request;

Route::auth();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/workers', 'WorkerController@index')->name('workers');

Route::get('/workersForAccountant', 'WorkerController@indexForAccountant')->name('workers');



Route::post('/workers/add', 'WorkerController@store');


Route::get('/workers/add', 'WorkerController@create');

Route::delete('/workers/delete/{worker}', 'WorkerController@destroy');


Route::get('/workers/edit/{worker}', 'WorkerController@edit');

Route::get('/workers/editForAccountant/{worker}', 'WorkerController@editForAccountant');



Route::patch('/workers/update/{worker}', 'WorkerController@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
Route::match(['get', 'post'], '/adminOnlyPage/', 'WorkerController@admin');
});

// Route::get('/courses', 'CourseController@index')->name('courses')->middleware(StudentMiddleware::class);


Route::group(['middleware' => 'App\Http\Middleware\AccountantMiddleware'], function()
{
Route::match(['get', 'post'], '/accountantOnlyPage/', 'WorkerController@accountant');
});
