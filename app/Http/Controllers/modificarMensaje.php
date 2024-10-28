<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use function Laravel\Prompts\alert;

class modificarMensaje extends Controller
{
    public function redirigirFormModificarMensaje(Request $request)
    {
        $id = $request->id;
        $mensaje = Message::findOrFail($id);
        return view("editarMensaje", ['mensaje' => $mensaje]);
    }

    public function modificarMensaje(Request $request)
    {

        $arrayDatos = $request->validate([
            'id' => 'required',
            'textoMensaje' => 'required',
            'subrayadoMensaje' => 'required', //|in:[0,1]
            'negritaMensaje' => 'required' //|in:[0,1]
        ], [
            'id' => 'Hay  un error con el id.',
            'textoMensaje' => 'Debes introducir un mensaje antes de darle a enviar.',
            'subrayadoMensaje' => 'Debes introducir un valor entre 0 y 1 en el campo subrayado.',
            'negritaMensaje' => 'Debes introducir un valor entre 0 y 1 en el campo negrita.'
        ]);

        $id = $arrayDatos['id'];
        $texto = $arrayDatos['textoMensaje'];
        $subrayado = $arrayDatos['subrayadoMensaje'];
        $negrita = $arrayDatos['negritaMensaje'];

        Message::where('id', $id)->update(['text' => $texto]);
        Message::where('id', $id)->update(['subrayado' => $subrayado]);
        Message::where('id', $id)->update(['negrita' => $negrita]);
        return redirect()->route('messages.view')->with('success', 'Mensaje editado correctamente');
    }
}
