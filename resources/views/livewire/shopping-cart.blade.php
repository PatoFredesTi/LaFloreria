<div class="container py-8">
    <section class="bg-white rounded-lg shadow-lg p-6 text-gray-700">
        <h1 class="text-lg font-semibold"> CARRO DE COMPRAS</h1>
        @if (Cart::count() > 0)
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>PRECIO</th>
                        <th>CANTIDAD</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (Cart::content() as $item)
                        
                        <tr>
                            <td>
                                <div class="flex">
                                    <a href="">
                                        <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}} ">
                                    </a>
                                    <div>
                                        <p class="font-bold" >{{$item->name}}</p>
                                    </div>

                                </div>

                            </td>
                            <td class="text-center">
                                <span>$ {{
                                number_format($item->price);

                            
                                }}</span>
                                <a class="ml-6 cursor-pointer hover:text-red-600"
                                    wire:click="delete('{{$item->rowId}}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                            <td>
                                <div class="flex justify-center">
                                    @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                </div>
                            </td>
                            <td class="text-center">
                                <span>$ {{number_format($item->price * $item->qty)}}</span>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

            <!--- SE DEBE CAMBIAR POR BOTON MAS PULENTO Y EN LA ESQUINA DERECHA -->
            <a class="text-sm cursor-auto hover:underline inline-block mt-3" wire:click="destroy">
                <i class="fas fa-trash"></i>
                Borrar Carrito de Compras
            </a>
        @else
            <div class="flex flex-col items-center">
                <x-cart/>
                <p class="text-lg text-gray-700 mt-4">EL CARRITO ESTA COMPLETAMENTE VACIO</p>
                
                <a href="/">
                    <x-button class="mt-4 px-16">
                        Volver a la tienda
                    </x-button>
                </a>
            </div>
        @endif
    </section>

    <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-700">
                    <span class="font-bold text-lg">Total a pagar: </span>
                    $ {{Cart::subtotal()}}
                </p>
            </div>

            <div>
                <a href="{{route('orders.create')}}">
                    <x-button>
                        Continuar compra
                    </x-button>
                </a>
            </div>
        </div>
    </div>
</div>
