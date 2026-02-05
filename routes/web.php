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

Route::get('/sitemap.xml', function () {
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    $urls = [
        route('home'),
        route('about_us'),
        route('contact'),
    ];

    foreach ($urls as $url) {
        $xml .= '<url>';
        $xml .= '<loc>'.$url.'</loc>';
        $xml .= '<lastmod>'.now()->toAtomString().'</lastmod>';
        $xml .= '<changefreq>weekly</changefreq>';
        $xml .= '<priority>0.8</priority>';
        $xml .= '</url>';
    }

    $xml .= '</urlset>';

    return response($xml, 200, [
        'Content-Type' => 'application/xml',
    ]);
});

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