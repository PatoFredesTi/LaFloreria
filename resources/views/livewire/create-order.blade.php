<div class="container py-8 grid grid-cols-5 gap-6">
    <div class="col-span-3">
        <div>
            <div class="bg-white rounded-lg shadow p-6 mb-4">
                <div class="mb-4">
                    <x-jet-label class="text-lg" value="Nombre de contacto" />
                    <x-jet-input type="text" placeholder="Ingrese el nombre de quien recibira el producto" class="w-full"
                                wire:model.defer="contact"/>
                    <x-jet-input-error for="contact" />
                </div>
                <div>
                    <x-jet-label class="text-lg" value="Telefono de contacto" />
                    <x-jet-input type="text" placeholder="Ingrese el telefono de quien recibira el producto" class="w-full"
                                wire:model.defer="phone"/>
                    <x-jet-input-error for="phone" />
                </div>
            </div>
            <div class="bg-white rounded-lg shadow">
                <label class=" px-6 py-4 flex items-center mb-2">
                    <span class="ml-2 text-gray-700 text-xl">Envio a domicilio</span>
                </label>

                <div class="px-6 pb-6">
                    {{--Departamentos--}}
                    <div>
                        <x-jet-label class="mb-1 text-lg" value="Selecciona Sector de envio" />
                        <select class="w-full rounded-lg shadow-md mb-2">
                            <option value="" disabled selected>Selecciona el sector</option>
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach

                        <select>
                        <x-jet-input-error for="departamento" />
                        
                        <x-jet-label class="mb-1 text-lg" value="Direccion" />
                        <x-jet-input type="text" placeholder="Ingrese direccion exacta" class="w-full" wire:model.defer="address"/>
                        <x-jet-input-error for="address" />

                        <x-jet-label class="mb-1 mt-2 text-lg" value="Referencia" />
                        <x-jet-input type="text" placeholder="Ingrese alguna referencia" class="w-full"/>  
                        <x-jet-input-error for="reference" />

                        <!-- Falta agregar un calendario para la fecha -->
                    </div>
                </div>
            </div>
        </div>

        <div>
            <x-button class="mt-6 mb-4" wire:click="create_order">
                Continuar con la compra
            </x-button>

            <hr>
            <!-- ARREGLAR ANTES DE TITULO 
            <div class="flex items-center">
                <x-jet-checkbox/>
                <p class="text-sm ml-4 mt-2">Acepto las <a class="font-semibold hover:text-teal-600" href="">Politicas de privacidad</a></p>
            </div>
            -->

            <span class="text-gray-700">Puedes revisar nuestras <a class="font-bold hover:text-teal-600" href="">Politicas de Privacidad</a> antes de realizar tu compra</span>
            
        </div>
    </div>
    <div class="col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
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

            <hr class="mt-4 mb-3">

            <div class="text-gray-700 ">
                <p class="flex justify-between items-center">
                    Subtotal
                    <span class="font-semibold">$ {{Cart::subtotal()}}</span>
                </p>
                <p class="flex justify-between items-center mt-2">
                    Envio
                    <span class="font-semibold">
                        {{$shipping_cost}}
                    </span>
                </p>

                <hr class="mt-4 mb-3">
                <p class="flex justify-between items-center text-lg">
                    <span class="font-bold">Total</span>
                    <span class="font-semibold">$ {{Cart::subtotal()}}</span>
                </p>
            </div>
        </div>
    </div>
</div>
