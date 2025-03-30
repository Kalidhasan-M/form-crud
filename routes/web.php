<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserformController;
use App\Models\Userform;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/edit-form/{id}', function ($id) {
    $user = Userform::findOrFail($id);
    return view('editform',['user'=> $user]);
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/listuser', function () {
    $userdata = Userform::all();
    return view('list',[
        'userdata' => $userdata
    ]);
})->middleware(['auth', 'verified'])->name('admin.listuser');

Route::resource('userforms', UserformController::class);

Route::post('/userforms', [UserformController::class,'store']);
Route::put('/userforms/{id}', [UserformController::class, 'show']);
Route::delete('/userforms/{id}', [UserformController::class, 'destroy'])->name('userforms.destroy');


Route::post('/userforms/{id}', [UserformController::class,'update']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
require __DIR__.'/auth.php';
