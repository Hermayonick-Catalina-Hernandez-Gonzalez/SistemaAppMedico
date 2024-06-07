<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hacer Consultas') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="max-w-lg w-full sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <label for="diagnosticos" class="block font-medium text-sm dark:text-gray-200">Diagnosticos*</label>
                        <textarea id="diagnosticos" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900" name="diagnosticos" >{{ old('diagnosticos') }}</textarea>
                        @error('diagnosticos')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="alergias" class="block font-medium text-sm dark:text-gray-200">Alergias*</label>
                        <textarea id="alergias" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900" name="alergias" required>{{ old('alergias') }}</textarea>
                        @error('alergias')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="sintomas" class="block font-medium text-sm dark:text-gray-200">Sintomas*</label>
                        <textarea id="sintomas" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900" name="sintomas" required>{{ old('sintomas') }}</textarea>
                        @error('sintomas')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <x-input-label for="peso" :value="__('Peso*')" />
                        <x-text-input id="peso" class="block mt-1 w-full" type="text" name="peso"
                            :value="old('peso')" required autofocus autocomplete="peso" />
                        <x-input-error :messages="$errors->get('peso')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="altura" :value="__('Altura*')" />
                        <x-text-input id="altura" class="block mt-1 w-full" type="text" name="altura"
                            :value="old('altura')" required autofocus autocomplete="altura" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Guardar cita') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
