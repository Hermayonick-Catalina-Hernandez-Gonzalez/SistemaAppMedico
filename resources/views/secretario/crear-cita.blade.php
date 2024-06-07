<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if ($servicio)
                <div>
                    <p class="text-gray-800 dark:text-gray-200">
                        {{ __('Crear una nueva cita médica') }} <strong>{{ 'de ' }}{{ $servicio }}</strong>
                    </p>
                </div>
            @endif
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="max-w-lg w-full sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('crear-cita') }}">
                    @csrf
                    <!-- Fecha de nacimiento -->
                    <div>
                        <x-input-label for="fecha_agendada" :value="__('Fecha Agendada*')" />
                        <x-text-input id="fecha_agendada" class="block mt-1 w-full" type="date" name="fecha_agendada"
                            :value="old('fecha_agendada')" required autocomplete="fecha_agendada" />
                    </div>

                    <!-- Horas -->
                    <div class="mt-4">
                        <x-input-label for="horas" :value="__('Horario*')" />
                        <x-text-input id="horas" class="block mt-1 w-full" type="text" name="horas"
                            :value="old('horas')" required autofocus autocomplete="horas" />
                        <x-input-error :messages="$errors->get('horas')" class="mt-2" />
                    </div>

                    <!-- Doctor -->
                    <div class="mt-4">
                        <x-input-label for="doctor" :value="__('Doctor')" />
                        <select id="doctor" name="doctor"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 text-gray-900">
                            <option value="doctor">{{ __('Doctor 1') }}</option>
                            <option value="doctor">{{ __('Doctor 2') }}</option>
                        </select>
                    </div>

                    <!-- Asignar cita al paciente -->
                    <div class="mt-4">
                        <x-input-label for="paciente" :value="__('Paciente*')" />
                        <x-text-input id="paciente" class="block mt-1 w-full" type="text" name="paciente"
                            :value="old('paciente')" required autocomplete="paciente" />
                        <x-input-error :messages="$errors->get('paciente')" class="mt-2" />
                    </div>

                    <!-- Botones -->
                    <div class="flex items-center justify-center mt-4 space-x-4">
                        <x-primary-button class="ms-4">
                            {{ __('Generar Cita') }}
                        </x-primary-button>
                        <a href="{{ route('secretario.consultas') }}" class="ms-4 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Ver Citas') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
