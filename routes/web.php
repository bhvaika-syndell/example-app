<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function(){
    return view('first');
});


Route::get('/test', [HomeController::class, 'adduser']);
Route::post('/demo', [HomeController::class, 'car']);
Route::get('/find/{id}', [HomeController::class, 'idwise']); 

Route::post('/data', [HomeController::class, 'insert']);
Route::get('/view', [HomeController::class, 'index']); //to view data using get method
Route::post('/update/{id}', [HomeController::class, 'update']);
Route::get('/delete/{id}', [HomeController::class, 'delete']);

Route::get('/form', [HomeController::class, 'showForm'])->name('form.show');
Route::post('/form', [HomeController::class, 'submitForm'])->name('form.submit');
Route::get('/showdata', [HomeController::class, 'displayData'])->name('show.data');
Route::get('/editdata/{id}', [HomeController::class, 'showeditData'])->name('staff.edit');
Route::put('/editform/{id}', [HomeController::class, 'updateStaff'])->name('staff.editdata'); // Use PUT or PATCH method for updating
Route::delete('/removeStaff/{id}', [HomeController::class, 'deleteStaff'])->name('staff.delete');

