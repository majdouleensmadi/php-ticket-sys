<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AgentDashboardController;
use App\Http\Controllers\AgentController;





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



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');



Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/dashboard', DashboardController::class);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/Adminhome', AdminDashboardController::class);
});


Route::get('home', function () {
    return view('home');
});
Route::get('/', function () {
    return view('home');
});
// Dashboard
Route::get('/Adminhome', [AdminDashboardController::class, 'index'])->name('Adminhome');
Route::resource('tickets', TicketController::class);


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/tickets', [TicketController::class, 'index'])->name('tickets');
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets');

Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets.show');



Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
// Route::get('/tickets/{edit}', [TicketController::class, 'edit'])->name('tickets.edit');
Route::get('/tickets/{id}/edit', [TicketController::class, 'edit'])->name('tickets.edit');

Route::put('/tickets/{id}', [TicketController::class, 'update'])->name('tickets.update');

Route::post('/tickets/{id}/destroy', [TicketController::class, 'destroy'])->name('tickets.destroy');


Route::post('/tickets', [TicketController::class,'store'])->name('tickets.store');

// View Tickets
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');

// Logout
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('logout', [TicketController::class])->name('logout');

Route::get('/agents', [AgentController::class, 'index'])->name('agents');

Route::get('/agents/{id}', [AgentController::class, 'show'])->name('agents.show');
Route::get('/agents/{id}/edit', [AgentController::class, 'edit'])->name('agents.edit');
Route::get('/agents', [AgentController::class, 'index'])->name('agents.index');

Route::get('/agentdashboard', [AgentDashboardController::class, 'index'])->name('agentdashboard');

Route::get('/agentdashboard/{id}', [AgentDashboardController::class, 'show'])->name('agentdashboard.show');
Route::get('/agentdashboard/{id}/edit', [AgentDashboardController::class, 'edit'])->name('agentdashboard.edit');
Route::get('/agentdashboard', [AgentDashboardController::class, 'index'])->name('agentdashboard.index');
