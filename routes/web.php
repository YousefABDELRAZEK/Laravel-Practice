<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;


Route::get('/', [NoteController::class, 'index'])->name('home');
Route::post('/addNotes',[NoteController::class,'create'])->name('create');
Route::post('/update/{id}',[NoteController::class,'update'])->name('update');
Route::delete('/delete/{id}',[NoteController::class,'destroy'])->name('delete');


