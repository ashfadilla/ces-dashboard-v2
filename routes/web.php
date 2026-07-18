<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\espController;
use App\Http\Controllers\exportController;
use App\Http\Controllers\labDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jamurDashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', 'dashboard');

Route::get('dashboard', [dashboardController::class, 'index'])->name("dashboard.living-lab");
Route::get('dashboard/data', [dashboardController::class, 'getDashboardData']);
Route::get('dashboard/chart/{data}', [dashboardController::class, 'chartData']);
Route::get('dashboard/heatMap', [dashboardController::class, 'heatMapData']);

Route::get('dashboard/exportCsv/{scale}', [exportController::class, 'exportCsv'])->name('exportCsv');
Route::get('dashboard/activeButton/{scale?}', [dashboardController::class, 'pumpActive'])->name('pumpActivation');

Route::get('dashboard/lab-scale', [labDashboardController::class, 'index'])->name("dashboard.lab-scale");
Route::get('dashboard/lab/data', [labDashboardController::class, 'getDashboardData']);
Route::get('dashboard/lab/chart/{data}', [labDashboardController::class, 'chartData']);
Route::get('dashboard/lab/heatMap', [labDashboardController::class, 'heatMapData']);

 Route::get('dashboard/jamur', [jamurDashboardController::class, 'index'])->name("dashboard.jamur");
 Route::get('dashboard/jamur/data', [jamurDashboardController::class, 'getDashboardData']);
 Route::get('dashboard/jamur/chart/{data}', [jamurDashboardController::class, 'chartData']);
