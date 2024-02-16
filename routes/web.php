<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NoteController;

#Agregando un parametro dinamico route/{param}/{pram}/...
#Route::get('/note/{id}',[NoteController::class,'index'])->name('note.index');

#Muestre todas las notas:
Route::get('/note', [NoteController::class,'index'])->name('note.index');
#Ruta para Crear:
Route::get('/note/create', [NoteController::class,'create'])->name('note.create');
#Ruta cuando se envia el formulario:
Route::post('/note/store',[NoteController::class, 'store'])->name('note.store');
#Ruta para actualizar, esta es para obtener los valores
Route::get('/note/edit/{note}', [NoteController::class, 'edit'])->name('note.edit');
#Route y verbo para actualizar, esta es la usaremos en el formulario
Route::put('/note/update/{note}',[NoteController::class,'update'])->name('note.update');
#Route para eliminar nota:
Route::delete('/note/destroy/{note}', [NoteController::class, 'destroy'])->name('note.destroy');