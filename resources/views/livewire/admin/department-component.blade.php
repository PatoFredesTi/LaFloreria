<div class="container py-12">
    <!--Agregar departamento-->
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Agregar un nuevo sector para despacho
        </x-slot>
        <x-slot name="description">
            Complete la informacion del sector
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre del sector
                </x-jet-label>
                <x-jet-input wire:model="createForm.name" type="text" class="w-full mt-1" />
                <x-jet-input-error for="createForm.name" />
                
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                Sector creado
            </x-jet-action-message>

            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <!--Lista de departamentos-->
    <x-jet-action-section>
        <x-slot name="title">
            Lista de Sectores
        </x-slot>

        <x-slot name="description">
            Aqui encontraras todos los sectores creados
        </x-slot>

        <x-slot name="content">
            <table class="text-gray-600 ">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">Nombre</th>
                        <th class="py-2 ">Costo</th>
                        <th class="py-2 ">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td class="py-2 ">
                                <span class="uppercase">
                                    {{$department->name}}
                                </span>

                            </td>
                            <td class="py-2">
                                <span class="mr-4">
                                   ${{$department->cost}}
                                </span>
                            </td>
                            <td class="py-2">
                                <div class="flex ">
                                    <x-button class="mx-1" wire:click="edit({{$department}})">
                                        Editar costo de envio
                                    </x-button>
                                    <x-jet-danger-button class="mx-1" wire:click="$emit('deleteDepartment',{{$department}})">
                                        Eliminar
                                    </x-jet-danger-button>

                                    
                                </div>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-jet-action-section>

    <!--Modal editar-->
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar sector
        </x-slot>
        <x-slot name="content">
            <div class="space-y-3">
                <div>
                    <x-jet-label>
                        Nombre
                    </x-jet-label>
                    <x-jet-input wire:model="editForm.name" type="text" class="w-full mt-1" />
                    <x-jet-input-error for="editForm.name" />
                </div>
                <div>
                    <x-jet-label>
                        Costo
                    </x-jet-label>
                    <x-jet-input wire:model="editForm.cost" type="number" class="w-full mt-1"  />
                    <x-jet-input-error for="editForm.cost" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-button wire:click="update" wire:loading.attr="disabled" wire:tarjet="editImage, update">
                Actualizar
            </x-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('script')
    <script>
        Livewire.on('deleteDepartment', departmentName => {
            
            Swal.fire({
                title: 'Deseas eliminar este Sector?',
                text: "Esta accion no se puede deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed){

                    Livewire.emitTo('admin.department-component','delete', departmentName);

                    Swal.fire(
                        'Eliminado!',
                        'El producto ha sido eliminado.',
                        'success'
                    )
                }
            })
        })
    </script>
    @endpush
    
</div>
