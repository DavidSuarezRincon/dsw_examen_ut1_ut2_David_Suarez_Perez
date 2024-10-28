<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\modificarMensaje;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/messages', function () {
    $messages = \App\Models\Message::all();
    return view('messages', ['messages' => $messages]);
}) -> name('messages.view');



Route::post('/editarDuda', [modificarMensaje::class, 'redirigirFormModificarMensaje'])->name('redirigirFormularioEditar.controller');
Route::get('/editarDuda', [modificarMensaje::class, 'redirigirFormModificarMensaje'])->name('redirigirFormularioEditar.controller');

Route::post('/actualizarDuda', [modificarMensaje::class, 'modificarMensaje'])->name('modificarMensaje.controller');
