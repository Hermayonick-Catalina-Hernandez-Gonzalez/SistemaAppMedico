<!-- resources/views/admin/servicios/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Servicio') }}
        </h2>
    </x-slot>

    <div class="mt-6 dark:bg-gray-800 p-6 rounded-lg shadow">
        <form method="POST" action="{{ route('registro-servicios.update', $servicio->id) }}">
            @csrf
            @method('PATCH')
            
            <!-- Nombre -->
            <div class="mb-4">
                <x-input-label for="nombre" :value="__('Nombre')" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ old('nombre', $servicio->nombre) }}" required autofocus />
            </div>

            <!-- Descripcion -->
            <div class="mb-4">
                <x-input-label for="descripcion" :value="__('Descripción')" />
                <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" value="{{ old('descripcion', $servicio->descripcion) }}" required />
            </div>

            <!-- Precio -->
            <div class="mb-4">
                <x-input-label for="precio" :value="__('Precio')" />
                <x-text-input id="precio" class="block mt-1 w-full" type="text" name="precio" value="{{ old('precio', $servicio->precio) }}" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Actualizar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
