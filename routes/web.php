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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => ''], function () {
	Voyager::routes();
	/*override login*/
	Route::group(['as' => 'voyager.'], function () {	
		Route::get('login', ['uses' => 'Voyager\VoyagerAuthController@login',     'as' => 'login']);
		Route::post('login', ['uses' => 'Voyager\VoyagerAuthController@postLogin', 'as' => 'postlogin']);
	});
});
Route::view('import_debug','import');
Route::get('item_ledger_entries_template','ImportController@item_ledger_entries_template');
Route::post('import_item_ledger','ImportController@item_ledger_entries');
Route::post('import_item_ledger/confirm','ImportController@confirm_item_ledger_entries');
Route::post('kartu_stok/{id}','KartuStokController');


//debug
Route::get('test_pdf',function(){
	$pdf = App::make('dompdf.wrapper');
	$pdf->loadHTML('<h1>Test</h1>');
	return $pdf->stream();
});
