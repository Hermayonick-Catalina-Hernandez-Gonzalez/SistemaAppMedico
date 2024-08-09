<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Registro de usuarios Enfermeros')}}
        </h2>
    </x-slot>

    <!-- TODO -->
    <div class="py-12 flex justify-center">
        <div class="max-w-lg w-full sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="post" action="{{ route('admin.registro-enfermeros.store') }}">
                    @csrf
                    <!-- Nombre -->
                    <div>
                        <x-input-label for="nombre" :value="__('Nombre(s)*')"/>
                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                            :value="old('nombre')" required autofocus autocomplete="nombre" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!-- Apellidos -->
                    <div class="mt-4">
                        <x-input-label for="apellido" :value="__('Apellido(s)*')" />
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
                    <!-- Correo electrónico -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email*')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <!-- Contraseña -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Contraseña*')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <!-- Confirmar contraseña -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirmar contraseña*')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <!-- Rol -->
                    <div class="mt-4">
                        <x-input-label for="role" :value="__('Rol*')" />
                        <select id="role" name="role"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900">
                            <option value="Enfermero">{{ __('Enfermero') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>
                    <!-- Submit -->
                    <div class="flex items-center justify-center mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Registrar')}}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
