<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AuthController::class, 'showLoginForm'])->name('show.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); // Display tasks
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Store new task
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // Edit task form
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); // Update task
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Delete task
});


