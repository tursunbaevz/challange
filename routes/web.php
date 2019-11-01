<?php

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
// --- main ---

Route::get('/{any}', 'Api\V1\GoalsController@main')->where('any', '.*');
//Route::get('/', 'MainController@index');


// ------- --------- Auth ---------- -------------

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('showLoginForm');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


// ------- --------- User ---------- -------------

Route::get('/user/board', 'UsersController@index')->name('user.board');
Route::post('/users/update/{user}', 'UsersController@update')->name('user.update');

// ------- --------- Goals ---------- -------------
//Route::get("/goals/create", "GoalsController@create")->name('goals.create');
//Route::get("/goals/edit/{goal}","GoalsController@edit")->name('goals.edit');
//Route::post("/goals/update/{goal}","GoalsController@update")->name('updateGoal');
//Route::post("/goals/store","GoalsController@store")->name('storeGoal');
//Route::get("/goals","GoalsController@index")->name('goals');
//Route::get("/all-goals","GoalsController@allGoals")->name('allGoals');
//
//Route::get("/user/guest/details/{user}", "GoalsController@userGuestDetails")->name('user.guest.details');


// ------- --------- Admin ---------- -------------

Route::prefix('admin')->group(function(){

    Route::get('/users', 'Admin\UsersController@index')->name('admin.users.list');
    Route::get('/users/create', 'Admin\UsersController@create')->name('admin.create.user');
    Route::post('/users/store', 'Admin\UsersController@store');
    Route::post('users/destroy/{id}', array('as' => 'user', 'uses' => 'Admin\UsersController@destroy'));
    Route::post('/users/update/{user}', 'Admin\UsersController@update');
    Route::get('/users/edit/{user}', 'Admin\UsersController@edit');

});