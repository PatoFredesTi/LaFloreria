<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <div class="flex items-center">
                <div class=" rounded-full h-12 w-12 bg-blue-400 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
            </div>

            <div class="h-1 flex-1 bg-blue-400 mx-1"></div>

            <div class="flex items-center">
                <div class=" rounded-full h-12 w-12 bg-blue-400 flex items-center justify-center">
                    <i class="fas fa-truck text-white"></i>
                </div>
            </div>

            <div class="h-1 flex-1 bg-blue-400 mx-1"></div>

            <div class="flex items-center">
                <div class=" rounded-full h-12 w-12 bg-blue-400 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
            </div>

            <div class="h-1 flex-1 bg-blue-400 mx-1"></div>

        </div>

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
            <p class="text-gray-700 uppercase">Numero de orden: Orden - <!--order-id--> 546</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <p class="text-lg font-semibold uppercase">Envio <i class="fas fa-truck ml-4"></i></p>

                    <p class="text-sm">Los productos seran enviados a:</p>
                    <p class="text-sm"><!--$order->address--> arlegui 548</p>
                    <p class="text-sm"><!--$order->district--> viña del mar</p>

                </div>

                <div>
                    <p class="text-lg font-semibold uppercase">Datos de contacto <i class="far fa-edit ml-4"></i></p>

                    <p class="text-sm">Persona que recibira el producto:  Fernanda Lopez<!--$order->contact--></p>
                    <p class="text-sm">Telefono de contacto: 987654321 <!--$order->phone--></p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 text-gray-700">
            <p class="text-xl font-semibold mb-4">Resumen</p>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                   <!-- foreach ($order->content as $item)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    endforeach -->

                    <tr>
                        <td>
                            <div class="flex">
                                <img class="h-15 w-20 object-cover mr-4" src="" alt=""> <!-- $item->options->image -->
                                <p class="mr-4">Hola soy una imagen</p>
                                <article>
                                    <h1 class="font-bold">Arreglo floral de 12 rosas</h1>
                                </article>
                            </div>
                        </td>
                        <td class="text-center">
                            $29990 <!--$item->price-->
                        </td>
                        <td class="text-center">
                            1 <!--$item->qty-->
                        </td>
                        <td class="text-center">
                            $29990 <!--$item->price * $item->qty-->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 flex justify-between items-center">
            <i class="fas fa-hand-holding-usd text-3xl"></i>
            <div class="text-gray-700">
                <p class="font-semibold text-sm">
                    Subtotal: $29990 <!--$order->total - $order->shipping-cost-->
                </p>
                <p class="font-semibold text-sm">
                    Envio: $5000 <!--$order->shipping-cost-->
                </p>
                <p class="text-lg font-semibold">
                    Total: $34990 <!--$order->total-->
                </p>
            </div>

        </div>
        <x-button class="w-full">
            Generar Orden
        </x-button>
    </div>
</x-app-layout>