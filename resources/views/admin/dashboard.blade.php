<?php
use Illuminate\Support\Facades\Auth;
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Página Principal') }}
        </h2>
    </x-slot>

    <div class="mt-6 dark:bg-gray-800 p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Citas Medicas</h3>
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
                        <th class="py-3 px-6 text-left">Paciente</th>
                        <th class="py-3 px-6 text-left">Fecha</th>
                        <th class="py-3 px-6 text-left">Hora</th>
                        <th class="py-3 px-6 text-left">Tipo de Servicio</th>
                        <th class="py-3 px-6 text-left">Acción</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="py-3 px-6 text-left">Diego Ortiz</td>
                        <td class="py-3 px-6 text-left">05/06/2021</td>
                        <td class="py-3 px-6 text-left">13:00</td>
                        <td class="py-3 px-6 text-left">Consulta General</td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex space-x-2">
                                <a href=""
                                    class="ms-4 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Confirmar Cita') }}
                                </a>
                                <a href="{{--{{ route('medico.consultas') }} --}}"
                                    class="ms-4 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Generar Cita') }}
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
