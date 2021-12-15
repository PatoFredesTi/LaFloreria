<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div class="flexslider">
                <ul class="slides">
                    @foreach ($product->images as $image)
                        <li data-thumb="{{Storage::url($image->url)}}">
                            <img src="{{Storage::url($image->url)}}" />
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h1 class="text-xl font-bold text-trueGray-700">{{$product->name}}</h1>
                <p class="text-2xl font-semibold text-trueGray-700 my-6">$ {{$product->price}}</p>

                <div class="bg-white rounded-lg shadow-lg mb-6 mt-4">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-orange-500">
                            <i class="fas fa-truck text-white"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-teal-700">Repartos a Toda la Quinta Region</p>
                            <p>Entrega en menos de 24 horas</p>
                        </div>
                    </div>
                </div>

                @livewire('add-cart-item', ['product' => $product])
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function(){
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>