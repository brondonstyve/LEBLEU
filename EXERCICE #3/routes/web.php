<?php

use App\Http\Controllers\enregistrement;
use App\Http\Controllers\userIdentification;
use App\Http\Livewire\UserOperation;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[userIdentification::class,'index'])->name('login');
Route::get('/deconnexion',[userIdentification::class,'deconnexion'])->name('deconnexion');

//pages neccessitant un accès etant connecté
Route::middleware('auth')->group(function(){
    Route::get('/enregistrement',[enregistrement::class,'index'])->name('enregistrement');
});
