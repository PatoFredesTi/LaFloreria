<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends Component
{
    use WithPagination;

    public $category, $subcategoria, $tipo;

    public $view = "grid";

    public function limpiar(){
        $this->reset(['subcategoria', 'tipo']);
    }

    public function render()
    {
        $products = $this->category->products()->where('status', 2)->paginate(20);

       /* $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query){
            $query->where('id', $this->category);
        });*/

        //$products = $productsQuery->paginate(20);

        return view('livewire.category-filter', compact('products'));
    }
}
