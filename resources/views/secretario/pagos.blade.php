<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
    <!-- Incluye Tailwind CSS desde CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Incluye SweetAlert2 desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-6 p-6 rounded-lg shadow">
                    <!-- Buscador -->
                    <div class="flex justify-between items-center mb-4">
                        <form action="{{ route('secretario.pagos') }}" method="GET" class="w-full">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Buscar por nombre de paciente..."
                                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        </form>
                    </div>
                    <!-- Tabla -->
                    <div class="overflow-x-auto flex justify-center">
                        <table class="min-w-full bg-white rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Médico</th>
                                    <th class="py-3 px-6 text-left">Paciente</th>
                                    <th class="py-3 px-6 text-left">Pago total</th>
                                    <th class="py-3 px-6 text-left">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">
                                @foreach ($consultas as $consulta)
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 px-6 text-left">{{ $consulta->medico->nombre }}</td>
                                        <td class="py-3 px-6 text-left">{{ $consulta->paciente->nombre }}</td>
                                        <td class="py-3 px-6 text-left">${{ $consulta->total }}</td>
                                        <td class="py-3 px-6">
                                            <div class="flex space-x-2">
                                                <a href="#" onclick="confirmPayment()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                    Confirmar Pago
                                                </a>
                                                <a href="#" onclick="viewTicket({{ json_encode($consulta) }})"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                    Ver Ticket
                                                 </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <!-- Script para mostrar el modal -->
    <script>
        function viewTicket(consulta) {
            Swal.fire({
                title: 'Ticket de Pago',
                html: `
                    <div class="p-4">
                        <p><strong>Paciente:</strong> ${consulta.paciente.nombre}</p>
                        <p><strong>Médico:</strong> ${consulta.medico.nombre}</p>
                        <p><strong>Pago Total:</strong> $${consulta.total}</p>
                        <p><strong>Fecha:</strong> ${new Date(consulta.created_at).toLocaleDateString()}</p>
                        <!-- Añadir más detalles aquí si es necesario -->
                    </div>`,
                width: '60%',
                showCloseButton: true,
                showConfirmButton: false,
                customClass: {
                    popup: 'bg-white p-6 rounded-lg shadow-lg'
                }
            });
        }

        function confirmPayment() {
            // Implementar la lógica para confirmar el pago aquí
            alert('Pago confirmado.');
        }
    </script>
</body>

</html>
