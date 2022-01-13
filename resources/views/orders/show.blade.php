<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 flex items-center ">
            <div class="relative">
                <div class="{{($order->status >= 2 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12  flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>

                <div class="absolute mt-0.5">
                    <p>Recibido</p>
                </div>
            </div>

            <div class=" {{($order->status >= 3 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1  mx-1"></div>

            <div class="relative">
                <div class="{{($order->status >= 3 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-truck text-white"></i>
                </div>

                <div class="absolute">
                    <p>Enviado</p>
                </div>
            </div>

            <div class="{{($order->status >= 3 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1  mx-1"></div>

            <div class="relative">
                <div class="{{($order->status >= 4 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <div class="absolute -lef-2">
                    <p>Entregado</p>
                </div>
            </div>


        </div>

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase">Numero de orden: Orden - {{$order->id}}</p>

            @if ($order->status == 1)
                <a class="ml-auto" href="{{route('orders.payment', $order)}}">
                    <x-button>
                        ir a pagar
                    </x-button>
                </a>
            @endif

        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <p class="text-lg font-semibold uppercase">Envio <i class="fas fa-truck ml-4"></i></p>

                    <p class="text-sm">Los productos seran enviados a:</p>
                    <p class="text-sm">{{$order->address}}</p>
                    <p class="text-sm"><!--$order->district--> viña del mar</p>

                </div>

                <div>
                    <p class="text-lg font-semibold uppercase">Datos de contacto <i class="far fa-edit ml-4"></i></p>

                    <p class="text-sm">Persona que recibira el producto:  {{$order->contact}}</p>
                    <p class="text-sm">Telefono de contacto: {{$order->phone}}</p>
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
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">
                                    <article>
                                        <h1 class="font-bold">{{$item->name}}</h1>
                                    </article>
                                </div>
                            </td>
                            <td class="text-center">
                            $ {{number_format($item->price)}}
                            </td>
                            <td class="text-center">
                                {{$item->qty}}
                            </td>
                            <td class="text-center">
                                $ {{number_format($item->price * $item->qty)}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 flex justify-between items-center">

            <img class="h-20 w-30 object-cover" src="{{ asset('img/friso-formas-de-pago.png') }}" alt="">
            <div class="text-gray-700">
                <p class="font-semibold text-sm">
                    Subtotal: $ {{number_format($item->price * $item->qty)}}
                </p>
                <p class="font-semibold text-sm">
                    Envio: $ {{number_format($order->shipping_cost)}}
                </p>
                <p class="text-lg font-semibold">
                    Total:  {{number_format(($item->price * $item->qty) + $order->shipping_cost)}}
                </p>
            </div>   

        </div>
    </div>
</x-app-layout>