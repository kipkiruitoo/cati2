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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Route::group(
    [
        'namespace'     =>  'AidynMakhataev\LaravelSurveyJs\app\Http\Controllers',
        'middleware'    =>  config('survey-manager.route_middleware'),
        'prefix'        =>  config('survey-manager.route_prefix'),
    ],
    function () {
        Route::get('/{surveySlug}', 'SurveyController@runSurvey')->name('survey-manager.run');
    }
);

Route::group(
    [
        'namespace'     =>  'AidynMakhataev\LaravelSurveyJs\app\Http\Controllers',
        'prefix'        =>  config('survey-manager.admin_prefix').'/survey/',
        'middleware'    =>  config('survey-manager.admin_middleware'),
    ],
    function () {
        Route::view('{vue?}', 'survey-manager::admin')->where('vue', '[\/\w\.-]*')->name('survey-manager.admin');
    }
);