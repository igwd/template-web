<?
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller{

    public function switchLang($lang){
        $forgetCookie = Cookie::forget('language');

        // Set a new cookie with the selected language
        $newCookie = cookie('language', $lang, 60*24*30); // Cookie lasts for 30 days

        // Attach the new cookie and remove the old one from the response
        return redirect()->back()->withCookie($forgetCookie)->withCookie($newCookie);
    }
}