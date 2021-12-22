<div class="container py-8">
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">{{$category->name}}</h1>

            <div class="grid grid-cols-2 border border-teal-300 divide-x divide-teal-300">
                <i class="fas fa-border-all p-3 cursor-pointer {{$view == 'grid' ? 'text-teal-400' : ''}}" wire:click="$set('view','grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{$view == 'list' ? 'text-teal-400' : ''}}" wire:click="$set('view','list')"></i>
            </div>
        </div>

    </div>

   

        <div class=" md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow">
                        <article>
                            <figure>
                                <a href="{{route('products.show', $product)}}">
                                    <img class="h-48 w-full object-center object-scale-down" src="{{Storage::url($product->images->first()->url)}}" alt="">
                                </a>
                                </figure>

                            <div class="py-4 px-6">
                                <h1 class="text-lg font-semibold">
                                    <a href="{{route('products.show', $product)}}">
                                        {{Str::limit($product->name, 20)}}
                                    </a>
                                </h1>
                                <p class="font-bold text-truegray-700">
                                    $ {{$product->price}}
                                </p>
                            </div>
                        </article>
                    </li>
                    @endforeach
                </ul>
            @else
                <ul>
                    @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow">
                        <article class="flex mb-4">
                            <figure>
                                <a href="{{route('products.show', $product)}}">
                                    <img class="h-48 w-56 object-cover object-center" src="{{Storage::url($product->images->first()->url)}}" alt="">
                                </a>
                            </figure>

                            <div class="py-4 px-6 mb-4 flex-1">
                                <div>
                                    <div class="flex justify-between">
                                        <h1 class="text-lg font-semibold">
                                            <a href="{{route('products.show', $product)}}">
                                                {{Str::limit($product->name, 20)}}
                                            </a>
                                        </h1>
                                        <p class="font-bold text-gray-700">
                                            $ {{$product->price}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </li>
                    @endforeach
                </ul>
            @endif
                

            <div class="mt-4">
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>
