<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Secretario</title>
    <!-- Incluye Tailwind CSS desde CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 ">
                {{ __('Registro Secretarios') }}
            </h2>
        </x-slot>

        <div class="py-12 flex justify-center">
            <div class="max-w-lg w-full sm:px-6 lg:px-8">
                <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <form method="POST" action="{{ route('admin.registro-secretarios') }}">
                        @csrf
                        <!-- Nombre -->
                        <div>
                            <x-input-label for="nombre" :value="__('Nombre(s)*')" />
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                :value="old('nombre')" required autofocus autocomplete="nombre" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Apellidos -->
                        <div class="mt-4">
                            <x-input-label for="apellido" :value="__('Apellidos*')" />
                            <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido"
                                :value="old('apellidos')" required autocomplete="apellido" />
                            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
                        </div>

                        <!-- Fecha de nacimiento -->
                        <div class="mt-4">
                            <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento*')" />
                            <x-text-input id="fecha_nacimiento" class="block mt-1 w-full" type="date"
                                name="fecha_nacimiento" :value="old('fecha_nacimiento')" required autocomplete="fecha_nacimiento" />
                            <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />
                        </div>

                        <!-- Teléfono -->
                        <div class="mt-4">
                            <x-input-label for="telefono" :value="__('Teléfono*')" />
                            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono"
                                :value="old('telefono')" required autocomplete="telefono" />
                            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email*')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Contraseña')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Rol -->
                        <div class="mt-4">
                            <x-input-label for="role" :value="__('Rol*')" />
                            <select id="role" name="role"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900">
                                <option value="Secretario">{{ __('Secretario') }}</option>
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
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
