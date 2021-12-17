<div class="flex">
    <x-jet-secondary-button wire:click="decrement">
        -
    </x-jet-secondary-button>
    <span class="mx-2 text-gray-700">{{$qty}}</span>
    <x-jet-secondary-button wire:click="increment">
        +
    </x-jet-secondary-button>
</div>
