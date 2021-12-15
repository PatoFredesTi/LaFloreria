<x-app-layout>
    <div class="container py-8">
        @foreach ($categories as $category)
            <section class="mb-6">
                
                <a href="{{route('categories.show', $category)}}" class="text-lg uppercase font-semibold text-gray-700 hover:underline">
                    {{$category->name}}
                </a>

                @livewire('category-products', ['category' => $category])
            </section>
        @endforeach
    </div>

    @push('script')    
        <script>
            Livewire.on('glider', function(id){
                new Glider(document.querySelector('.glider-'+ id), {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [
                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 5,
                                slidesToScroll: 5,
                                draggable: true,
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 4,
                                draggable: true,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                                draggable: true,
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                                draggable: true,
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                draggable: true,
                            }
                        }
                    ]
                });
            });
        </script>
    @endpush
</x-app-layout>