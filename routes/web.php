<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'TicketsController@latest')
    ->name('tickets.latest');

Route::get('populares', 'TicketsController@popular')
    ->name('tickets.popular');

Route::get('pendientes', 'TicketsController@open')
    ->name('tickets.open');

Route::get('tutoriales', 'TicketsController@closed')
    ->name('tickets.closed');

Route::get('solicitud/{id}', 'TicketsController@details')
    ->name('tickets.details');

Auth::routes();
