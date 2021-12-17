<div class="flex-1 relative" x-data>
    <x-jet-input wire:model="search" type="text" class="w-full -mx-5" placeholder="Que producto necesitas?"/>

    <button class="absolute top-0 right-3 w-14 h-full flex items-center justify-center ">
        <x-search size="40" />
    </button>

    <div class="absolute w-full mt-1 hidden" :class="{ 'hidden' : !$wire.open }" @click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    <a href="{{route('products.show', $product)}}" class="flex"> 
                        <img class="w-16 h-12 object-cover" src="{{Storage::url($product->images->first()->url)}}">
                        <div class="ml-4 text-gray-700">
                            <p class="text-lg font-semibold leading-5">{{$product->name}}</p>
                        </div>
                    </a>
                @empty
                    <div>
                        <p class="text-gray-700">No hay resultados</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
