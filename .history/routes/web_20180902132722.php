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


//Route::middleware('auth')->group( function(){
    Route::get('/', 'ContentsController@home')->name('home');
    Route::get('/clients', 'ClientController@index')->name('clients');
    Route::get('/clients/new', 'ClientController@newClient')->name('new_client');
    Route::post('/clients/new', 'ClientController@newClient')->name('create_client');
    Route::get('/clients/{client_id}', 'ClientController@show')->name('show_client');
    Route::post('/clients/{client_id}', 'ClientController@modify')->name('update_client');
    Route::get('/reservations/{client_id}', 'RoomsController@checkAvailableRooms')->name('check_room');
    Route::post('/reservations/{client_id}', 'RoomsController@checkAvailableRooms')->name('check_room');
    Route::get('/book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'ReservationsController@bookRoom')->name('book_room');
    Route::get('export', 'ClientController@export')->name('export');
    Route::get('/upload', 'ContentsController@upload')->name('upload');
    Route::post('/upload', 'ContentsController@upload')->name('upload');
    

//} ); 



Route::get('/about', function () {
    $response_arr = [];
    $response_arr['author'] = 'BP';
    $response_arr['version'] = '0.1.1';
    return $response_arr;
    //return '<h3>About</h3>';
});


Route::get('/di', 'ClientController@di');

Route::get('/facades/db', function () {
    
    return DB::select('SELECT * from table');
});

Route::get('/facades/encrypt', function () {
    
    return Crypt::encrypt('123456789');
});

//eyJpdiI6IjVuV1lWR3JXRlFmdGFHbXljN0Vodnc9PSIsInZhbHVlIjoibEpLQWJSdmgybDBXRHdjNDJadERwM0lZRWlLZnA5d2hcL1wvMHdCNEpCSklFPSIsIm1hYyI6ImE1NDQxZDhiMTAyNjQyNTZkOTZlY2NkZTdmNmIxYThhNjU1OTI2MGI2OTFmYWUxNmRlODk1ZDNiODgxMTY3YzAifQ==

Route::get('/facades/decrypt', function () {
    
    return Crypt::decrypt('eyJpdiI6IjVuV1lWR3JXRlFmdGFHbXljN0Vodnc9PSIsInZhbHVlIjoibEpLQWJSdmgybDBXRHdjNDJadERwM0lZRWlLZnA5d2hcL1wvMHdCNEpCSklFPSIsIm1hYyI6ImE1NDQxZDhiMTAyNjQyNTZkOTZlY2NkZTdmNmIxYThhNjU1OTI2MGI2OTFmYWUxNmRlODk1ZDNiODgxMTY3YzAifQ==');
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/generate/password', function(){ return bcrypt(123456789); });