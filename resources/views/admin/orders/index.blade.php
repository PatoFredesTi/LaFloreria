<x-admin-layout>
    <div class="container py-12">
        <section class="grid grid-cols-4 gap-6 text-white">
            <a href="{{route('admin.orders.index') . "?status=2"}}" class=" bg-green-500 bg-opacity-75 rounded-lg px-12 py-8">
                <p class="text-center text-2xl">
                    {{$recibido}}
                </p>
                <p class="uppercase text-center" >Recibido</p>
                <p class="text-center text-2xl">
                    <i class="fas fa-credit-card"></i>
                </p>
            </a>
            <a href="{{route('admin.orders.index') . "?status=3"}}" class="bg-yellow-500 bg-opacity-75 rounded-lg px-12 py-8">
                <p class="text-center text-2xl">
                    {{$enviado}}
                </p>
                <p class="uppercase text-center" >Enviado</p>
                <p class="text-center text-2xl">
                    <i class="fas fa-truck"></i>
                </p>
            </a>
            <a href="{{route('admin.orders.index') . "?status=4"}}" class="bg-blue-500 bg-opacity-75 rounded-lg px-12 py-8">
                <p class="text-center text-2xl">
                    {{$entregado}}
                </p>
                <p class="uppercase text-center" >Entregado</p>
                <p class="text-center text-2xl">
                    <i class="fas fa-check-circle"></i>
                </p>
            </a>
            <a href="{{route('admin.orders.index') . "?status=5"}}" class="bg-red-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$anulado}}
                </p>
                <p class="uppercase text-center" >Anulado</p>
                <p class="text-center text-2xl">
                    <i class="fas fa-times-circle"></i>
                </p>
            </a>
        </section>
        @if($orders->count())
            <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
                <h1 class="text-2xl">Pedidos Recientes</h1>

                <ul>
                    @foreach ($orders as $order)
                        <li>
                            <a href="{{route('admin.orders.show', $order)}}" class="flex items-center py-2 px-4 hover:bg-teal-100" href="">
                                <span class="w-12 text-center">
                                    @switch($order->status)
                                        @case(1)
                                            <i class="fas fa-business-time text-gray-500 opacity-50"></i>
                                            @break
                                        @case(2)
                                            <i class="fas fa-credit-card text-green-500 opacity-50"></i>
                                            @break
                                        @case(3)
                                            <i class="fas fa-truck text-yellow-500 opacity-50"></i>1
                                            @break
                                        @case(4)
                                            <i class="fas fa-check-circle text-blue-500 opacity-50"></i>
                                            @break
                                        @case(5)
                                            <i class="fas fa-times-circle text-red-500 opacity-50"></i>
                                            @break
                                        @default
                                            
                                    @endswitch
                                </span>

                                <span >
                                    Orden: {{$order->id}}
                                    <br>
                                    {{$order->created_at->format('d/m/Y')}}
                                </span>
                                
                                <div class="ml-auto">
                                    <span class="font-bold">
                                        @switch($order->status)
                                            @case(1)
                                                
                                                <span class="text-gray-500">Pendiente</span>

                                                @break
                                            @case(2)
                                                
                                                <span class="text-green-500">Recibido</span>

                                                @break
                                            @case(3)
                                                
                                                <span class="text-yellow-500">Enviado</span>

                                                @break
                                            @case(4)
                                                
                                                <span class="text-blue-500">Entregado</span>

                                                @break
                                            @case(5)
                                                
                                                <span class="text-red-500">Anulado</span>

                                                @break
                                            @default
                                            
                                        @endswitch
                                    </span>

                                    <span class="text-sm">
                                        {{$order->total}}
                                    </span> 
                                </div>

                                <span>
                                    <i class="fas fa-angle-right ml-6"></i>
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>
        @else
            <div class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
                <span class="font-bold text-lg">
                    No existen registro de ordenes
                </span>
            </div>
        @endif
    </div>
</x-admin-layout>