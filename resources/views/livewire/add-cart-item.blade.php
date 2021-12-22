<div x-data>
    <p class="text-gray-700 mb-4">
        <span class="font-semibold text-xl mb-2">Stock disponible: 
            @if ($quantity < 3)
                <span class="text-red-400">{{$quantity}}</span>
            @else
                <span class="text-green-400">{{$quantity}}</span>
            @endif </span>  
    </p>
    
    <div class="flex">
        <div class="mr-4">
            <x-jet-secondary-button wire:click="decrement" >
                -
            </x-jet-secondary-button>
            <span class="mx-2 text-gray-700">{{$qty}}</span>
            <x-jet-secondary-button 
                x-bind:disabled="$wire.qty >= $wire.quantity"
                wire:loading.attr="disabled"
                wire:tarjet.click="increment"
                wire:click="increment">
                +
            </x-jet-secondary-button >
        </div>
        <div class="flex-1 ml-4">
            <x-button class="w-full" wire:click="addItem" 
                wire:loading.attr="disabled" wire:loading.class="opacity-50" wire:loading.style="pointer-events: none;"
                wire:tarjet="addItem" 
                x-bind:disabled="$wire.qty > $wire.quantity"
                >
                Agregar al Carrito
            </x-button>
        </div>
    </div>
</div>
