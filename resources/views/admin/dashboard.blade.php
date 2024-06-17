<?php
use Illuminate\Support\Facades\Auth;
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Página Principal') }}
        </h2>
    </x-slot>
    <!--Contenido de la tabla de Pacientes-->
    <div class="mt-6 dark:bg-gray-800 p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Lista de usuarios Pacientes</h3>
        {{-- Buscador --}}
        <div class="flex justify-between items-center mb-4">
            <input type="text" placeholder="Buscar por nombre de paciente..."
                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        </div>
        {{-- Tabla --}}
        <div class="overflow-x-auto flex justify-center">
            <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <thead>
                    <tr
                        class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Nombre</th>
                        <th class="py-3 px-6 text-left">Apellido</th>
                        <th class="py-3 px-6 text-left">Teléfono</th>
                        <th class="py-3 px-6 text-left">Acciones</th>
                    </tr>
                </thead>

                <!-- Extraer de la BD los datos de la tabla de pacientes-->
                <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                    @foreach ($pacientes as $paciente)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="py-3 px-6 text-left">{{ $paciente->nombre}}</td>
                            <td class="py-3 px-6 text-left">{{ $paciente->apellido}}</td>
                            <td class="py-3 px-6 text-left">{{ $paciente->telefono}}</td>                        
                            <td class="py-3 px-6 text-left">
                                <div class="flex space-x-2">
                                    <a href="{{ route('pacientes.edit', $paciente->id) }}"
                                        class="ms-4 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-grey uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        {{ __('Modificar') }}
                                    </a>
                                    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar este paciente?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ms-4 inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            {{ __('Eliminar') }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--Contenido de la tabla de Médicos-->
    <div class="mt-6 dark:bg-gray-800 p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Lista de usuarios Médicos</h3>
        {{-- Buscador --}}
        <div class="flex justify-between items-center mb-4">
            <input type="text" placeholder="Buscar por nombre de paciente..."
                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        </div>
        {{-- Tabla --}}
        <div class="overflow-x-auto flex justify-center">
            <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <thead>
                    <tr
                        class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Nombre</th>
                        <th class="py-3 px-6 text-left">Apellido</th>
                        <th class="py-3 px-6 text-left">Teléfono</th>
                        <th class="py-3 px-6 text-left">Acciones</th>
                    </tr>
                </thead>

                <!-- Extraer de la BD los datos de la tabla de pacientes-->
                <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                    @foreach ($medicos as $medico)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="py-3 px-6 text-left">{{ $medico->nombre}}</td>
                            <td class="py-3 px-6 text-left">{{ $medico->apellido}}</td>
                            <td class="py-3 px-6 text-left">{{ $medico->telefono}}</td>                        
                            <td class="py-3 px-6 text-left">
                                <div class="flex space-x-2">
                                    <a href="{{ route('medicos.edit', $medico->id) }}"
                                        class="ms-4 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-grey uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        {{ __('Modificar') }}
                                    </a>
                                    <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar este médico?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ms-4 inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            {{ __('Eliminar') }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--Contenido de la tabla de Secretario-->
    <div class="mt-6 dark:bg-gray-800 p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Lista de usuarios Secretario</h3>
        {{-- Buscador --}}
        <div class="flex justify-between items-center mb-4">
            <input type="text" placeholder="Buscar por nombre de paciente..."
                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        </div>
        {{-- Tabla --}}
        <div class="overflow-x-auto flex justify-center">
            <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <thead>
                    <tr
                        class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Nombre</th>
                        <th class="py-3 px-6 text-left">Apellido</th>
                        <th class="py-3 px-6 text-left">Teléfono</th>
                        <th class="py-3 px-6 text-left">Acciones</th>
                    </tr>
                </thead>

                <!-- Extraer de la BD los datos de la tabla de pacientes-->
                <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                    @foreach ($secretarios as $secretario)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="py-3 px-6 text-left">{{ $secretario->nombre}}</td>
                            <td class="py-3 px-6 text-left">{{ $secretario->apellido}}</td>
                            <td class="py-3 px-6 text-left">{{ $secretario->telefono}}</td>                        
                            <td class="py-3 px-6 text-left">
                                <div class="flex space-x-2">
                                    <a href="{{ route('secretarios.edit', $secretario->id) }}"
                                        class="ms-4 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-grey uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        {{ __('Modificar') }}
                                    </a>
                                    <a href="{{ route('secretarios.destroy', $secretario->id) }}"
                                    class="ms-4 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md     font-semibold text-xs text-grey uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Eliminar') }}
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
