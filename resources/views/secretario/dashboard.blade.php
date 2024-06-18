<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./imagenes/icono.png" type="image/x-icon">
    @vite('resources/css/app.css')
    <title>Inicio</title>
</head>

<body class="bg-white text-gray-900">
    <x-app-layout >
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-2 p-6 rounded-lg shadow bg-white text-gray-600">
                    <div class="flex justify-between items-center mb-4">
                        <input type="text" placeholder="Buscar..."
                            class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                </div>
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Rayos X']) }}"
                        class="block bg-white p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/rayosX.jpg') }}" alt="Rayos X"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold">Rayos X</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Consulta General']) }}"
                        class="block bg-white p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/consulta.jpg') }}" alt="Consulta General"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold">Consulta General</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Consulta Psicologica']) }}"
                        class="block bg-white p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/psicologa.jpg') }}" alt="Consulta Psicologica"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold">Consulta Psicologica</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Ginecologia']) }}"
                        class="block bg-white p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/ginecologo.jpg') }}" alt="Ginecologo"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold">Ginecologia</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Estudios Toxicologicos']) }}"
                        class="block bg-white p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/toxicologia.jpg') }}" alt="Toxicologia"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold">Estudios Toxicologicos</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Laboratorio Clinico']) }}"
                        class="block bg-white p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/laboratorio.jpg') }}" alt="laboratorio"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold">Laboratorio Clinico</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Cardiologia']) }}"
                        class="block bg-white p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/cardiologo.jpg') }}" alt="cardiologo"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold">Cardiologia</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Pediatria']) }}"
                        class="block bg-white p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/pediatra.jpg') }}" alt="pediatra"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold">Pediatria</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Nutriologia']) }}"
                        class="block bg-white p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/Nutriologo.jpg') }}" alt="nutriologo"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold">Nutriologo</h3>
                    </a>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
