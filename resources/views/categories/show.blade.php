<x-app-layout>
    <div class="container py-8 ">
        <figure class="mb-4">
            <img class="w-full h-85 object-cover object-center" src="{{Storage::url($category->image)}}" alt="">
        </figure>
    </div>
    @livewire('category-filter', ['category' => $category])


</x-app-layout>