<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    @if ($errors->any())
        @error('textoMensaje')
            <h4> {{ $message }} </h4>
        @enderror
        @error('subrayadoMensaje')
            <h4> {{ $message }} </h4>
        @enderror
        @error('negritaMensaje')
            <h4> {{ $message }} </h4>
        @enderror
    @endif

    <form action="{{ route('modificarMensaje.controller', ['id' => $mensaje->id]) }}" method="POST">
        @csrf

        <h1>Modificar mensaje seleccionado</h1>

        <input type="hidden" name="id" value="{{ $mensaje->id }}">

        <label for="textoMensaje">Texto mensaje:</label>
        <input type="text" name="textoMensaje" id="textoMensaje" value="{{ $mensaje->text }}">
        <label for="subrayadoMensaje">El mensaje está subrayado (0 - 1):</label>
        <input type="text" name="subrayadoMensaje" id="subrayadoMensaje" value="{{ $mensaje->subrayado }}">
        <label for="negritaMensaje">El mensaje está en negrita (0 - 1):</label>
        <input type="text" name="negritaMensaje" id="negritaMensaje" value="{{ $mensaje->negrita }}">
        <button>Enviar</button>
    </form>

</body>

</html>
