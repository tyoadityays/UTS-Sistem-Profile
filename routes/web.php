<?php

use App\Http\Controllers\AdminController92;
use App\Http\Controllers\LoginController92;
use App\Http\Controllers\UsersController92;
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
    return redirect('/register92');
});

Route::group(['middleware' => ['isNotLogged']], function () {
    // Login & Register
    Route::view('/register92', 'register');
    Route::view('/login92', 'login');
    Route::post('/register92', [UsersController92::class, 'registerHandler92']);
    Route::post('/login92', [UsersController92::class, 'loginHandler92']);
});

Route::group(['middleware' => ['isUser']], function () {
    // dashboard user
    Route::get('/profile92', [UsersController92::class, 'profilePage92']);

    //change Password
    Route::get('/changePassword92', [UsersController92::class, 'editPasswordPage92']);
    Route::post('/updatePassword92', [UsersController92::class, 'updatePassword92']);

    // edit profile user
    Route::post('/updateProfil92', [UsersController92::class, 'updateProfil92']);
    Route::post('/uploadPhotoProfil92', [UsersController92::class, 'uploadPhotoProfil92']);
    Route::post('/uploadPhotoKTP92', [UsersController92::class, 'uploadPhotoKTP92']);
  	
});

Route::group(['middleware' => ['isAdmin']], function () {
    //dashboard && detail user
    Route::get('/dashboard92', [AdminController92::class, 'dashboardPage92']);
    Route::get('/detail92/{id}', [AdminController92::class, 'detailPage92']);

    // update user
    Route::get('/update92/user/{id}/status', [AdminController92::class, 'updateUserStatus92']);
    Route::post('/update92/user/{id}/agama', [AdminController92::class, 'updateUserAgama92']);

    // CRUD AGAMA
    // Show all agama
    Route::get("/agama92", [AdminController92::class, "agamaPage92"]);
    // add agama
    Route::post("/agama92", [AdminController92::class, "createAgama92"]);
    // show edit agama & update agama
    Route::get("/agama92/{id}/edit", [AdminController92::class, 'editAgamaPage92']);
    Route::post("/agama92/{id}/update", [AdminController92::class, 'updateAgama92']);
    // delete agama
    Route::get("/agama92/{id}/delete", [AdminController92::class, 'deleteAgama92']);
});

Route::get('/logout92', [UsersController92::class, 'logoutHandler92'])->middleware('isLogged');