<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CookingGlobalController;

Route::get('/cookings/createglobal', [CookingGlobalController::class, 'create'])->name('cookings.create');
Route::get('/cookings/{cooking}/editglobal', [CookingGlobalController::class, 'edit'])->name('cookings.edit');
