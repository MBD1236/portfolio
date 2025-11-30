<?php

namespace App\Livewire\Admin\Experience;

use App\Models\Experience;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    public Experience $experience;
    public $search = '';

    public $title;
    public $company;
    public $location;
    public $experience_type;
    public $description;
    public $start_date;
    public $end_date;
    public $is_current = false;



    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'experience_type' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'is_current' => 'boolean',
            'description' => 'required|string',
        ];
    }


    public function save()
    {
        $data = $this->validate($this->rules());
        Experience::create($data);
        session()->flash('success', 'Expérience ajoutée.');
        $this->resetForm();
    }

    public function edit(Experience $ex)
    {
        $this->experience = $ex;
        $this->title = $ex->title;
        $this->company = $ex->company;
        $this->location = $ex->location;
        $this->experience_type = $ex->experience_type;
        $this->start_date = $ex->start_date;
        $this->end_date = $ex->end_date;
        $this->description = $ex->description;
        $this->is_current = $ex->is_current ? true : false;
    }

    public function update()
    {
        $data = $this->validate($this->rules());
        $this->experience->update($data);

        session()->flash('success', 'Expérience mise à jour.');
        $this->resetForm();
    }

    public function delete($id)
    {
        Experience::findOrFail($id)->delete();
        session()->flash('danger', 'Expérience supprimée.');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
    }

    #[Layout("components.layouts.app")]
    #[Title("Expérience")]
    public function render()
    {
        return view('livewire.admin.experience.index', [
            'experiences' => Experience::where('title', 'like', "%{$this->search}%")
                ->orWhere('company', 'like', "%{$this->search}%")
                ->orWhere('location', 'like', "%{$this->search}%")
                ->orWhere('experience_type', 'like', "%{$this->search}%")
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }
}
