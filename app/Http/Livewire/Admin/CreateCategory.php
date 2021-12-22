<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateCategory extends Component
{
    use WithFileUploads;

    public $rand, $categories, $category;

    public $listeners = ['delete'];

    public $createForm = [
        'name' => null,
        'slug' => null,
        'icon' => null,
        'image' => null,
    ];

    public $editForm = [
        'open' => false,
        'name' => null,
        'slug' => null,
        'icon' => null,
        'image' => null,
    ];

    public $editImage;

    protected $rules = [
        'createForm.name' => 'required|min:3|unique:categories,name',
        'createForm.slug' => 'required|min:3|unique:categories,slug',
        'createForm.icon' => 'required',
        'createForm.image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3096',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.slug' => 'slug',
        'createForm.icon' => 'icono',
        'createForm.image' => 'imagen',
        'editForm.name' => 'nombre',
        'editForm.slug' => 'slug',
        'editForm.icon' => 'icono',
        'editImage' => 'imagen',
        
    ];
    public function updateCreateFormName($value){
        $this->createForm['slug'] = Str::slug($value);
    }

    public function mount(){
        $this->rand = rand();
        $this->categories = Category::all();
    }

    public function getCategories(){
        $this->categories = Category::all();
    }

    public function save(){
        $this->validate();
        $image = $this->createForm['image']->store('categories', 'public');

        $category = Category::create([
            'name' => $this->createForm['name'],
            'slug' => $this->createForm['slug'],
            'icon' => $this->createForm['icon'],
            'image' => $image,
        ]);
        $this->rand = rand();
        $this->reset('createForm');
        $this->getCategories();
        $this->emit('saved');
    }

    public function edit(Category $category){
        $this->reset(['editImage']);
        $this->resetValidation();
        $this->category = $category;

        $this->editForm['open'] = true;
        $this->editForm['name'] = $category->name;
        $this->editForm['slug'] = $category->slug;
        $this->editForm['icon'] = $category->icon;
        $this->editForm['image'] = $category->image;
    }

    public function resetPage(){
        $this->reset('editForm');
        $this->reset('editImage');
        $this->reset('createForm');
        $this->resetValidation();
        
    }

    public function update(){
        $rules = [
            'editForm.name' => 'required|min:3|unique:categories,name,'.$this->category->id,
            'editForm.slug' => 'required|min:3|unique:categories,slug,'.$this->category->id,
            'editForm.icon' => 'required',
        ];

        if ($this->editImage){
            $rules['editImage'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3096';
        }

        $this->validate($rules);
        if ($this->editImage){
            Storage::delete([$this->editForm['image']]);
            $this->editForm['image'] = $this->editImage->store('categories','public');
        }

        $this->category->update($this->editForm);
        $this->reset('editForm','editImage');
        $this->getCategories();

    }

    public function delete(Category $category){
        if(count($category->products) > 0){
            $this->emit('error', 'No se puede eliminar la categoría porque tiene productos asociados');
            return ;
        }
        else{
            $category->delete();
            $this->getCategories();
        }
    }

    public function render()
    {
        return view('livewire.admin.create-category');
    }
}
