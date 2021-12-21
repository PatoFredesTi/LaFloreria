<div>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight ">Lista de Productos</h2>

            <a href="{{route('admin.products.create')}}">
                <x-button class="ml-auto">
                    Agregar Producto
                </x-button>
            </a>

        </div>
    </x-slot>

    <div class="container py-12">
            <x-table-responsive>   
                <div class="px-6 py-4">
                    <x-jet-input class="w-full" type="text" wire:model="search" placeholder="Buscar producto" />
                </div>
                
                @if ($products->count())
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Categoria
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Precio
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Editar</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 object-cover">
                                                @if ($product->images->count())
                                                    <img class="h-10 w-10 rounded-full" src="{{Storage::url($product->images->first()->url)}}" alt="">
                                                @else
                                                    <img class="h-10 w-10 rounded-full object-cover" src="https://healthduel.net/healthduel/storage/app/game/GyeyqSeDD2qRmWJf8kocbK9YCtowBvgF4PZPsDlW.jpeg" alt="">
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{$product->name}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{$product->name}}
                                            {{$product->id}}
                                            {{-- falta categoria name--}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @switch($product->status)
                                            @case(1)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    BORRADOR
                                                </span>
                                            @break
                                            @case(2)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    PUBLICADO
                                                </span>
                                            @break
                                            @default
                                                
                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        $ {{$product->price}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{route('admin.products.edit', $product)}}">
                                        <x-button>
                                            Editar
                                        </x-button>
                                    </a>
                                    </td>
                                </tr>
                            @endforeach
                        <!-- More people... -->
                        </tbody>
                    </table>
                @else
                    <div class="py-4 px-6">
                        No se ha encontrado ningun producto
                    </div>
                @endif


                @if ($products->hasPages())
                    <div class="px-6 py-4">
                        {{$products->links()}}
                    </div>                      
                @endif

            </x-table-responsive>
    </div>    
</div>
