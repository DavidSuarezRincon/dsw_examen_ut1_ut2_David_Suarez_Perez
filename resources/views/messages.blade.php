<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>Prueba superada</h1>
        @if ($messages->isEmpty())
            <p>No hay mensajes en la base de datos</p>
        @else
            <ul>
                @foreach ($messages as $message)
                    <form action="{{ route('redirigirFormularioEditar.controller', ['id' => $message->id]) }}" method="post">
                        @csrf
                        @if ($message->subrayado == 1)
                            <u>
                        @endif

                        @if ($message->negrita == 1)
                            <b>
                        @endif
                        <li>{{ $message->text }}</li>

                        @if ($message->negrita == 1)
                            </b>
                        @endif
                        @if ($message->subrayado == 1)
                            </u>
                        @endif

                        <button>Modificar</button>
                    </form>
                @endforeach
            </ul>
        @endif
    </div>
</body>

</html>
