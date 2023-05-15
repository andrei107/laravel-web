<?php

use Illuminate\Support\Facades\Route;
use App\Classes\Locale;
use Illuminate\Support\Facades\Lang;

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

foreach (array_merge(Locale::getPreparedLocales(), ['']) as $prefix)
{
    Route::group(['prefix' => $prefix], function () {
        Route::get('setlocale/{locale}', 'LocalizationController@setLocale');

        Route::get('/', 'IndexController@index')->name('main');

        Route::get('/receipts', 'ReceiptCommonPageController@index')->name('receipts');
        Route::get('/receipts/{id}', 'ReceiptPageController@index')->name('receipt.item');
        Route::post('/filter', 'ReceiptCommonPageController@filter')->name('filter');

        Route::get('/advice', 'AdviceCommonPageController@index')->name('advice');
        Route::get('/advice/{id}', 'AdvicePageController@index')->name('advice.item');

        Route::get('/menufilter/{menu_id}', 'MenuReceiptController@index')->name('receiptByMenu');
    });

};


