<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Attendee\HomeController;
use App\Http\Controllers\Organisers\EventOrganiserController;
use App\Http\Controllers\Authentication\Registration;
use App\Http\Controllers\Artist\ArtistHomeController;

use Illuminate\Support\Facades\Auth;

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

Route::get('attendee', [HomeController::class,'index']);
Route::get('events', [HomeController::class,'events']);
Route::get('artists', [HomeController::class,'artists']);
Route::get('refunds', [HomeController::class,'refunds']);
Route::get('viewartist/{id}', [HomeController::class,'artistpage']);
Route::get('followartist/{id}', [HomeController::class,'followartist']);
Route::get('buytickets/{id}', [HomeController::class,'buytickets']);
Route::post('cart', [HomeController::class,'updatecart']);
Route::post('checkout', [HomeController::class,'checkout']);






Route::get('organisers', [EventOrganiserController::class,'index']);
Route::get('createevent', [EventOrganiserController::class,'createevent']);
Route::get('activeevents', [EventOrganiserController::class,'activeevents']);
Route::get('findartists', [EventOrganiserController::class,'findartists']);
Route::get('previousevents', [EventOrganiserController::class,'previousevents']);
Route::get('deniedrequests', [EventOrganiserController::class,'deniedrequests']);
Route::get('acceptedrequests', [EventOrganiserController::class,'acceptedrequests']);
Route::post('addevent', [EventOrganiserController::class,'addevent']);
Route::post('sendrequest', [EventOrganiserController::class,'sendrequest']);
Route::get('addtoevent/{id}/{event_id}/{bookin_id}', [EventOrganiserController::class,'addtoevent']);
Route::get('deleteevent/{id}', [EventOrganiserController::class,'deleteevent']);
Route::get('viewevent/{id}', [EventOrganiserController::class,'viewevent']);
Route::get('editevent/{id}', [EventOrganiserController::class,'editevent']);
Route::put('updateevent/{id}', [EventOrganiserController::class,'updateevent']);



Route::post('payartist', [EventOrganiserController::class,'payartist']);





Route::post('reguser', [Registration::class,'storeuser']);
Route::post('signin', [Registration::class,'signin']);
Route::get('logout', [Registration::class,'logout']);



Route::get('artisthome', [ArtistHomeController::class,'index']);
Route::get('contenthome', [ArtistHomeController::class,'content']);
Route::get('eventbookings', [ArtistHomeController::class,'bookings']);
Route::get('videodisplay', [ArtistHomeController::class,'display']);
Route::get('albumsdisplay', [ArtistHomeController::class,'display2']);
Route::get('contentfeedback', [ArtistHomeController::class,'feedback']);
Route::get('acceptoffer/{id}', [ArtistHomeController::class,'acceptoffer']);
Route::get('rejectoffer/{id}', [ArtistHomeController::class,'rejectoffer']);








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
