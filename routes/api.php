<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CourseController};

Route::get('/health-check', function () {
    return response()->json(['success' => true,]);
})->name('health-check');

Route::get('/courses', [CourseController::class, 'index']);