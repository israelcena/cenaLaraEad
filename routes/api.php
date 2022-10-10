<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CourseController, LessonController, ModuleController};

Route::get('/health-check', function () {
    return response()->json(['success' => true,]);
})->name('health-check');

Route::controller(CourseController::class)->group(function() {
    Route::get('/courses','index')->name('courses');
    Route::get('/courses/{id}', 'show')->name('courses.show');
});

Route::get('/courses/{id}/modules', [ModuleController::class, 'showByCourse'])->name('courses.modules');

Route::controller(LessonController::class)->group(function() {
    Route::get('/modules/{id}/lessons', 'showByLesson')->name('modules.lessons');
    Route::get('/lesson/{id}', 'show')->name('lesson.show');
});

