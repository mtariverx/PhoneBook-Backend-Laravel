<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneBookController;
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
Route::get('/api/get-all-phonenumbers', [PhoneBookController::class, 'getAllPhoneNumbers']);
Route::get('/api/set-phonenumber', [PhoneBookController::class, 'store']);
// Route::post('/api/set-phonenumber', [PhoneBookController::class, 'store']);
Route::get('/api/update-phonenumber', [PhoneBookController::class, 'update']);
Route::get('/api/delete-phonenumber', [PhoneBookController::class, 'destroy']);
Route::resource('phonebook', 'PhoneBookController');
