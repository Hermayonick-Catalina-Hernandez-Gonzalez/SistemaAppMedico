<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./imagenes/icono.png" type="image/x-icon">
    @vite('resources/css/app.css')
    <title>Login</title>
    <style>
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            position: absolute;
            right: 1%;
            width: 50%;
        }

        .form-container form {
            width: 65%;
        }

        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 1rem; /* Aumenta el padding para hacer los inputs más grandes */
            font-size: 1rem; /* Ajusta el tamaño de la fuente */
            margin-top: 1rem; /* Espacio entre los elementos */
            border: none; /* Remueve el borde predeterminado */
            outline: none; /* Remueve el contorno predeterminado */
            border-bottom: 2px solid #23A199; /* Agrega una línea inferior de color azul */
            background-color: #ffffff; /* Establece un fondo blanco fijo */
            color: #000000; /* Establece un color de texto negro fijo */
        }

        .form-container button {
            width: auto; /* Deja que el ancho sea automático basado en el contenido */
            padding: 1rem 2rem; /* Ajusta el padding para el botón */
            font-size: 1rem; /* Tamaño de la fuente */
            margin: 1rem auto 0 auto; /* Centra el botón horizontalmente */
            display: block; /* Asegura que el botón sea un elemento de bloque para aplicar márgenes automáticos */
            background-color: #23A199;
            border-radius: 1rem;
            font-weight: bold;
            color: white;
            cursor: pointer;
            text-align: center;
        }

        .form-container button:hover {
            background-color: #0c4a47;
        }
    </style>
</head>

<body style="background-image: url('imagenes/Login.png'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed; height: 100vh; margin: 0; padding: 0;">
    <div class="form-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Correo')" style="color: #3FD1C9; font-size: 2.25rem; font-weight: bold; text-shadow: 1px 1px 2px black;" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" style="color: #3FD1C9; font-size: 2.25rem; font-weight: bold; text-shadow: 1px 1px 2px black;" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-primary-button class="ms-3">
                    {{ __('Iniciar Sesión') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</body>

</html>
