<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Category;
use App\Models\Skill;
use Illuminate\Queue\Middleware\Skip;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    public Skill $competence;
    public $search = '';


    public $name;
    public $level;
    public $category_id;



    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'level' => 'required|integer|min:1|max:100',
            'category_id' => 'required',
        ];
    }


    public function save()
    {
        $data = $this->validate($this->rules());
        Skill::create($data);
        session()->flash('success', 'Compétence ajoutée.');
        $this->resetForm();
    }

    public function edit(Skill $skill)
    {
        $this->competence = $skill;
        $this->name = $skill->name;
        $this->level = $skill->level;
        $this->category_id = $skill->category_id;
    }

    public function update()
    {
        $data = $this->validate($this->rules());

        $this->competence->update($data);

        session()->flash('success', 'Compétence mise à jour.');
        $this->resetForm();
    }

    public function delete($id)
    {
        Skill::findOrFail($id)->delete();
        session()->flash('danger', 'Compétence supprimée.');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
    }

    #[Layout("components.layouts.app")]
    #[Title("Compétence")]
    public function render()
    {
        return view('livewire.admin.skills.index', [
            'competences' => Skill::where('name', 'like', "%{$this->search}%")
                ->orderBy('created_at', 'desc')
                ->get(),
            'categories' => Category::all()
        ]);
    }
}
