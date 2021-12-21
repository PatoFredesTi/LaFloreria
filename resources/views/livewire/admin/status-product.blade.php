<div class="bg-white shadow-xl rounded-lg p-6 mb-4">
    <p class="text-2xl text-center font-semibold mb-2">Estado del producto</p>

    <div class="flex justify-between">
        <label class="mr-4" for="">
            <input wire:model.defer="status" type="radio" name="status" value="1">
            Marcar producto como Borrador
        </label>
        <label for="">
            <input wire:model.defer="status" type="radio" name="status" value="2">
            Marcar producto como Publicado
        </label>
    </div>
    <div class="flex justify-center text-center mt-6">

            <x-jet-action-message class="mr-3" on="saved">
                Actualizado 
            </x-jet-action-message>

        <x-jet-button class="w-96 justify-center" 
            wire:click="save"
            wire:loading.attr="disabled"
            wire:tarjet="save">
            
            Actualizar
        </x-jet-button>
    </div>
</div>
