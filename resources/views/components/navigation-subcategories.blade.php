@props(['category'])

<div class="grid grid-cols-4 p-4">

    <div class="col-span-3">
        <img class="h-64 w-full object-cover object-center" src="{{Storage::url($category->image)}}" >
    </div>
</div>