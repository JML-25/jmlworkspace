use App\Http\Controllers\CookingGlobalController;

Route::get('/cookings/create', [CookingGlobalController::class, 'create'])->name('cookings.create');
Route::get('/cookings/{cooking}/edit', [CookingGlobalController::class, 'edit'])->name('cookings.edit');
