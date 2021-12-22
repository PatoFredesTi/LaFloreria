<div>
    <x-jet-dropdown width="96">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <x-cart size="40"/>
                @if (Cart::count())
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{Cart::count()}}</span>
                @else
                    <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
                @endif
            </span>
        </x-slot>

        <x-slot name="content">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex ">
                        <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">

                        <article class="flex-1 border-b border-gray-200">
                            <h1 class="font-bold">{{$item->name}}</h1>

                            <p>Cant: {{$item->qty}}</p>

                            <p>$ {{$item->price}}</p>
                        </article>
                    </li>
                @empty
                    <div class="py-6 px-4">
                        <p class="text-center text-gray-500">
                            No tiene agregado ningun producto
                        </p>
                    </div>
                @endforelse
            </ul>

            @if (Cart::count())
                <div class="py-4 px-6 ">
                    <p class="text-lg text-gray-700"><span class="font-bold">Total: $ {{Cart::subtotal()}}</p></span> 

                    <a href="{{route('shopping-cart')}}">
                        <x-button class="w-full">
                            Ir al carrito
                        </x-button>
                    </a>
                </div>
            @endif

        </x-slot>
    </x-jet-dropdown>
</div>
