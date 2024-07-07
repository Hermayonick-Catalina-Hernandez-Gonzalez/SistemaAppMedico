<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
    <!-- Incluye Tailwind CSS desde CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-6  p-6 rounded-lg shadow">
                    <!-- Buscador -->
                    <div class="flex justify-between items-center mb-4">
                        <input type="text" placeholder="Buscar por nombre de paciente..."
                            class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                    <!-- Tabla -->
                    <div class="overflow-x-auto flex justify-center">
                        <table class="min-w-full bg-white  rounded-lg shadow-md">
                            <thead>
                                <tr
                                    class="bg-gray-200  text-gray-600  uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Fecha</th>
                                    <th class="py-3 px-6 text-left">Hora</th>
                                    <th class="py-3 px-6 text-left">Tipo de Servicio</th>
                                    <th class="py-3 px-6 text-left">Pago total</th>
                                    <th class="py-3 px-6 text-left">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600  text-sm">
                                <tr class="border-b border-gray-200 ">
                                    <td class="py-3 px-6 text-left">05/06/2021</td>
                                    <td class="py-3 px-6 text-left">13:00</td>
                                    <td class="py-3 px-6 text-left">Consulta General</td>
                                    <td class="py-3 px-6 text-left">500</td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex space-x-2">
                                            <a href="#"
                                            class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                Confirmar Pago
                                            </a>
                                            <a href="#"
                                            class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                Ver Ticket
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
