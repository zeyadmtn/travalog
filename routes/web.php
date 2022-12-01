<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;
use App\Models\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $logs = Log::with('user')->latest()->get();
    info(gettype(unserialize(base64_decode($logs[0]->images))));

    foreach ($logs as $log) {
        $log->images = unserialize(base64_decode($log->images));
    }

    // dd(gettype($logs[0]->images));

    return view('welcome', [
        'logs' => $logs,
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('logs', LogController::class)
    ->only(['index', 'store', 'viewMyLogs', 'destroy', 'update'])
    ->middleware(['auth', 'verified']);

Route::get('/my-logs', [LogController::class, 'viewMyLogs'])
    ->middleware(['auth', 'verified']);

Route::post('image-upload', 'ImageController@imageUploadPost');

require __DIR__ . '/auth.php';
