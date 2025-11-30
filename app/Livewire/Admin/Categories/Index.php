<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Symfony\Component\String\Slugger\AsciiSlugger;

class Index extends Component
{
    public Category $categorie;
    public $search = '';


    public $name;
    public $description;



    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
    }


    public function save()
    {
        $slug = new AsciiSlugger();

        $data = $this->validate($this->rules());
        $data['slug'] = strtolower($slug->slug($data['name'], '-'));


        Category::create($data);
        session()->flash('success', 'Catégorie ajoutée.');
        $this->resetForm();
    }

    public function edit(Category $category)
    {
        $this->categorie = $category;
        $this->name = $category->name;
        $this->description = $category->description;
    }

    public function update()
    {
        $slug = new AsciiSlugger();

        $data = $this->validate($this->rules());
        $data['slug'] = strtolower($slug->slug($data['name'], '-'));

        $this->categorie->update($data);

        session()->flash('success', 'Étude mise à jour.');
        $this->resetForm();
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        session()->flash('danger', 'Catégorie supprimée.');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
    }

    #[Layout("components.layouts.app")]
    #[Title("Catégorie")]
    public function render()
    {
        return view('livewire.admin.categories.index', [
            'categories' => Category::where('name', 'like', "%{$this->search}%")
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }
}
