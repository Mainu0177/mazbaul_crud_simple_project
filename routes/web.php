<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employee', [EmployeeController::class, 'Employee'])->name('employee.index');
Route::get('/create', [EmployeeController::class, 'CreateEmployee'])->name('employee.create');
Route::post('/employee', [EmployeeController::class, 'Store'])->name('employee.store');
Route::get('/update/{id}', [EmployeeController::class, 'UpdateEmployee'])->name('employee.update');
Route::put('/updates/{id}', [EmployeeController::class, 'Update'])->name('employee.updates');
Route::delete('/delete/{id}', [EmployeeController::class, 'EmployeeDelete'])->name('employee.delete');

