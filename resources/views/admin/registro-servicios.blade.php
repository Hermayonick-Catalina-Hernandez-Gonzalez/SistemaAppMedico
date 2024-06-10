<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registro de Servicios') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="max-w-lg w-full sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.registro-servicios') }}">
                    @csrf
                    <!-- Nombre del servicio -->
                    <div>
                        <x-input-label for="nombre" :value="__('Nombre del servicio*')" />
                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                            :value="old('nombre')" required autofocus autocomplete="nombre" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Descripción -->
                    <div class="mt-4">
                        <x-input-label for="descripcion" :value="__('Descripción')" />
                        <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion"
                            :value="old('descripcions')" required autocomplete="descripcion" />
                        <x-input-error :messages="$errors->get('descripcions')" class="mt-2" />
                    </div>

                    <!-- Precio -->
                    <div class="mt-4">
                        <x-input-label for="precio" :value="__('Precio en pesos mexicanos*')" />
                        <x-text-input id="precio" class="block mt-1 w-full" type="text" name="precio"
                            :value="old('precio')" required autocomplete="precio" />
                        <x-input-error :messages="$errors->get('precio')" class="mt-2" />
                    </div>

                    <!-- Médicos que ofrecen dicho servicio -->
                    <div class="mt-4">
                        <x-input-label for="medico_id" :value="__('Médicos que pueden ofrecer este servicio*')" />
                        <x-text-input id="medico_id" class="block mt-1 w-full" type="text" name="medico_id"
                            :value="old('medico_id')" autocomplete="medico_id" />
                        <x-input-error :messages="$errors->get('medico_id')" class="mt-2" />
                    </div>                

                    <div class="flex items-center justify-center mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Registrar') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
