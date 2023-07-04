<?php

use Illuminate\Support\Facades\Route;


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

// my first endpoint API version 1

// Route::get('greetings', function(){
//   return "Hello World";
// });

// version 2 in JSON

Route::get('greetings', function(){
  return response()->json([
    'title' => "Technical test made by Sonia for Tayo",
    'greeting' => 'Hello',
    'names' => 'Etienne & Nathan'
  ], 200);
});
