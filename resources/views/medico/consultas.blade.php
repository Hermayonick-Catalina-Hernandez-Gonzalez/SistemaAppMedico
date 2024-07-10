<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Consultas') }}
            </h2>
        </x-slot>

        <div class="py-12 flex justify-center">
            <div class="max-w-7xl w-full sm:px-6 lg:px-8">
                <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            <div class="relative">
                                <label for="paciente" class="block font-medium text-sm ">Nombre del
                                    paciente</label>
                                <input id="paciente"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                    name="paciente" value="{{ old('paciente') }}">
                            </div>
                            <div>
                                <label for="motivo_consulta" class="block font-medium text-sm ">Motivo
                                    de la consulta</label>
                                <textarea id="motivo_consulta"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                    name="motivo_consulta">{{ old('motivo_consulta') }}</textarea>
                            </div>

                            <div>
                                <label for="notas_padecimiento"
                                    class="block font-medium text-sm ">Notas de padecimiento</label>
                                <textarea id="notas_padecimiento"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                    name="notas_padecimiento">{{ old('notas_padecimiento') }}</textarea>
                            </div>

                            <!-- Signos vitales fields -->
                            <div>
                                <label for="signos_vitales" class="block font-medium text-sm ">Signos
                                    vitales</label>
                                <div class="flex gap-4">
                                    <div class="relative">
                                        <i class="fa fa-user absolute left-2 top-2.5 text-gray-400"></i>
                                        <input id="edad"
                                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                                            name="edad" value="{{ old('edad') }}" placeholder="Edad">
                                    </div>
                                    <div class="relative">
                                        <i class="fa fa-ruler-vertical absolute left-2 top-2.5 text-gray-400"></i>
                                        <input id="talla"
                                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                                            name="talla" value="{{ old('talla') }}" placeholder="Talla (m)">
                                    </div>
                                    <div class="relative">
                                        <i class="fa fa-thermometer-half absolute left-2 top-2.5 text-gray-400"></i>
                                        <input id="temperatura"
                                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                                            name="temperatura" value="{{ old('temperatura') }}"
                                            placeholder="Temperatura (°C)">
                                    </div>
                                    <div class="relative">
                                        <i class="fa fa-weight absolute left-2 top-2.5 text-gray-400"></i>
                                        <input id="peso"
                                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                                            name="peso" value="{{ old('peso') }}" placeholder="Peso (kg)">
                                    </div>
                                    <div class="relative">
                                        <i class="fa fa-heartbeat absolute left-2 top-2.5 text-gray-400"></i>
                                        <input id="frecuencia_cardiaca"
                                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                                            name="frecuencia_cardiaca" value="{{ old('frecuencia_cardiaca') }}"
                                            placeholder="Frecuencia (bpm)">
                                    </div>
                                </div>
                            </div>

                            <!-- Campo de alergias -->
                            <div>
                                <label for="alergias"
                                    class="block font-medium text-sm ">Alergias</label>
                                <textarea id="alergias"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                    name="alergias" placeholder="Escribe las alergias del paciente...">{{ old('alergias') }}</textarea>
                            </div>

                            <div>
                                <label for="diagnostico"
                                    class="block font-medium text-sm ">Diagnóstico</label>
                                <input id="diagnostico"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                    name="diagnostico" value="{{ old('diagnostico') }}">
                            </div>

                             <!-- Campo de Solicitar Estudios -->
                             <div>
                                <label for="solicitar_estudios" class="block font-medium text-sm">Solicitar estudios</label>
                                <div id="estudios-container" class="flex flex-col gap-4">
                                    <div class="flex gap-4 estudio">
                                        <select id="solicitar_estudios" name="solicitar_estudios[]" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900">
                                            @foreach ($servicios as $servicio)
                                                <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <textarea id="indicaciones_estudios" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900" name="indicaciones_estudios[]" placeholder="Escribe indicaciones a considerar">{{ old('indicaciones_estudios') }}</textarea>
                                    </div>
                                </div>
                                <button type="button" id="add-estudio" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md">Agregar Estudio</button>
                            </div>

                            <!-- Receta -->
                            <div>
                                <label for="receta"
                                    class="block font-medium text-sm ">Receta</label>
                                <div id="medicamentos-container" class="flex flex-col gap-4">
                                    <div class="flex gap-4 medicamento">
                                        <div class="relative w-1/4">
                                            <i class="fa fa-pills absolute left-2 top-2.5 text-gray-400"></i>
                                            <select id="medicacion"
                                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                                                name="medicacion[]">
                                                @foreach($productos as $producto)
                                                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="relative w-1/4">
                                            <i class="fa fa-sort-numeric-up-alt absolute left-2 top-2.5 text-gray-400"></i>
                                            <input id="cantidad"
                                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                                                name="cantidad[]" value="{{ old('cantidad') }}"
                                                placeholder="Cantidad">
                                        </div>
                                        <div class="relative w-1/4">
                                            <i class="fa fa-clock absolute left-2 top-2.5 text-gray-400"></i>
                                            <input id="frecuencia"
                                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                                                name="frecuencia[]" value="{{ old('frecuencia') }}"
                                                placeholder="Frecuencia">
                                        </div>
                                        <div class="relative w-1/4">
                                            <i class="fa fa-hourglass-half absolute left-2 top-2.5 text-gray-400"></i>
                                            <input id="duracion"
                                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                                                name="duracion[]" value="{{ old('duracion') }}"
                                                placeholder="Duración">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="add-medicamento"
                                    class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md">Agregar
                                    Medicamento</button>
                                <textarea id="notas_receta"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                    name="notas_receta" placeholder="Agregar notas...">{{ old('notas_receta') }}</textarea>
                            </div>

                            <div class="flex justify-end mt-4">
                                <x-primary-button class="ms-4">
                                    {{ __('Terminar consulta') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        document.getElementById('add-medicamento').addEventListener('click', function() {
            const container = document.getElementById('medicamentos-container');
            const medicamentoHTML = `
            <div class="flex gap-4 medicamento">
                <div class="relative w-1/4">
                    <i class="fa fa-pills absolute left-2 top-2.5 text-gray-400"></i>
                    <select class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                           name="medicacion[]">
                        @foreach($productos as $productoo)
                            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="relative w-1/4">
                    <i class="fa fa-sort-numeric-up-alt absolute left-2 top-2.5 text-gray-400"></i>
                    <input class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                           name="cantidad[]" placeholder="Cantidad">
                </div>
                <div class="relative w-1/4">
                    <i class="fa fa-clock absolute left-2 top-2.5 text-gray-400"></i>
                    <input class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                           name="frecuencia[]" placeholder="Frecuencia">
                </div>
                <div class="relative w-1/4">
                    <i class="fa fa-hourglass-half absolute left-2 top-2.5 text-gray-400"></i>
                    <input class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                           name="duracion[]" placeholder="Duración">
                </div>
            </div>
        `;
            container.insertAdjacentHTML('beforeend', medicamentoHTML);
        });

        document.getElementById('add-estudio').addEventListener('click', function() {
            const container = document.getElementById('estudios-container');
            const estudioHTML = `
            <div class="flex gap-4 estudio">
                <select name="solicitar_estudios[]" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900">
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                    @endforeach
                </select>
                <textarea class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900" name="indicaciones_estudios[]" placeholder="Escribe indicaciones a considerar">{{ old('indicaciones_estudios') }}</textarea>
            </div>
        `;
            container.insertAdjacentHTML('beforeend', estudioHTML);
        });
    </script>
</body>

</html>
