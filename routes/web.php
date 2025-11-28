<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Route::view('/', 'home')->name('home');
Route::view('/about-us', 'about_us')->name('about_us');
Route::view('/contact', 'contact')->name('contact');

Route::get('lang/{locale}', function ($locale) {
    // Allowed locales must match folder names in resources/lang
    // e.g. en/, ms/, zh_CN/
    $available = ['en','ms','zh_CN'];
    if (! in_array($locale, $available)) {
        $locale = 'en';
    }
    session(['locale' => $locale]);
    //it pass to the middleware SetLocale to set the language
    //then redirect back to the previous page
    //in kernel set the middleware to web group
    return redirect()->back();
})->name('lang.switch');