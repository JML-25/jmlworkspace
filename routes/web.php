<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CookingController;
use App\Http\Controllers\ShoppinglistController;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\DaybookController;
use App\Http\Controllers\ThoughtController;
use App\Http\Controllers\NoteController;


Route::get('/', function (Request $request) {
    return view('welcome')
    ->with('message','bienvenue sur le workspace de JML');
 })->name('jmlworkspace');
 Route::get('/admin', function () {
    return view('admin')
    ->with('message','administration du site');
})->name('admin');
Route::get('/welcome', function () {
    return view('welcome')
    ->with('message','bienvenue sur le site de JML');
})->name('welcome');
/*
    Routes::esource: cookings, shoppinglists, todolists,
    notes, daybooks, thoughts, notes
*/
Route::resource('cookings', CookingController::class);
Route::resource('shoppinglists', ShoppinglistController::class);
Route::resource('todolists', TodolistController::class);
Route::resource('daybooks', DaybookController::class);
Route::resource('thoughts', ThoughtController::class);
Route::resource('notes', NoteController::class);

/* Route::get('/cookings', function () {
   return view('cooking')
   ->with('message','gestion des recettes');
})->name('cookings');
Route::get('/shoppinglists', function () {
    return view('shoppinglist')
    ->with('message','gestion des courses');
})->name('shoppinglists');
Route::get('/todolists', function () {
    return view('todolist')
	->with('message','gestion des todolists');
})->name('todolists');
Route::get('/daybooks', function () {
    return view('daybook')
    ->with('message','gestion des gazettes');
})->name('daybooks');
Route::get('/thoughts', function () {
    return view('thought')
    ->with('message','gestion des pensées');
})->name('thoughts');
Route::get('/notes', function () {
    return view('note')
    ->with('message','gestion des notes');
})->name('notes'); */