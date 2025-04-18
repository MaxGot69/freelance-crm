<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\InvoiceController;

// для ClientController
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');  // Список клиентов
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');  // Страница создания клиента
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store'); // Сохранение нового клиента
Route::get('/client/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit'); // Страница редактирования клиента
Route::put('/client/{id}', [ClientController::class, 'update'])->name('clients.update'); // Обновление клиента
Route::delete('/client/{id}', [ClientController::class, 'destroy'])->name('clients.destroy'); // Удаление клиента

// для ProjectController
Route::resource('projects', ProjectController::class);  // Ресурсный роут для проектов
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');


// для InvoiceController
Route::resource('invoices', InvoiceController::class);  // Ресурсный роут для инвойсов
