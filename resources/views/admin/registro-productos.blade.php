<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!-- Incluye Tailwind CSS desde CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Productos') }}
            </h2>
        </x-slot>

        <div class="py-12 flex justify-center">
            <div class="max-w-lg w-full sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <form method="POST" action="{{ route('admin.registro-productos') }}">
                        @csrf
                        <!-- Nombre -->
                        <div>
                            <x-input-label for="nombre" :value="__('Nombre del producto*')" />
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                :value="old('nombre')" required autofocus autocomplete="nombre" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                         <!-- Cantidad-->
                        <div>
                            <x-input-label for="cantidad" :value="__('Cantidad*')" />
                            <x-text-input id="cantidad" class="block mt-1 w-full" type="text" name="cantidad"
                                :value="old('cantidad')" required autofocus autocomplete="cantidad" />
                            <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />
                        </div>


                        <!-- Fecha de Vencimiento -->
                        <div class="mt-4">
                            <x-input-label for="fecha_vencimiento" :value="__('Fecha de vencimiento')" />
                            <x-text-input id="fecha_vencimiento" class="block mt-1 w-full" type="date"
                                name="fecha_vencimiento" :value="old('fecha_vencimiento')" required autocomplete="fecha_vencimiento" />
                            <x-input-error :messages="$errors->get('fecha_vencimiento')" class="mt-2" />
                        </div>


                        <!-- Precio-->
                        <div>
                            <x-input-label for="precio" :value="__('Precio*')" />
                            <x-text-input id="precio" class="block mt-1 w-full" type="text" name="precio"
                                :value="old('precio')" required autofocus autocomplete="precio" />
                            <x-input-error :messages="$errors->get('precio')" class="mt-2" />
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
</body>

</html>