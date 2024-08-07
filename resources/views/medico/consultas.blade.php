<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
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
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <form method="POST" action="{{ route('consultas') }}">
                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            <!-- Nombre del paciente -->
                            <div class="relative">
                                <label for="paciente" class="block font-medium text-sm">Nombre del paciente</label>
                                <select id="paciente" name="paciente" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900">
                                    @foreach ($pacientes as $paciente)
                                        <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Motivo de la consulta -->
                            <div>
                                <label for="motivo_consulta" class="block font-medium text-sm">Motivo de la consulta</label>
                                <textarea id="motivo_consulta"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                    name="motivo_consulta"></textarea>
                            </div>
                            <!-- Notas de padecimiento -->
                            <div>
                                <label for="notas_padecimiento" class="block font-medium text-sm">Notas de padecimiento</label>
                                <textarea id="notas_padecimiento"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                    name="notas_padecimiento"></textarea>
                            </div>
                            <!-- Signos vitales fields -->
                            <div>
                                <label for="signos_vitales" class="block font-medium text-sm">Signos vitales</label>
                                <div class="flex gap-4">
                                    <div class="relative">
                                        <i class="fa fa-user absolute left-2 top-2.5 text-gray-400"></i>
                                        <input id="edad"
                                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                                            name="edad" placeholder="Edad" maxlength="3">
                                    </div>
                                    <div class="relative">
                                        <i class="fa fa-ruler-vertical absolute left-2 top-2.5 text-gray-400"></i>
                                        <input id="talla"
                                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                                            name="talla"  placeholder="Talla (cm)" maxlength="3">
                                    </div>
                                    <div class="relative">
                                        <i class="fa fa-thermometer-half absolute left-2 top-2.5 text-gray-400"></i>
                                        <input id="temperatura"
                                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                                            name="temperatura" 
                                            placeholder="Temperatura (°C)" maxlength="2">
                                    </div>
                                    <div class="relative">
                                        <i class="fa fa-weight absolute left-2 top-2.5 text-gray-400"></i>
                                        <input id="peso"
                                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                                            name="peso"  placeholder="Peso (kg)" maxlength="3">
                                    </div>
                                    <div class="relative">
                                        <i class="fa fa-heartbeat absolute left-2 top-2.5 text-gray-400"></i>
                                        <input id="frecuencia_cardiaca"
                                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10"
                                            name="frecuencia_cardiaca" 
                                            placeholder="Frecuencia (bpm)" maxlength="6">
                                    </div>
                                </div>
                            </div>
                            <!-- Campo de alergias -->
                            <div>
                                <label for="alergias"
                                    class="block font-medium text-sm">Alergias</label>
                                <textarea id="alergias"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                    name="alergias" placeholder="Escribe las alergias del paciente...">{{ old('alergias') }}</textarea>
                            </div>
                            <!-- Diagnóstico -->
                            <div>
                                <label for="diagnostico"
                                    class="block font-medium text-sm">Diagnóstico</label>
                                <input id="diagnostico"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                    name="diagnostico">
                            </div>
                            <!-- Solicitar Estudios -->
                            <div>
                                <label for="solicitar_estudios" class="block font-medium text-sm">Solicitar estudios</label>
                                <div id="estudios-container" class="flex flex-col gap-4">
                                    <div class="flex gap-4 estudio">
                                        <select id="solicitar_estudios" name="solicitar_estudios[]" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900">
                                            @foreach ($servicios as $servicio)
                                                <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <textarea id="indicaciones_estudios" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900" name="indicaciones_estudios[]" placeholder="Escribe indicaciones a considerar"></textarea>
                                    </div>
                                </div>
                                <button type="button" id="add-estudio" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md">Agregar Estudio</button>
                            </div>
                            <!-- Receta -->
                            <div>
                                <label for="receta" class="block font-medium text-sm">Receta</label>
                                <div id="medicamentos-container" class="flex flex-col gap-4">
                                    <div class="flex gap-4 medicamento">
                                        <div class="relative w-1/4">
                                            <i class="fa fa-pills absolute left-2 top-2.5 text-gray-400"></i>
                                            <select id="medicacion" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10" name="medicacion[]">
                                                @foreach($productos as $producto)
                                                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="relative w-1/4">
                                            <i class="fa fa-sort-numeric-up-alt absolute left-2 top-2.5 text-gray-400"></i>
                                            <input id="cantidad" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10" name="cantidad[]" placeholder="Cantidad">
                                        </div>
                                        <div class="relative w-1/4">
                                            <i class="fa fa-clock absolute left-2 top-2.5 text-gray-400"></i>
                                            <input id="frecuencia" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10" name="frecuencia[]" placeholder="Frecuencia">
                                        </div>
                                        <div class="relative w-1/4">
                                            <i class="fa fa-hourglass-half absolute left-2 top-2.5 text-gray-400"></i>
                                            <input id="duracion" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10" name="duracion[]" placeholder="Duración">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="add-medicamento" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md">Agregar Medicamento</button>
                                <textarea id="notas_receta" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900" name="notas_receta" placeholder="Agregar notas...">{{ old('notas_receta') }}</textarea>
                            </div>

                            <!-- Ha participado un enfermero en la consulta -->
                            <div>
                                <label for="enfermero_participacion" class="block font-medium text-sm">¿Ha participado un enfermero en la consulta?</label>
                                <input type="checkbox" id="enfermero_participacion" name="enfermero_participacion" class="mr-2">
                                <select id="enfermero_select" name="enfermero_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900" style="display: none;">
                                    <option value="">Seleccione un enfermero</option>
                                    @foreach ($enfermeros as $enfermero)
                                        <option value="{{ $enfermero->id }}">{{ $enfermero->nombre }} {{ $enfermero->apellido}}</option>
                                    @endforeach
                                </select>
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
                    <select class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10" name="medicacion[]">
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="relative w-1/4">
                    <i class="fa fa-sort-numeric-up-alt absolute left-2 top-2.5 text-gray-400"></i>
                    <input class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10" name="cantidad[]" placeholder="Cantidad">
                </div>
                <div class="relative w-1/4">
                    <i class="fa fa-clock absolute left-2 top-2.5 text-gray-400"></i>
                    <input class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10" name="frecuencia[]" placeholder="Frecuencia">
                </div>
                <div class="relative w-1/4">
                    <i class="fa fa-hourglass-half absolute left-2 top-2.5 text-gray-400"></i>
                    <input class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10" name="duracion[]" placeholder="Duración">
                </div>
                <button type="button" class="remove-medicamento px-2 py-1 bg-red-600 text-white rounded-md">Eliminar</button>
            </div>
        `;
            container.insertAdjacentHTML('beforeend', medicamentoHTML);
            addRemoveFunctionality();
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
                <textarea class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900" name="indicaciones_estudios[]" placeholder="Escribe indicaciones a considerar"></textarea>
                <button type="button" class="remove-estudio px-2 py-1 bg-red-600 text-white rounded-md">Eliminar</button>
            </div>
        `;
            container.insertAdjacentHTML('beforeend', estudioHTML);
            addRemoveFunctionality();
        });

        function addRemoveFunctionality() {
            document.querySelectorAll('.remove-medicamento').forEach(button => {
                button.addEventListener('click', function() {
                    this.parentElement.remove();
                });
            });

            document.querySelectorAll('.remove-estudio').forEach(button => {
                button.addEventListener('click', function() {
                    this.parentElement.remove();
                });
            });
        }

        // Add initial remove functionality
        addRemoveFunctionality();

        $(function() {
            let availablePatients = @json($pacientes->pluck('nombre'));

            $("#paciente").autocomplete({
                source: availablePatients
            })
        });

        // Mostrar/Ocultar select de enfermeros
        document.getElementById('enfermero_participacion').addEventListener('change', function() {
            const enfermeroSelect = document.getElementById('enfermero_select');
            if (this.checked) {
                enfermeroSelect.style.display = 'block';
            } else {
                enfermeroSelect.style.display = 'none';
            }
        });

        // Formato para la frecuencia cardiaca
        document.getElementById('frecuencia_cardiaca').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // Eliminar cualquier carácter que no sea número
            if (value.length > 3) {
                e.target.value = value.slice(0, 3) + '/' + value.slice(3, 5);
            } else {
                e.target.value = value;
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
        const numericFields = ['edad', 'talla', 'temperatura', 'peso'];

        numericFields.forEach(function(fieldId) {
            const field = document.getElementById(fieldId);
            field.addEventListener('input', function(event) {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    });
    </script>
</body>

</html>
