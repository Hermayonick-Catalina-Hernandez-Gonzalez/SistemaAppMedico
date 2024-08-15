<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas de {{ $paciente->nombre }} {{ $paciente->apellido }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-6 bg-gray-200 p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-900 ">Consultas de {{ $paciente->nombre }} {{ $paciente->apellido }}</h3>

                    <!-- Tabla de Consultas -->
                    <div class="overflow-x-auto flex justify-center mt-4">
                        <table class="min-w-full bg-white rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Motivo de Consulta</th>
                                    <th class="py-3 px-6 text-left">Fecha</th>
                                    <th class="py-3 px-6 text-left">Médico</th>
                                    <th class="py-3 px-6 text-left">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">
                                @foreach($consultas as $consulta)
                                <tr class="border-b border-gray-200">
                                    <td class="py-3 px-6 text-left">{{ $consulta->motivo_consulta }}</td>
                                    <td class="py-3 px-6 text-left">{{ $consulta->created_at->format('d/m/Y') }}</td>
                                    <td class="py-3 px-6 text-left">{{ $consulta->medico->nombre }} {{ $consulta->medico->apellido }}</td>
                                    <td class="py-3 px-6 text-left">
                                        <a href="{{ route('consultas.show', $consulta->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            Ver Detalles
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
