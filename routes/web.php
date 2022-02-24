<?php

//use Illuminate\Support\Facades\Route;

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

//use App\Http\Controllers\CsvFileController;
/*
Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('index', 'CsvFileController@index');
//Route::post('/upload', 'CsvFileController@upload');
//Route::post('import', 'CsvFileController@import');

//Route::get('startTime', 'CenvertedTimeController@index');


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

//Route::get('/', [PageController::class, 'index']);
Route::get('/', [PageController::class, 'index'])->name('Page.index');
Route::get('importCsv', [PageController::class, 'importCsv'])->name('Page.importCsv');
Route::get('grafico', [PageController::class, 'grafico'])->name('Page.grafico');

//Route::post('/uploadFile', [PageController::class, 'uploadFile'])->name('uploadFile');
//Route::get('/', [PageController::class, 'index']);