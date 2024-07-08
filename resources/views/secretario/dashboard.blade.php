<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio </title>
    <!-- Incluye Tailwind CSS desde CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-6 p-6 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-4">
                        <input type="text" id="search" placeholder="Buscar servicio..."
                            class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                </div>
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('secretario.medicamentos', ['servicio' => 'Farmarcia']) }}"
                        class="block bg-white  p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/famarcia.jpeg') }}" alt="Farmacia"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 ">Famarcia</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Rayos X']) }}"
                        class="block bg-white  p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/rayosX.jpg') }}" alt="Rayos X"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 ">Rayos X</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Consulta General']) }}"
                        class="block bg-white  p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/consulta.jpg') }}" alt="Consulta General"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 ">Consulta General</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Consulta Psicologica']) }}"
                        class="block bg-white  p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/psicologa.jpg') }}" alt="Consulta Psicologica"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 ">Consulta Psicologica</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Ginecologia']) }}"
                        class="block bg-white  p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/ginecologo.jpg') }}" alt="Ginecologo"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 ">Ginecologia</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Estudios Toxicologicos']) }}"
                        class="block bg-white  p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/toxicologia.jpg') }}" alt="Toxicologia"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 ">Estudios Toxicologicos</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Laboratorio Clinico']) }}"
                        class="block bg-white  p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/laboratorio.jpg') }}" alt="laboratorio"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 ">Laboratorio Clinico</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Cardiologia']) }}"
                        class="block bg-white  p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/cardiologo.jpg') }}" alt="cardiologo"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 ">Cardiologia</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Pediatria']) }}"
                        class="block bg-white  p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/pediatra.jpg') }}" alt="pediatra"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 ">Pediatria</h3>
                    </a>
                    <a href="{{ route('secretario.crear-cita', ['servicio' => 'Nutriologia']) }}"
                        class="block bg-white  p-6 rounded-lg shadow">
                        <img src="{{ asset('imagenes/Nutriologo.jpg') }}" alt="nutriologo"
                            class="w-full h-40 object-cover rounded-t-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 ">Nutriologo</h3>
                    </a>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        document.getElementById('search').addEventListener('input', function () {
            let filter = this.value.toLowerCase();
            let services = document.querySelectorAll('.service');

            services.forEach(function (service) {
                let text = service.textContent.toLowerCase();
                if (text.includes(filter)) {
                    service.style.display = "";
                } else {
                    service.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>
