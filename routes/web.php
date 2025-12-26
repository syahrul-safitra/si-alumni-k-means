<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ClusteringController;
use App\Models\Alumni;
use App\Models\AlumniCluster;
use App\Models\NumberDataAlumni;
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
    return view('Admin.dashboard', [
        'jumlahAlumni' => Alumni::count(),
        'jumlahAlumniC1' => AlumniCluster::where('cluster_id', 0)->count(),
        'jumlahAlumniC2' => AlumniCluster::where('cluster_id', 1)->count(),
        'jumlahAlumniC3' => AlumniCluster::where('cluster_id', 2)->count()
    ]);
});

Route::resource('alumni', AlumniController::class);


Route::get('/cluster', [ClusteringController::class, 'clustering']);

Route::get('/grafik', [ClusteringController::class, 'chartFromDB']);

Route::post('/admin/alumni/laporan-pdf-chart', [ClusteringController::class, 'generatePdfWithChart'])->name('alumni.laporan-pdf-chart');