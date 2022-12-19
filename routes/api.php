<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ConseilController;
use App\Http\Controllers\API\MedicamentController;
use App\Http\Controllers\API\PharmacieController;
use App\Http\Controllers\API\SousSousTherapieController;
use App\Http\Controllers\API\SousTherapieController;
use App\Http\Controllers\API\TherapieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('view-pharmacie', [PharmacieController::class, 'index']);
Route::get('view-medicament', [MedicamentController::class, 'index']);
Route::get('view-conseil', [ConseilController::class, 'index']);
Route::get('list_allPharmacie/{sk}/{tk}', [PharmacieController::class, 'list_allPharmacie']);
Route::get('retriv', [PharmacieController::class, 'retrivAll']);
Route::get('list_allMedicament/{sk}/{tk}', [MedicamentController::class, 'list_allMedicament']);
Route::get('retriv', [MedicamentController::class, 'retrivAll']);
Route::get('list_allConseil/{sk}/{tk}', [ConseilController::class, 'list_allConseil']);
Route::get('retriv', [ConseilController::class, 'retrivAll']);

//  RECHERCHE POUR PHARMACIE***********************
Route::get('search-pharmacie/{pharmacie_nom}', [PharmacieController::class, 'searchByName']);
    Route::get('search-pharmacie/{pharmacie_adresse}', [PharmacieController::class, 'searchByAdd']);
    Route::get('search-pharmacie/{pharmacie_numero}', [PharmacieController::class, 'searchByNum']);
    Route::get('search-pharmacie/{region}', [PharmacieController::class, 'searchByRegion']);
    Route::get('search-pharmacie/{commune}', [PharmacieController::class, 'searchByCommune']);
    Route::get('search-pharmacie/{department}', [PharmacieController::class, 'searchByDep']);

    //  RECHERCHE POUR MEDICAMENT***********************
    Route::get('search-medicament/{nom_medicament}', [MedicamentController::class, 'searchByName']);
    Route::get('search-medicament/{DCI}', [MedicamentController::class, 'searchByDci']);
    Route::get('search-medicament/{tableau}', [MedicamentController::class, 'searchByTableau']);
    Route::get('search-medicament/{forme}', [MedicamentController::class, 'searchByForme']);
    Route::get('search-medicament/{dosage}', [MedicamentController::class, 'searchByDosage']);
    Route::get('search-medicament/{classe_therapeutique}', [MedicamentController::class, 'searchByClasseT']);
    Route::get('search-medicament/{posologie}', [MedicamentController::class, 'searchByPosologie']);




Route::middleware('auth:sanctum')->group(function () {

    Route::get('/checkingAuthenticated', function () {
        return response()->json(['message' => 'Vous etes connecte', 'status' => 200], 200);
    });

    Route::post('store-pharmacie', [PharmacieController::class, 'store']);
    Route::get('edit-pharmacie/{id}', [PharmacieController::class, 'edit']);
    Route::put('update-pharmacie/{id}', [PharmacieController::class, 'update']);
    Route::delete('delete-pharmacie/{id}', [PharmacieController::class, 'delete']);
    //Route::delete('delete-pharmacie/{id}', [PharmacieController::class, 'delete']);
    /* Route::get('search-pharmacie/{pharmacie_nom}', [PharmacieController::class, 'searchByName']);
    Route::get('search-pharmacie/{pharmacie_adresse}', [PharmacieController::class, 'searchByAdd']);
    Route::get('search-pharmacie/{pharmacie_numero}', [PharmacieController::class, 'searchByNum']);
    Route::get('search-pharmacie/{region}', [PharmacieController::class, 'searchByRegion']);
    Route::get('search-pharmacie/{commune}', [PharmacieController::class, 'searchByCommune']);
    Route::get('search-pharmacie/{department}', [PharmacieController::class, 'searchByDep']);
 */
    /* Route::get('list_all/{sk,tk}', [PharmacieController::class, 'listAll']);
    Route::get('retriv', [PharmacieController::class, 'retrivAll']); */

    Route::post('store-medicament', [MedicamentController::class, 'store']);
    Route::get('edit-medicament/{id}', [MedicamentController::class, 'edit']);
    Route::put('update-medicament/{id}', [MedicamentController::class, 'update']);
    Route::delete('delete-medicament/{id}', [MedicamentController::class, 'delete']);
   /*  Route::get('search-medicament/{nom_medicament}', [MedicamentController::class, 'searchByName']);
    Route::get('search-medicament/{DCI}', [MedicamentController::class, 'searchByDci']);
    Route::get('search-medicament/{tableau}', [MedicamentController::class, 'searchByTableau']);
    Route::get('search-medicament/{forme}', [MedicamentController::class, 'searchByForme']);
    Route::get('search-medicament/{dosage}', [MedicamentController::class, 'searchByDosage']);
    Route::get('search-medicament/{classe_therapeutique}', [MedicamentController::class, 'searchByClasseT']);
    Route::get('search-medicament/{posologie}', [MedicamentController::class, 'searchByPosologie']); */
    Route::get('search', [MedicamentController::class, 'searchByAll']);


    Route::post('store-conseil', [ConseilController::class, 'store']);
    Route::get('edit-conseil/{id}', [ConseilController::class, 'edit']);
    Route::put('update-conseil/{id}', [ConseilController::class, 'update']);
    Route::delete('delete-conseil/{id}', [ConseilController::class, 'delete']);
    Route::get('search-conseil/{titre}', [ConseilController::class, 'searchByTitre']);



    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
