<?php

use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RestaurantController::class, 'showForm']);
Route::post('/search', [RestaurantController::class, 'search']);