<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/health-check', function () {
    return response()->json(['success' => true,]);
})->name('health-check');

Route::get('/', function () {
    return response()->json(['success' => true,]);
});