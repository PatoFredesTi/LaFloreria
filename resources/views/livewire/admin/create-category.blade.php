<div>
    <x-jet-form-section submit="save" class="mb-6">

        <x-slot name="title">
            Crear nueva categoria
        </x-slot>

        <x-slot name="description">
            Complete la información de la categoria
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model="createForm.name" type="text" class="w-full mt-1" />
                <x-jet-input-error for="createForm.name" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Slug
                </x-jet-label>

                <x-jet-input wire:model="createForm.slug" type="text" class="w-full mt-1"  />
                <x-jet-input-error for="createForm.slug" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Icono
                </x-jet-label>

                <x-jet-input wire:model.defer="createForm.icon" type="text" class="w-full mt-1"  />
                <x-jet-input-error for="createForm.icon" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Imagen
                </x-jet-label>

                <input wire:model="createForm.image" accept="image/*" type="file" id="{{$rand}}">
                <x-jet-input-error for="createForm.image" />
            </div>
        </x-slot>

        <x-slot name="actions">

            <x-jet-action-message class="mr-3" on="saved">
                Categoria Creada con exito
            </x-jet-action-message>
            
            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>

    <x-jet-action-section>
        <x-slot name="title">
            Lista de categorias
        </x-slot>

        <x-slot name="description">
            Aqui encontraras todas las categorias creadas
        </x-slot>

        <x-slot name="content">
            <table class="text-gray-600 ">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">Nombre</th>
                        <th class="py-2">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="py-2">
                                <span class="inline-block w-8 text-center mr-2">
                                    {!!$category->icon!!}
                                </span>

                                <span class="uppercase">
                                    {{$category->name}}
                                </span>
                            </td>
                            <td class="py-2">
                                <div class="flex ">
                                    <x-button class="mx-1" wire:click="edit('{{$category->slug}}')">
                                        Editar
                                    </x-button>
                                    <x-button wire:click="$emit('deleteCategory', '{{$category->slug}}')">
                                        Eliminar
                                    </x-button>
                                    
                                </div>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-jet-action-section>

    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar categoria
        </x-slot>
        <x-slot name="content">
            <div class="space-y-3">
                <div>
                    <div>
                        @if ($editImage)
                            <img class="w-full h-64 object-cover object-center" src="{{$editImage->temporaryUrl()}}" alt="">
                        @else
                            <img class="w-full h-64 object-cover object-center" src="{{Storage::url($editForm['image'])}}" alt="">
                        @endif
                    </div>
                    <x-jet-label>
                        Nombre
                    </x-jet-label>

                    <x-jet-input wire:model="editForm.name" type="text" class="w-full mt-1" />
                    <x-jet-input-error for="editForm.name" />
                </div>
                <div>
                    <x-jet-label>
                        Slug
                    </x-jet-label>

                    <x-jet-input wire:model="editForm.slug" type="text" class="w-full mt-1"  />
                    <x-jet-input-error for="editForm.slug" />
                </div>
                <div>
                    <x-jet-label>
                        Icono
                    </x-jet-label>

                    <x-jet-input wire:model.defer="editForm.icon" type="text" class="w-full mt-1"  />
                    <x-jet-input-error for="editForm.icon" />
                </div>
                <div>
                    <x-jet-label>
                        Imagen
                    </x-jet-label>

                    <input wire:model="editImage" accept="image/*" type="file" id="{{$rand}}">
                    <x-jet-input-error for="editImage" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-button wire:click="update" wire:loading.attr="disabled" wire:tarjet="editImage, update">
                Actualizar
            </x-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
