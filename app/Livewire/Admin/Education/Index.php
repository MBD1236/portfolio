<?php

namespace App\Livewire\Admin\Education;

use App\Models\Education;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class Index extends Component
{

    public Education $education;
    public $search = '';


    public $school;
    public $degree;
    public $field;
    public $start_year;
    public $end_year;
    public $description;



    protected function rules()
    {
        return [
            'school' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field' => 'nullable|string|max:255',
            'start_year' => 'required|integer|min:1900|max:' . date('Y'),
            'end_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 10),
            'description' => 'nullable|string',
        ];
    }


    public function save()
    {
        $data = $this->validate($this->rules());
        Education::create($data);
        session()->flash('success', 'Étude ajoutée.');
        $this->resetForm();
    }

    public function edit(Education $ed)
    {
        $this->education = $ed;
        $this->school = $ed->school;
        $this->degree = $ed->degree;
        $this->field = $ed->field;
        $this->start_year = $ed->start_year;
        $this->end_year = $ed->end_year;
        $this->description = $ed->description;
    }

    public function update()
    {
        $data = $this->validate($this->rules());
        $this->education->update($data);

        session()->flash('success', 'Étude mise à jour.');
        $this->resetForm();
    }

    public function delete($id)
    {
        Education::findOrFail($id)->delete();
        session()->flash('danger', 'Étude supprimée.');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
    }

    #[Layout("components.layouts.app")]
    #[Title("Éducation")]
    public function render()
    {
        return view('livewire.admin.education.index', [
            'educations' => Education::where('school', 'like', "%{$this->search}%")
                ->orWhere('degree', 'like', "%{$this->search}%")
                ->orderBy('start_year', 'desc')
                ->get()
        ]);
    }
}
