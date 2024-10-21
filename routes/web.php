<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FoodfactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Blog routes
/*
Route::middleware('auth')->group(function () {
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{slug}/edit', [BlogController::class, 'edit'])->name('blogs.edit');

});

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::put('/blogs/{slug}', [BlogController::class, 'update'])->name('blogs.update');
// Comment routes - make sure user is authenticated to post a comment
Route::post('/blogs/{blog}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
*/

// Blog routes
Route::middleware('auth')->group(function () {
    Route::get('/blogs/{category}/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs/{category}', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{category}/{slug}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
});

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index'); // Show blogs in a category

Route::get('/blogs/{category}/{slug}', [BlogController::class, 'show'])->name('blogs.show'); // Show individual blog with category
Route::put('/blogs/{category}/{slug}', [BlogController::class, 'update'])->name('blogs.update');
// Comment routes - make sure user is authenticated to post a comment
Route::post('/blogs/{category}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
// Route to display all blogs within a specific category
Route::get('/blogs/{category}', [BlogController::class, 'showByCategory'])->name('blogs.byCategory');






Route::get('/resume',[HomeController::class, 'resume'])->name('resume');


Route::get('/foodfact',[FoodfactController::class, 'index'])->name('foodfact.index');
// Route to show the barcode scanning view
Route::get('/scan', [FoodfactController::class, 'showScanView'])->name('foodfact.scan');
// Route to process the scanned barcode
Route::post('/scan', [FoodfactController::class, 'processBarcode'])->name('processBarcode');
Route::get('/food',[FoodfactController::class, 'menu'])->name('food.index');

Route::resource('recipes', RecipeController::class)->except(['create', 'edit']);

require __DIR__.'/auth.php';
