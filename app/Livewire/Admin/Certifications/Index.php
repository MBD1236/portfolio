<?php

namespace App\Livewire\Admin\Certifications;

use App\Models\Certification;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public Certification $certification;
    public $search = '';

    public $title;
    public $institution;
    public $date_obtained;
    public $credential_url;
    public $file_path;

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'institution' => 'required|string|max:2055',
            'file_path' => !is_string($this->file_path) ? 'file|max:10240' : '',
            'date_obtained' => 'required|date',
            'credential_url' => 'string|max:255',
        ];
    }


    public function save()
    {
        $data = $this->validate($this->rules());
        $data['file_path'] = $this->file_path->storeAs('mesDocs/certifications', $this->file_path->getClientOriginalName(), 'public');
        Certification::create($data);
        session()->flash('success', 'Certification ajoutée.');
        $this->resetForm();
    }

    public function edit(Certification $cr)
    {
        $this->certification = $cr;
        $this->title = $cr->title;
        $this->institution = $cr->institution;
        $this->date_obtained = $cr->date_obtained;
        $this->credential_url = $cr->credential_url;
        $this->file_path = $cr->file_path;
    }

    public function update()
    {
        $data = $this->validate($this->rules());

        if (!is_string($this->file_path) && $this->file_path !== null){
            if ($this->certification->file_path )
                Storage::disk('public')->delete($this->certification->file_path);
            $data['file_path'] = $this->file_path->storeAs('mesDocs/project', $this->file_path->getClientOriginalName(), 'public');
        }
        $this->certification->update($data);

        session()->flash('success', 'Certification mise à jour.');
        $this->resetForm();
    }

    public function delete($id)
    {
        Certification::findOrFail($id)->delete();
        session()->flash('danger', 'Certification supprimée.');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
    }


    #[Layout("components.layouts.app")]
    #[Title("Certifications")]
    public function render()
    {
        return view('livewire.admin.certifications.index', [
            'certifications' => Certification::where('title', 'like', "%{$this->search}%")
                ->orWhere('institution', 'like', "%{$this->search}%")
                ->orWhere('date_obtained', 'like', "%{$this->search}%")
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }
}
