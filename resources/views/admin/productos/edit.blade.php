<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="mt-6 bg-gray-600 p-6 rounded-lg shadow">
        <form method="POST" action="{{ route('registro-productos.update', $producto->id) }}">
            @csrf
            @method('PATCH')

            <!-- Nombre -->
            <div class="mb-4">
                <x-input-label for="nombre" :value="__('Nombre')" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required autofocus />
            </div>

            <!-- Cantidad -->
            <div class="mb-4">
                <x-input-label for="cantidad" :value="__('Cantidad')" />
                <x-text-input id="cantidad" class="block mt-1 w-full" type="number" name="cantidad" value="{{ old('cantidad', $producto->cantidad) }}" required />
            </div>

            <!-- Fecha de Vencimiento -->
            <div class="mb-4">
                <x-input-label for="fecha_vencimiento" :value="__('Fecha de Vencimiento')" />
                <x-text-input id="fecha_vencimiento" class="block mt-1 w-full" type="date" name="fecha_vencimiento" value="{{ old('fecha_vencimiento', $producto->fecha_vencimiento) }}" required />
            </div>

            <!-- Precio -->
            <div class="mb-4">
                <x-input-label for="precio" :value="__('Precio')" />
                <x-text-input id="precio" class="block mt-1 w-full" type="text" name="precio" value="{{ old('precio', $producto->precio) }}" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Actualizar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
