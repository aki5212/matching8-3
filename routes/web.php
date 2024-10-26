<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MessageController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SeekerController;
use App\Http\Controllers\SeekerController as ControllersSeekerController;
use App\Models\Seeker;

Route::get('/', function () {
    return view('welcome');
});

Route::get('messages', [MessageController::class, 'index']);
Route::post('messages', [MessageController::class, 'store']);

Route::prefix('admin/seekers')
    ->name('seeker.')
    ->controller(SeekerController::class)
    ->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('{seeker}', 'show')->whereNumber('seeker')->name('show');Route::get('create', 'create')->name('create');
    Route::post('', 'store')->name('store');
    Route::get('{seeker}/edit', 'edit')
        ->whereNumber('seeker')->name('edit');
    Route::put('{seeker}', 'update')
        ->whereNumber('seeker')->name('update');
    Route::delete('{seeker}', 'destroy')
        ->whereNumber('seeker')->name('destroy');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
