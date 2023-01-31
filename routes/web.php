<?php


use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/{path}', IndexController::class)->where('path','.*');
