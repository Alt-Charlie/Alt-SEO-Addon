<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['statamic.cp.authenticated'], 'namespace' => 'AltDesign\AltSeo\Http\Controllers'], function() {
    
    // Settings
    Route::group(['middleware' => ['can:view alt-seo']], function () {
        Route::get('/alt-design/alt-seo/', 'AltController@index')->name('alt-seo.index');
        Route::post('/alt-design/alt-seo/', 'AltController@update')->name('alt-seo.update');
    });

    // Statamic V6 redirect the Addon settings route
    Route::get('/addons/alt-seo/settings', fn () => redirect()->to(cp_route('alt-seo.index')));
});
