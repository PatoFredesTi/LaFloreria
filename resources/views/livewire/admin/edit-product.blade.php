<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">Crear un producto</h1>

    <div class="mb-4" wire:ignore>
        <form action="{{route('admin.products.files', $product)}}" 
        method="POST"
        class="dropzone rounded-lg shadow-md"
         id="my-awesome-dropzone"></form>
    </div>

    <div class="bg-white shadow-lg rounded-lg  p-6 ">
        <div class=" flex-col m-6 p-6 justify-center text-center">
            <div class="mb-4">
                <x-jet-label value="Categorias" class="text-lg"/>
                <select class=" w-96 rounded-lg shadow-lg border-teal-500 " wire:model="category_id">
                    <option value="" disabled selected>Seleccione una categoria</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="category_id"/>
            </div>
            <div class="grid grid-cols-2 gap-6 ">
                <div class="mb-4">
                    <x-jet-label value="Nombre" class="text-lg"/>
                    <x-jet-input type="text" class="w-full rounded-lg shadow-lg border-teal-500" 
                                    wire:model="product.name" 
                                    placeholder="Ingrese el nombre del producto" />
                    <x-jet-input-error for="product.name"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Slug" class="text-lg"/>
                    <x-jet-input type="text" class="w-full rounded-lg shadow-lg border-teal-500 bg-white" 
                                        wire:model="product.slug"
                                        placeholder="Ingrese el slug del producto" />
                    <x-jet-input-error for="product.slug"/>
                </div>
            </div>
            

            <div class="mb-4" >
                <div wire:ignore>
                    <x-jet-label value="Descripcion" class="text-lg"/>
                    <textarea rows="10" class="w-96 rounded-lg shadow-lg" x-data 
                            x-init="ClassicEditor.create( $refs.miEditor )
                            .then(function(editor){
                                editor.model.document.on('change:data', () => {
                                    @this.set('product.description', editor.getData())
                                })
                            })
                            .catch( error => {
                                console.error( error );
                            } );" x-ref="miEditor"
                            wire:model="product.description">
                    </textarea>
                </div>
                <x-jet-input-error for="product.description"/>
            </div>

            <div class="grid grid-cols-2 gap-6"> 
                <div class="mb-4">
                    <x-jet-label value="Precio" class="text-lg"/>
                    <x-jet-input type="number" class="w-full" wire:model="product.price"/>
                    <x-jet-input-error for="product.price"/>
                </div>
        
                <div class="mb-4">
                    <x-jet-label value="Stock" class="text-lg"/>
                    <x-jet-input type="number" class="w-full" wire:model="product.quantity"/>
                    <x-jet-input-error for="product.quantity"/>
                </div>
            </div>
            <div class="flex mt-4 justify-end items-center"> 
                <x-jet-action-message class="mr-3 font-semibold" on="saved">
                    Producto actualizado con exito
                </x-jet-action-message>

                <x-jet-button wire:click="save">
                    Actualizar Producto
                </x-jet-button>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                dictDefaultMessage: 'Arrastre una imagen al recuadro (max 2MB)',
                paramName: 'file',
                maxFilesize: 2,
                acceptedFiles: 'image/*',
                maxFiles: 4,
            };
        </script>
    @endpush
</div>
