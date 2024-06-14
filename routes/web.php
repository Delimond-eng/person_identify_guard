<?php

use App\Models\Personne;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('formulaire-personne');
    });
    Route::get('/print/{personneID}', function ($personneID) {
        $person = Personne::with('province')
            ->with('province')
            ->with('territoire')
            ->with('secteur')
            ->with('chefferie')
            ->with('conjoint')
            ->with('enfants')
            ->with('membres')
            ->with('etudes')
            ->where('id',$personneID )->first();
        return view('printing.person_invoice',
         ['personne'=> $person]
        );
    });
    Route::post('/store', [\App\Http\Controllers\PersonneIDGuardController::class, 'createPerson'])->name('person.store');

    Route::get('/provinces', [\App\Http\Controllers\AppConfigController::class, 'getProvinces']);
    Route::get('/territoires', [\App\Http\Controllers\AppConfigController::class, 'getTerritoires']);
    Route::get('/secteurs', [\App\Http\Controllers\AppConfigController::class, 'getSecteurs']);
    Route::get('/chefferies', [\App\Http\Controllers\AppConfigController::class, 'getChefferies']);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});