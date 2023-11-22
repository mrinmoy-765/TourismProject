<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//admin 

//login registration 

Route::get('/admin-login',[CustomAdminController::class,'login']);
Route::get('/admin-reg',[CustomAdminController::class,'registration'])->middleware('alreadyLoggedIn');
Route::post('/register-admin',[CustomAdminController::class,'registerAdmin'])->name('register-admin');
Route::post('/login-admin',[CustomAdminController::class,'loginAdmin'])->name('login-admin');
Route::get('/admin-dashboard',[CustomAdminController::class,'dashboardAdmin'])->middleware('isLoggedIn');
Route::get('/admin-logout',[CustomAdminController::class,'logoutAdmin']);



//profile handling


Route::get('/detailsadmin/{id}',[CustomAdminController::class,'adminDetails'])->name('detailsadmin');
Route::get('/edit-admin/{id}',[CustomAdminController::class,'adminEdit']);
Route::put('/update-admin/{id}', [CustomAdminController::class, 'updateAdmin']);
Route::get('/delete-admin/{id}',[CustomAdminController::class,'adminDelete'])->name('delete-admin');







//hotel 
Route::get('/hotel-list',[CustomAdminController::class,'hotelList']);
Route::get('/details/{id}',[CustomAdminController::class,'hotelDetails'])->name('details');
Route::get('/delete-hotel/{id}',[CustomAdminController::class,'hotelDelete'])->name('delete-hotel');
Route::get('/add-hotel',[CustomAdminController::class,'addHotel']);
Route::post('/register-hotel',[CustomAdminController::class,'registerHotel'])->name('register-hotel');
Route::get('/edit-hotel/{id}',[CustomAdminController::class,'hotelEdit']);
Route::put('/update-hotel/{id}', [CustomAdminController::class, 'update']);


//bus
Route::get('/bus-list',[CustomAdminController::class,'busList']);
Route::get('/detailsbus/{id}',[CustomAdminController::class,'busDetails'])->name('detailsbus');
Route::get('/add-bus',[CustomAdminController::class,'addBus']);
Route::post('/register-bus',[CustomAdminController::class,'registerBus'])->name('register-bus');
Route::get('/edit-bus/{id}',[CustomAdminController::class,'busEdit']);
Route::put('/update-bus/{id}', [CustomAdminController::class, 'updateBus']);
Route::get('/delete-bus/{id}',[CustomAdminController::class,'busDelete'])->name('delete-bus');

//cars
Route::get('/car-list',[CustomAdminController::class,'carList']);
Route::get('/detailscar/{id}',[CustomAdminController::class,'carDetails'])->name('detailscar');
Route::get('/add-car',[CustomAdminController::class,'addCar']);
Route::post('/register-car',[CustomAdminController::class,'registerCar'])->name('register-car');
Route::get('/edit-car/{id}',[CustomAdminController::class,'carEdit']);
Route::put('/update-car/{id}', [CustomAdminController::class, 'updateCar']);
Route::get('/delete-car/{id}',[CustomAdminController::class,'carDelete'])->name('delete-car');

//gallery

Route::get('/image-list',[CustomAdminController::class,'imageList']);
Route::get('/add-image',[CustomAdminController::class,'addImage']);
Route::post('/register-image',[CustomAdminController::class,'registerImage'])->name('register-image');
Route::get('/delete-image/{id}',[CustomAdminController::class,'imageDelete'])->name('delete-image');


//upcoming tours
Route::get('/tour-list',[CustomAdminController::class,'tourList']);
Route::get('/detailstour/{id}',[CustomAdminController::class,'tourDetails'])->name('detailstour');
Route::get('/add-tour',[CustomAdminController::class,'addTour']);
Route::post('/register-tour',[CustomAdminController::class,'registerTour'])->name('register-tour');
Route::get('/edit-tour/{id}',[CustomAdminController::class,'tourEdit']);
Route::put('/update-tour/{id}', [CustomAdminController::class, 'updateTour']);
Route::get('/delete-tour/{id}',[CustomAdminController::class,'tourDelete'])->name('delete-tour');




//mail handler
Route::get('/contact',[CustomAdminController::class,'contactForm'])->name('contactForm');
Route::post('/send',[CustomAdminController::class,'send'])->name('send.email');