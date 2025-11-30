<?php

namespace App\Livewire\Admin\Technologies;

use App\Models\Technology;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    public Technology $technology;
    public $search = '';


    public $name;
    public $ico;


    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'ico' => 'nullable|string',
        ];
    }


    public function save()
    {

        $data = $this->validate($this->rules());

        Technology::create($data);
        session()->flash('success', 'Technologie ajoutée.');
        $this->resetForm();
    }

    public function edit(Technology $technologie)
    {
        $this->technology = $technologie;
        $this->name = $technologie->name;
        $this->ico = $technologie->ico;
    }

    public function update()
    {

        $data = $this->validate($this->rules());
        $this->technology->update($data);

        session()->flash('success', 'Technologie mise à jour.');
        $this->resetForm();
    }

    public function delete($id)
    {
        Technology::findOrFail($id)->delete();
        session()->flash('danger', 'Technologie supprimée.');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
    }

    #[Layout("components.layouts.app")]
    #[Title("Technologie")]
    public function render()
    {
        return view('livewire.admin.technologies.index', [
            'technologies' => Technology::where('name', 'like', "%{$this->search}%")
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }
}
