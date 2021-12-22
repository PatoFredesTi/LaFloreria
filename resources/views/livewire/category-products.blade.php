<div wire:init="loadPosts">
    @if (count($products))
            
        <div class="glider-contain">
            <ul class="glider-{{$category->id}}">
                @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow {{$loop->last ? '' : 'mr-3'}}">
                        <article>
                            <figure class="hover:h-52">
                                <a class="text-sm font-semibold hover:underline hover:text-teal-300" href="">Cod: {{$product->id}}</a>
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
                                <p class="font-bold text-teal-500 text-lg text-center">
                                    $ {{$product->price}}
                                </p>

                                
                            </div>
                        </article>
                    </li>
                @endforeach
            </ul>
        
            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>
        
    @else
        <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-teal-300 rounded-lg">
            <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-teal-800"></div>
    </div>	
    @endif

</div>

