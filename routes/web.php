<?php

use App\Http\Livewire\Component\Front\Page\TeknikKomputer\TeknikKomputerBase;
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

Route::view('/', 'welcome')->name('home');


Route::get('/teknik-komputer', TeknikKomputerBase::class)->name("teknik-komputer");

/* Route::get('/', App\Http\Livewire\Component\Front\Homepage::class)->name('home'); */
Route::get('/', App\Http\Livewire\Component\Front\SiteComponent::class)->name('home');

Route::get('site/{slug}', App\Http\Livewire\Component\Front\SiteComponent::class)->name('site');

Route::get('switch/{lang}',[App\Http\Controllers\LanguageController::class, 'switchLang'])->name('switch.lang');

Route::get('/home', function(){
    return view('livewire.component.front.news');
})->name('news');
