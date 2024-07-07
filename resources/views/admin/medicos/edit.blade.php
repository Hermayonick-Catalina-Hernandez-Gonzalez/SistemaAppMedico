<!-- resources/views/admin/medicos/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Médico') }}
        </h2>
    </x-slot>

    <div class="mt-6 bg-gray-200 p-6 rounded-lg shadow">
        <form method="POST" action="{{ route('medicos.update', $medico->id) }}">
            @csrf
            @method('PATCH')

            <!-- Nombre -->
            <div class="mb-4">
                <x-input-label for="nombre" :value="__('Nombre')" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ old('nombre', $medico->nombre) }}" required autofocus />
            </div>

            <!-- Apellido -->
            <div class="mb-4">
                <x-input-label for="apellido" :value="__('Apellido')" />
                <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" value="{{ old('apellido', $medico->apellido) }}" required />
            </div>

            <!-- Teléfono -->
            <div class="mb-4">
                <x-input-label for="telefono" :value="__('Teléfono')" />
                <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" value="{{ old('telefono', $medico->telefono) }}" required />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email', $medico->email) }}" required />
            </div>

            <!-- Profesión -->
            <div class="mb-4">
                <x-input-label for="profesion" :value="__('Profesión')" />
                <x-text-input id="profesion" class="block mt-1 w-full" type="text" name="profesion" value="{{ old('profesion', $medico->medico->profesion) }}" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Actualizar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
