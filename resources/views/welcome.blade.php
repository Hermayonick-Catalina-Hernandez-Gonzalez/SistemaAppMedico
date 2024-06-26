<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./imagenes/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Login</title>
</head>

<body class="flex items-center justify-center" style="background-image: url('imagenes/Login.png'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed; height: 100vh; margin: 0; padding: 0;">
    <div class="w-full max-w-lg">
        <div class="logo mb-4 flex justify-center">
            <img src="imagenes/Logo.png" alt="Logo" class="h-32">
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-6 flex items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                <img src="imagenes/usuario.png" alt="correo Icon" class="w-8 h-8 ml-4"> <!-- Aumentar el tamaño del icono -->
                <input id="email" type="email" name="email" class="flex-grow px-4 py-3 bg-transparent border-none rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-black placeholder-gray-500 text-lg" required autofocus autocomplete="username"> <!-- Aumentar el padding y tamaño de fuente -->
            </div>

            <div class="mb-6 flex items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                <img src="imagenes/contraseña.png" alt="Password Icon" class="w-8 h-8 ml-4"> <!-- Aumentar el tamaño del icono -->
                <input id="password" type="password" name="password" class="flex-grow px-4 py-3 bg-transparent border-none rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-black placeholder-gray-500 text-lg" required autocomplete="current-password"> <!-- Aumentar el padding y tamaño de fuente -->

            </div>

            @error('email')
                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
            @enderror

            @error('password')
                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
            @enderror

            <div class="flex-grow flex items-center justify-center mt-8">
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent text-lg font-medium rounded-md text-black bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Iniciar sesión</button> <!-- Aumentar el tamaño del botón -->
            </div>
        </form>
    </div>
</body>

</html>
