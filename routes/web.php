<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard_layout');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get("/addCategoryPage", [CategoryController::class, "create"])->name("addCategoryUi");
Route::post("/addCategoryPage_store", [CategoryController::class, "store"])->name("addCategoryOnTable");
Route::get("/allCategories", [CategoryController::class, "index"])->name("viewCategories");
Route::delete("/deleteCategory/{id}", [CategoryController::class, "destroy"])->name("deleteCategory");
Route::get("/editCategoryPage/{id}", [CategoryController::class, "edit"])->name("updateCategory");
Route::put("/updateCategory/{id}", [CategoryController::class, "update"])->name("updateCategoryDb");

require __DIR__ . '/auth.php';
