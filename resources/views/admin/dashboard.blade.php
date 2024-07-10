<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./imagenes/icono.png" type="image/x-icon">
    <title>Inicio</title>
    <!-- Incluye Tailwind CSS desde CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Te da la bienvenida con el nombre del usuario -->
                        {{ __('Bienvenido Administrador ' . Auth::user()->nombre . ' ' . Auth::user()->apellido . '!') }}
                    </div>
                </div>

                <!-- Contenido de la tabla de Pacientes -->
                <div class="mt-6 bg-gray-200 p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-900">Lista de usuarios Pacientes</h3>
                    <!-- Buscador -->
                    <div class="flex justify-between items-center mb-4">
                        <input type="text" id="pacientes_search" placeholder="Buscar por nombre de paciente..."
                            class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                    <!-- Tabla -->
                    <div class="overflow-x-auto flex justify-center">
                        <table id="pacientes_table" class="min-w-full bg-white rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-200 text-black uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Nombre</th>
                                    <th class="py-3 px-6 text-left">Apellido</th>
                                    <th class="py-3 px-6 text-left">Teléfono</th>
                                    <th class="py-3 px-6 text-left">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">
                                @foreach ($pacientes as $paciente)
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 px-6 text-left">{{ $paciente->nombre }}</td>
                                        <td class="py-3 px-6 text-left">{{ $paciente->apellido }}</td>
                                        <td class="py-3 px-6 text-left">{{ $paciente->telefono }}</td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('pacientes.edit', $paciente->id) }}"
                                                    class="ms-4 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                    {{ __('Modificar') }}
                                                </a>
                                                <form action="{{ route('pacientes.destroy', $paciente->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('¿Está seguro de que desea eliminar este paciente?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="ms-4 inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                        {{ __('Eliminar') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $pacientes->links() }}
                    </div>
                </div>

                <!-- Contenido de la tabla de Médicos -->
                <div class="mt-6 bg-gray-200 p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-900">Lista de usuarios Médicos</h3>
                    <!-- Buscador -->
                    <div class="flex justify-between items-center mb-4">
                        <input type="text" id="medicos_search" placeholder="Buscar por nombre de médico..."
                            class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                    <!-- Tabla -->
                    <div class="overflow-x-auto flex justify-center">
                        <table id="medicos_table" class="min-w-full bg-white rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Nombre</th>
                                    <th class="py-3 px-6 text-left">Apellido</th>
                                    <th class="py-3 px-6 text-left">Teléfono</th>
                                    <th class="py-3 px-6 text-left">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">
                                @foreach ($medicos as $medico)
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 px-6 text-left">{{ $medico->nombre }}</td>
                                        <td class="py-3 px-6 text-left">{{ $medico->apellido }}</td>
                                        <td class="py-3 px-6 text-left">{{ $medico->telefono }}</td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('medicos.edit', $medico->id) }}"
                                                    class="ms-4 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                    {{ __('Modificar') }}
                                                </a>
                                                <form action="{{ route('medicos.destroy', $medico->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('¿Está seguro de que desea eliminar este médico?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="ms-4 inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                        {{ __('Eliminar') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $medicos->links() }}
                    </div>
                </div>

                <!-- Contenido de la tabla de Secretarios -->
                <div class="mt-6 bg-gray-200 p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-900">Lista de usuarios Secretarios</h3>
                    <!-- Buscador -->
                    <div class="flex justify-between items-center mb-4">
                        <input type="text" id="secretarios_search" placeholder="Buscar por nombre de secretario..."
                            class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                    <!-- Tabla -->
                    <div class="overflow-x-auto flex justify-center">
                        <table id="secretarios_table" class="min-w-full bg-white rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-200 text-black uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Nombre</th>
                                    <th class="py-3 px-6 text-left">Apellido</th>
                                    <th class="py-3 px-6 text-left">Teléfono</th>
                                    <th class="py-3 px-6 text-left">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">
                                @foreach ($secretarios as $secretario)
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 px-6 text-left">{{ $secretario->nombre }}</td>
                                        <td class="py-3 px-6 text-left">{{ $secretario->apellido }}</td>
                                        <td class="py-3 px-6 text-left">{{ $secretario->telefono }}</td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('secretarios.edit', $secretario->id) }}"
                                                    class="ms-4 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                    {{ __('Modificar') }}
                                                </a>
                                                <form action="{{ route('secretarios.destroy', $secretario->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('¿Está seguro de que desea eliminar este secretario?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="ms-4 inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                        {{ __('Eliminar') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $secretarios->links() }}
                    </div>
                </div>

                <!-- Contenido de la tabla de Servicios -->
                <div class="mt-6 bg-gray-200 p-6 rounded-lg shadow">
                    <!-- Buscador -->
                    <div class="flex justify-between items-center mb-4">
                        <input type="text" id="servicio_search" placeholder="Buscar por nombre de servicio.."
                            class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Lista de Servicios</h3>
                    <!-- Tabla -->
                    <div class="overflow-x-auto flex justify-center">
                        <table id="servicios_table" class="min-w-full bg-white rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-200 text-black uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Nombre del Servicio</th>
                                    <th class="py-3 px-6 text-left">Precio</th>
                                    <th class="py-3 px-6 text-left">Médico Asignado</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">
                                @foreach ($servicios as $servicio)
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 px-6 text-left">{{ $servicio->nombre }}</td>
                                        <td class="py-3 px-6 text-left">{{ $servicio->precio }}</td>
                                        <td class="py-3 px-6 text-left">{{ $servicio->medico_nombre }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">

                    </div>
                </div>

                <!-- Contenido de la tabla de Productos -->
                <div class="mt-6 bg-gray-200 p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-900">Lista de Productos</h3>
                     <!-- Buscador -->
                     <div class="flex justify-between items-center mb-4">
                        <input type="text" id="productos_search" placeholder="Buscar por nombre de servicio.."
                            class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                    <!-- Tabla -->
                    <div class="overflow-x-auto flex justify-center">
                        <table id="productos_table" class="min-w-full bg-white rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-200 text-black uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Nombre</th>
                                    <th class="py-3 px-6 text-left">Cantidad</th>
                                    <th class="py-3 px-6 text-left">Fecha Vecimiento</th>
                                    <th class="py-3 px-6 text-left">Precio</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">
                                @foreach ($productos as $producto)
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 px-6 text-left">{{ $producto->nombre }}</td>
                                        <td class="py-3 px-6 text-left">{{ $producto->cantidad }}</td>
                                        <td class="py-3 px-6 text-left">{{ $producto->fecha_vencimiento }}</td>
                                        <td class="py-3 px-6 text-left">{{ $producto->precio }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">

                    </div>
                </div>

            </div>
        </div>
    </x-app-layout>
</body>

</html>
