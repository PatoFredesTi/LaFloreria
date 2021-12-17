<div>
    <!--
    <p class="text-gray-700">
        <span class="font-semibold text-lg mb-2">Stock disponible: </span> {{$quantity}}
    </p>
    -->
    <div class="flex">
        <div class="mr-4">
            <x-jet-secondary-button wire:click="decrement">
                -
            </x-jet-secondary-button>
            <span class="mx-2 text-gray-700">{{$qty}}</span>
            <x-jet-secondary-button wire:click="increment">
                +
            </x-jet-secondary-button >
        </div>
        <div class="flex-1 ml-4">
            <x-button class="w-full" wire:click="addItem" 
                wire:loading.attr="disabled" wire:loading.class="opacity-50" wire:loading.style="pointer-events: none;"
                wire:tarjet="addItem" >
                Agregar al Carrito
            </x-button>
        </div>
    </div>
</div>
