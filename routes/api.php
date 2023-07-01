<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// my first endpoint API version 1

// Route::get('greetings', function(){
//   return "Hello World";
// });

// version 2 en JSON

Route::get('greetings', function(){
  return response()->json([
    'status' => 200,
    'greeting' => 'Hello',
    'name' => 'Sonia'
  ], 200);
});
