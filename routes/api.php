<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CourseController};

Route::get('/health-check', function () {
    return response()->json(['success' => true,]);
})->name('health-check');

Route::controller(CourseController::class)->group(function() {
    Route::get('/courses','index')->name('courses');
    Route::get('/courses/{id}', 'show')->name('courses.show');
});
