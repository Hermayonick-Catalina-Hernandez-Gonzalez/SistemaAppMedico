<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Token CSRF -->
    <title>Productos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Productos') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-6 p-6 rounded-lg shadow">
                    <!-- Buscador -->
                    <div class="flex justify-between items-center mb-4">
                        <input type="text" id="search" placeholder="Buscar producto..."
                            class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <a href="#" id="openModal"
                            class="ml-2 inline-flex items-center px-4 py-2 bg-green-500 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Vender
                        </a>
                    </div>
                    <!-- Tabla -->
                    <div class="overflow-x-auto flex justify-center">
                        <table class="min-w-full bg-white rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Producto</th>
                                    <th class="py-3 px-6 text-left">Cantidad</th>
                                    <th class="py-3 px-6 text-left">Precio</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">
                                @foreach ($productos as $producto)
                                    <tr class="border-b border-gray-200 producto" data-id="{{ $producto->id }}">
                                        <td class="py-3 px-6 text-left">{{ $producto->nombre }}</td>
                                        <td class="py-3 px-6 text-left cantidad">{{ $producto->cantidad }}</td>
                                        <td class="py-3 px-6 text-left">{{ $producto->precio }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="modal"
            class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
            <div class="bg-white rounded-lg p-4 w-2/3 max-w-4xl">
                <h3 class="text-lg font-semibold text-gray-900">Realizar Venta</h3>
                <form id="ventaForm" method="POST" action="{{ route('ventas.store') }}">
                    @csrf
                    <div id="productosContainer">
                        <!-- Los productos se añadirán aquí dinámicamente -->
                    </div>
                    <div class="flex justify-between mt-4">
                        <span class="text-lg font-semibold text-gray-900">Total: <span
                                id="totalPrice">0.00</span></span>
                        <div>
                            <button type="button" id="addProduct"
                                class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Añadir Producto
                            </button>
                            <button type="submit"
                                class="ml-2 inline-flex items-center px-4 py-2 bg-green-500 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Confirmar Venta
                            </button>
                            <button type="button" id="closeModal"
                                class="ml-2 inline-flex items-center px-4 py-2 bg-gray-500 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-app-layout>

    <script>
        document.getElementById('openModal').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('modal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('modal').classList.add('hidden');
        });

        let counter = 1;

        function updateTotal() {
            const totalPriceElement = document.getElementById('totalPrice');
            const productosContainer = document.getElementById('productosContainer');
            let total = 0;
            productosContainer.querySelectorAll('.producto').forEach(producto => {
                const cantidadInput = producto.querySelector('input[name="cantidad[]"]');
                const select = producto.querySelector('select[name="medicacion[]"]');
                const cantidad = parseFloat(cantidadInput.value) || 0;
                const precio = parseFloat(select.options[select.selectedIndex].dataset.precio) || 0;
                total += cantidad * precio;
            });
            totalPriceElement.textContent = total.toFixed(2);
        }

        function addProducto() {
            const container = document.getElementById('productosContainer');
            const productoHTML = `
                <div class="mb-4 flex items-center producto" id="producto_${counter}">
                    <div class="relative w-1/4 mr-2">
                        <i class="fa fa-pills absolute left-2 top-2.5 text-gray-400"></i>
                        <select class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10" name="medicacion[]">
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}">{{ $producto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative w-1/4 mr-2">
                        <i class="fa fa-sort-numeric-up-alt absolute left-2 top-2.5 text-gray-400"></i>
                        <input class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 pl-10" name="cantidad[]" placeholder="Cantidad" type="number" min="1" step="1" oninput="updateTotal()">
                    </div>
                    <button type="button" onclick="removeProducto('producto_${counter}')" class="text-red-500">Eliminar</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', productoHTML);
            counter++;
        }

        function removeProducto(id) {
            const element = document.getElementById(id);
            if (element) {
                element.remove();
                updateTotal();
            }
        }

        document.getElementById('addProduct').addEventListener('click', function() {
            addProducto();
        });

        document.getElementById('ventaForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Venta Terminada',
                        text: 'Venta realizada con éxito',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                    document.getElementById('modal').classList.add('hidden');
                    data.updatedProducts.forEach(product => {
                        const row = document.querySelector(`.producto[data-id="${product.id}"]`);
                        if (row) {
                            row.querySelector('.cantidad').textContent = product.cantidad;
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: data.error || 'Error inesperado',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error',
                    text: 'Error al realizar la venta',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            });
        });
    </script>

</body>

</html>
