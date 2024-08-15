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
                                        <a onclick="openModal({{ $consulta }})" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
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
        <!-- Modal para ver detalles de la consulta -->
        <div id="consultaModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                <div class="px-4 py-5 sm:p-6">
                    <h3 id="modalTitle" class="text-lg leading-6 font-medium text-gray-900"></h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500"><strong>Paciente:</strong> {{ $paciente->nombre }} {{ $paciente->apellido }}</p>
                        <p class="text-sm text-gray-500"><strong>Edad:</strong> <span id="modalEdad"></span></p>
                        <p class="text-sm text-gray-500"><strong>Talla:</strong> <span id="modalTalla"></span> cm</p>
                        <p class="text-sm text-gray-500"><strong>Temperatura:</strong> <span id="modalTemperatura"></span> °C</p>
                        <p class="text-sm text-gray-500"><strong>Peso:</strong> <span id="modalPeso"></span> kg</p>
                        <p class="text-sm text-gray-500"><strong>Frecuencia Cardiaca:</strong> <span id="modalFrecuencia"></span> bpm</p>
                        <p class="text-sm text-gray-500"><strong>Alergias:</strong> <span id="modalAlergias"></span></p>
                        <p class="text-sm text-gray-500"><strong>Diagnóstico:</strong> <span id="modalDiagnostico"></span></p>
                        <p class="text-sm text-gray-500"><strong>Estudios Solicitados:</strong> <span id="modalEstudios"></span></p>
                        <p class="text-sm text-gray-500"><strong>Indicaciones para Estudios:</strong> <span id="modalIndicaciones"></span></p>
                        <p class="text-sm text-gray-500"><strong>Medicación:</strong> <span id="modalMedicacion"></span></p>
                        <p class="text-sm text-gray-500"><strong>Notas de la Receta:</strong> <span id="modalNotas"></span></p>
                    </div>
                </div>
                <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button onclick="closeModal()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>

        <!-- Script para manejar el modal -->
        <script>
            function openModal(consulta) {
                document.getElementById('modalTitle').innerText = consulta.motivo_consulta;
                document.getElementById('modalEdad').innerText = consulta.edad;
                document.getElementById('modalTalla').innerText = consulta.talla;
                document.getElementById('modalTemperatura').innerText = consulta.temperatura;
                document.getElementById('modalPeso').innerText = consulta.peso;
                document.getElementById('modalFrecuencia').innerText = consulta.frecuencia_cardiaca;
                document.getElementById('modalAlergias').innerText = consulta.alergias;
                document.getElementById('modalDiagnostico').innerText = consulta.diagnostico;
                document.getElementById('modalEstudios').innerText = consulta.solicitar_estudios;
                document.getElementById('modalIndicaciones').innerText = consulta.indicaciones_estudios;
                document.getElementById('modalMedicacion').innerText = consulta.medicacion;
                document.getElementById('modalNotas').innerText = consulta.notas_receta;
                document.getElementById('consultaModal').classList.remove('hidden');
            }
            function closeModal() {
                document.getElementById('consultaModal').classList.add('hidden');
            }
        </script>
    </x-app-layout>
</body>
</html>
