<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use App\Models\ProjectTechnology;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;


use Livewire\Component;
use Livewire\WithFileUploads;
use Symfony\Component\String\Slugger\AsciiSlugger;


class Index extends Component
{
    use WithFileUploads;

    public Project $project;
    public $search = '';

    public $title;
    public $slug;
    public $description;
    public $thimbnail;
    public $demo_url;
    public $github_url;
    public $status;

    public $project_id;
    public $technology_id;

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2055',
            'thimbnail' => !is_string($this->thimbnail) ? 'required|image|max:10240' : '',
            'github_url' => 'required|string|max:255',
            'demo_url' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ];
    }
    public function TechnoRules()
    {
        return [
            'project_id' => 'required',
            'technology_id' => 'required',
        ];
    }


    public function save()
    {
        $slug = new AsciiSlugger();

        $data = $this->validate($this->rules());
        $data['slug'] = strtolower($slug->slug($data['title'], '-'));
        $data['thimbnail'] = $this->thimbnail->storeAs('mesDocs/project', $this->thimbnail->getClientOriginalName(), 'public');
        Project::create($data);
        session()->flash('success', 'Projet ajouté.');
        $this->resetForm();
    }

    
    public function bindProject(Project $p)
    {
        $this->project_id = $p->id;
    }
    public function addTechno()
    {
        $data = $this->validate($this->TechnoRules());
        ProjectTechnology::create($data);
        session()->flash('success', 'Projet associé à cette techno.');
        $this->resetForm();
    }

    public function edit(Project $pr)
    {
        $this->project = $pr;
        $this->title = $pr->title;
        $this->description = $pr->description;
        $this->thimbnail = $pr->thimbnail;
        $this->github_url = $pr->github_url;
        $this->demo_url = $pr->demo_url;
        $this->status = $pr->status;
    }

    public function update()
    {
        $slug = new AsciiSlugger();
        $data = $this->validate($this->rules());

        $data['slug'] = strtolower($slug->slug($data['title'], '-'));
        if (!is_string($this->thimbnail) && $this->thimbnail !== null){
            if ($this->project->thimbnail )
                Storage::disk('public')->delete($this->project->thimbnail);
            $data['thimbnail'] = $this->thimbnail->storeAs('mesDocs/project', $this->thimbnail->getClientOriginalName(), 'public');
        }
        $this->project->update($data);

        session()->flash('success', 'Projet mis à jour.');
        $this->resetForm();
    }

    public function delete($id)
    {
        Project::findOrFail($id)->delete();
        session()->flash('danger', 'Projet supprimé.');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
    }


    #[Layout("components.layouts.app")]
    #[Title("Projets")]
    public function render()
    {
        return view('livewire.admin.projects.index', [
            'projets' => Project::where('title', 'like', "%{$this->search}%")
                ->orWhere('description', 'like', "%{$this->search}%")
                ->orWhere('status', 'like', "%{$this->search}%")
                ->orderBy('created_at', 'desc')
                ->get(),
            'technologies' => Technology::all()
        ]);
    }
}
