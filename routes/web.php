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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');

Auth::routes();

//upload
Route::get('upload_file', function () {
    return view('upload');
});
use App\Http\Controllers\Files;

Route::post('store_file', [Files::class, 'fileStore']);

//Route::get('/home', 'HomeController@index')->name('home');
// Route::resources('userlog','UserLoginController');
// Route::resources('todo','TodoListController');
