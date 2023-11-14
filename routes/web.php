<?php
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

/* Route::get('/', App\Http\Livewire\Component\Front\Homepage::class)->name('home'); */

Route::get('/', function(){
    return view('livewire.component.front.homepage');
});

Route::get('site/{slug}', function($slug){
    return view('livewire.component.front.site',['slug'=>$slug]);
});

Route::get('switch/{lang}',[App\Http\Controllers\LanguageController::class, 'switchLang'])->name('switch.lang');

Route::get('/home', function(){
    return view('livewire.component.front.news');
})->name('home');
