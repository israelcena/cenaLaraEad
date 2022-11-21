<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CourseController, LessonController, ModuleController, SupportController};

Route::get('/', function () {
    return response()->json([
        'success' => true,
    ]);
});

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

Route::controller(SupportController::class)->group(function(){
    Route::get('/supports', 'index')->name('supports'); 
    Route::post('/supports', 'store')->name('supports.store');
    Route::get('/supports/me', 'showByUser')->name('support.user');
    Route::get('/supports/{id}', 'show')->name('support.show');
    Route::get('/lesson/{id}/supports', 'showByLesson')->name('lesson.supports');
});
