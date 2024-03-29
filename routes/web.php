<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/post-login',[AuthController::class,'postLogin'])->name('post-login');
Route::post('/post-register',[AuthController::class,'postRegister'])->name('post-register');
Route::get('/register',[AuthController::class ,'register'])->name('register');

Route::group(['middleware'=> 'auth'],function (){

    Route::get('/',function(){
        return view('welcome');

    });

    Route::get('/home',function (){
        return view('home');
    })->name('home');
});
