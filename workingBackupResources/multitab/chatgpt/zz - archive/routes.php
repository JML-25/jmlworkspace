<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Cookings\CookingIndex;
use App\Livewire\Cookings\CookingEditor;

Route::get('/cookings', CookingIndex::class)->name('cookings.index');
Route::get('/cookings/create', CookingEditor::class)->name('cookings.create');
Route::get('/cookings/{cookingId}/edit', CookingEditor::class)
    ->whereNumber('cookingId')
    ->name('cookings.edit');
