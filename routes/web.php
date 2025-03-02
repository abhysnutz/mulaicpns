<?php

use App\Http\Controllers\Frontend\DownloadController;
use App\Http\Controllers\Frontend\ExamController;
use App\Http\Controllers\frontend\PaymentController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\PurchaseController;
use App\Http\Controllers\Frontend\TryoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('frontend.dashboard.index');
})->middleware(['auth','examDirect'])->name('dashboard.index');

Route::group(['middleware' => ['auth','examDirect'], 'as' => 'profile.'], function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('edit');
    Route::get('city', [ProfileController::class, 'city'])->name('city');
    Route::patch('profile', [ProfileController::class, 'update'])->name('update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'tryout', 'middleware' => ['auth'], 'as' => 'tryout.'], function () {
    Route::get('/', [TryoutController::class, 'index'])->name('index')->middleware('examDirect');
    Route::get('{id}/prepare', [TryoutController::class, 'prepare'])->name('prepare')->middleware('examDirect');
    Route::post('exam', [TryoutController::class, 'exam'])->name('exam');
    Route::get('{id}/working', [TryoutController::class, 'working'])->name('working');
    Route::get('questions', [TryoutController::class, 'questions'])->name('questions');
    Route::get('question', [TryoutController::class, 'question'])->name('question');
    Route::get('time', [TryoutController::class, 'time'])->name('time');
    Route::post('answer', [TryoutController::class, 'answer'])->name('answer');
    Route::post('finish/{id}', [TryoutController::class, 'finish'])->name('finish');
    Route::post('cancel{id}', [TryoutController::class, 'cancel'])->name('cancel');

    Route::group(['prefix' => 'result', 'as' => 'result.'], function () {
        Route::get('/', [ExamController::class, 'index'])->name('index');
        Route::get('{id}/statistic', [ExamController::class, 'statistic'])->name('statistic');
        Route::get('{id}/explanation', [ExamController::class, 'explanation'])->name('explanation');
        Route::get('questions', [ExamController::class, 'questions'])->name('questions');
        Route::get('answer', [ExamController::class, 'answer'])->name('answer');
    });
});

Route::group(['prefix' => 'pembelian', 'middleware' => ['auth'], 'as' => 'pembelian.'], function () {
    Route::get('/', [PurchaseController::class, 'index'])->name('index');
});

Route::group(['prefix' => 'download', 'middleware' => ['auth'], 'as' => 'download.'], function () {
    Route::get('/', [   DownloadController::class, 'index'])->name('index');
});

Route::group(['prefix' => 'payment', 'middleware' => ['auth'], 'as' => 'payment.'], function () {
    Route::get('/', [PaymentController::class, 'index'])->name('index');
    Route::post('store', [PaymentController::class, 'store'])->name('store');
});

Route::get('petunjuk_upgrade', function(){ return view('frontend.petunjuk_upgrade'); })->middleware(['auth'])->name('petunjuk_upgrade');

Route::group(['prefix' => 'console', 'middleware' => ['auth','admin']], function() {
    Route::get('/', function(){
        return 'hello Admin';
    });
});
    

require __DIR__.'/auth.php';