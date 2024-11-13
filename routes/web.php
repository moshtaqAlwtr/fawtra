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
// routes/web.php


use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function () {
        // الصفحة الرئيسية
        Route::get('/', function () {
            return view('welcome');
        });

        // مسارات الصفحات الأخرى
        Route::get('/human-resources', function () {
            return view('layouts.nav-slider-route', ['page' => 'human_resources']);
        })->name('human_resources');

        Route::get('/invoice-management', function () {
            return view('layouts.nav-slider-route', ['page' => 'invoice-management']);
        })->name('invoice-management');
    }
);


