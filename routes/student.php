<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('student')->user();

    //dd($users);

    return route('student.dashboard.index');
})->name('dashboard');


Route::get('lang/{lang}', function ($lang) {
    session()->has('lang') ? session()->forget('lang') : '';
    $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
    return back();
});


Route::group(['prefix' => 'join','middleware'=>'accepted'], function () {


//    Route::get('/', ['as' => 'join.index', 'uses' => 'joinController@index']);
    Route::get('/create', ['as' => 'join.create', 'uses' => 'joinController@create']);
    Route::post('/store', ['as' => 'join.store', 'uses' => 'joinController@store']);
    Route::get('/edit', ['as' => 'join.edit', 'uses' => 'joinController@edit']);
    Route::post('/update', ['as' => 'join.update', 'uses' => 'joinController@update']);


    Route::get('schools/{type}', 'joinController@showSchools')->name('school.show');
    Route::get('regions/{type}', 'joinController@showRegions')->name('region.show');
});


Route::group(['prefix' => 'dashboard','middleware'=>'accepted'], function () {

    Route::get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);
    Route::get('/edit', ['as' => 'dashboard.edit', 'uses' => 'DashboardController@edit']);
    Route::post('/update', ['as' => 'dashboard.update', 'uses' => 'DashboardController@update']);

    Route::get('/regions/{type}', 'DashboardController@showRegions')->name('region.show');


});