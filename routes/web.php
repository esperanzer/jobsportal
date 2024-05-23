<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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
/*
common resources  routes that we have , namele:
1. index – shows all listings 
2. show – show single listing
3. create -  show form to create single listing
4. store – store new listing
5. edit – show form to edit listing
6. update – update listing
7 . destroyed – delete listing
*/

// all listings 
Route::get('/', [ListingController::class, 'index']);

//show create form
Route::get('/listings/create', [ListingController::class, 
'create'])->middleware('auth');


// store listing data
Route::post('/listings/', [ListingController::class, 'store'])
->middleware('auth');


// show Edit form- 
// (for showing data whch is stack in the form)
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// update listing 
Route::put('/listings/{listing}', [ListingController::class,
'update'])->middleware('auth');

    // Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');


//single listing
//make sure this single listing is below not on the above listing
Route::get('/listings/{listing}',
[ListingController::class, 'show']);
    
//Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New User
//(the actual submission/creation of the above 'Show Register/Create Form' new user)
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

//Log Use Out
Route::post('/logout', [UserController::class, 'logout'])
->middleware('auth');

//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log In User(the actual login)
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



 








