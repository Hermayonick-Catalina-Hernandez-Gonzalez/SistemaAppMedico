<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Consultas') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="max-w-7xl w-full sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="motivo_consulta" class="block font-medium text-sm dark:text-gray-200">Motivo de la
                                consulta</label>
                            <textarea id="motivo_consulta"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                name="motivo_consulta">{{ old('motivo_consulta') }}</textarea>
                        </div>

                        <div>
                            <label for="notas_padecimiento" class="block font-medium text-sm dark:text-gray-200">Notas
                                de padecimiento</label>
                            <textarea id="notas_padecimiento"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                name="notas_padecimiento">{{ old('notas_padecimiento') }}</textarea>
                        </div>

                        <div>
                            <label for="diagnostico"
                                class="block font-medium text-sm dark:text-gray-200">Diagnóstico</label>
                            <input id="diagnostico"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                name="diagnostico" value="{{ old('diagnostico') }}">
                        </div>

                        <div>
                            <label for="solicitar_estudios" class="block font-medium text-sm dark:text-gray-200">Solicitar estudios</label>
                            <div class="grid grid-cols-1 gap-4">
                                <input id="solicitar_estudios" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900" name="solicitar_estudios" value="{{ old('solicitar_estudios') }}">
                                <textarea id="indicaciones_estudios" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900" name="indicaciones_estudios" placeholder="Escribe indicaciones a considerar">{{ old('indicaciones_estudios') }}</textarea>
                            </div>
                        </div>

                        <div>
                            <label for="receta" class="block font-medium text-sm dark:text-gray-200">Receta</label>
                            <div class="flex gap-4">
                                <input id="medicacion"
                                    class="block mt-1 w-1/4 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                    name="medicacion" value="{{ old('medicacion') }}" placeholder="Medicación">
                                <input id="cantidad"
                                    class="block mt-1 w-1/4 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                    name="cantidad" value="{{ old('cantidad') }}" placeholder="Cantidad">
                                <input id="frecuencia"
                                    class="block mt-1 w-1/4 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                    name="frecuencia" value="{{ old('frecuencia') }}" placeholder="Frecuencia">
                                <input id="duracion"
                                    class="block mt-1 w-1/4 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900"
                                    name="duracion" value="{{ old('duracion') }}" placeholder="Duración">
                            </div>
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
