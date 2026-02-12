<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CookingController;
use App\Http\Controllers\CookingstepController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\CookingingredientController;
use App\Http\Controllers\ApplicationcodeController;
use App\Http\Controllers\ShoppinglistController;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\DaybookController;
use App\Http\Controllers\ThoughtController;
use App\Http\Controllers\NoteController;
use App\Livewire\Counter;
use App\Livewire\cookings\Cookingsearch;
use App\Http\Controllers\CookingGlobalController;

Route::get('/x/{id}', [CookingingredientController::class,'test']);

Route::get('/cookingsearch', Cookingsearch::class);
Route::get('test', function (Request $request) {
    print_r (session('applicationselectclauses'));
    return session('applicationselectclauses'); });
Route::get('/', function (Request $request) {
    return view('zsite.welcome')
    ->with('message','bienvenue sur le workspace de JML');
 })->name('jmlworkspace');
 Route::get('/admin', function () {
    return view('zsite.admin')
    ->with('message','administration du site');
})->name('admin');
Route::get('/welcome', function () {
    return view('zsite.welcome')
    ->with('message','bienvenue sur le site de JML');
})->name('welcome');

// Route::get('/cookingingredients/{cooking}/create', [CookingingredientController::class,'create']);
// Route::get('/cookingingredients/store/{cooking}', [CookingingredientController::class,'store']);
// Route::get('/cookingingredients/{cooking}', [CookingingredientController::class,'index']);
// Route::get('/cookingingredients/show/{cookingingredient}', [CookingingredientController::class,'show']);

Route::get('/cookings/createglobal', [CookingGlobalController::class, 'create'])->name('cookings.createglobal');
Route::get('/cookings/{cooking}/editglobal', [CookingGlobalController::class, 'edit'])->name('cookings.editglobal');

Route::resource('cookings.cookingingredients', CookingingredientController::class)
    ->shallow();
Route::resource('cookings.cookingsteps', CookingstepController::class)
    ->shallow();
Route::resource('cookings', CookingController::class);
Route::resource('ingredients', IngredientController::class);
Route::resource('applicationcodes', ApplicationcodeController::class);
Route::resource('shoppinglists', ShoppinglistController::class);
Route::resource('todolists', TodolistController::class);
Route::resource('daybooks', DaybookController::class);
Route::resource('thoughts', ThoughtController::class);
Route::resource('notes', NoteController::class);