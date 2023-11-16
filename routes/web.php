<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Livewire\Component\Front\Page\TeknikKomputer\TeknikKomputerBase;

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

Route::get('/teknik-komputer', TeknikKomputerBase::class)->name("teknik-komputer");

Route::get('/', App\Http\Livewire\Component\Front\Homepage::class)->name('home');

Route::get('site/{slug}', App\Http\Livewire\Component\Front\SiteComponent::class)->name('site');

Route::get('switchs/{lang}',[App\Http\Controllers\LanguageController::class, 'switchLang'])->name('switch.lang.old');

Route::get('switch/{lang}', function($lang){
    $forgetCookie = Cookie::forget('language');
    // Set a new cookie with the selected language
    $newCookie = cookie('language', $lang, 60*24*30); // Cookie lasts for 30 days
    // Attach the new cookie and remove the old one from the response
    return redirect()->back()->withCookie($forgetCookie)->withCookie($newCookie);
})->name('switch.lang');

Route::get('/home', function(){
    return view('livewire.component.front.news');
})->name('news');
