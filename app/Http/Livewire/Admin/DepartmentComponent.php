<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;

class DepartmentComponent extends Component
{
    public $departments, $department;

    protected $listeners = ['delete'];

    public $createForm = [
        'name' => null,
        'cost' => 0,
    ];

    public $editForm = [
        'open' => false,
        'name' => '',
        'cost' => 0,
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.cost' => 'costo', 
    ];

    public function mount(){
        $this->getDepartments();
    }

    public function getDepartments(){
        $this->departments = Department::all();
    }

    public function save(){
        $this->validate([
            'createForm.name' => 'required|min:3|unique:departments,name',
            'createForm.cost' => 'required|numeric|min:0',
        ]);

        Department::create($this->createForm);

        $this->reset('createForm');

        $this->getDepartments();

        $this->emit('saved');
    }

    public function edit(Department $department){
        $this->department = $department;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $department->name;
        $this->editForm['cost'] = $department->cost;
    }

    public function update(){
        $this->department->name = $this->editForm['name'];
        $this->department->cost = $this->editForm['cost'];
        $this->department->save();
        $this->reset('editForm');
        $this->getDepartments();
    }

    public function delete(Department $department){
        $department->delete();
        $this->getDepartments();

    }

    public function render()
    {
        return view('livewire.admin.department-component')->layout('layouts.admin');
    }
}
