<?php

namespace App\Livewire\Admin\About;

use App\Models\About;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;


use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public About $about;
    public $search = '';

    public $name;
    public $title;
    public $bio;
    public $profile_image;
    public $cv_file;
    public $email;
    public $phone;
    public $location;
    public $github_url;
    public $linkedin_url;
    public $facebook_url;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string|max:2055',
            'profile_image' => !is_string($this->profile_image) ? 'required|image|max:10240' : '',
            'cv_file' => !is_string($this->cv_file) ? 'required|file|max:12288 ' : '',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'github_url' => 'required|string|max:255',
            'linkedin_url' => 'required|string|max:255',
            'facebook_url' => 'required|string|max:255',
        ];
    }


    public function save()
    {
        $data = $this->validate($this->rules());
        $data['profile_image'] = $this->profile_image->storeAs('mesDocs/photo', $this->profile_image->getClientOriginalName(), 'public');
        $data['cv_file'] = $this->cv_file->storeAs('mesDocs/cvs', $this->cv_file->getClientOriginalName(), 'public');
        About::create($data);
        session()->flash('success', 'Info ajoutée.');
        $this->resetForm();
    }

    public function edit(About $ab)
    {
        $this->about = $ab;
        $this->name = $ab->name;
        $this->title = $ab->title;
        $this->bio = $ab->bio;
        $this->profile_image = $ab->profile_image;
        $this->cv_file = $ab->cv_file;
        $this->email = $ab->email;
        $this->phone = $ab->phone;
        $this->location = $ab->location;
        $this->github_url = $ab->github_url;
        $this->linkedin_url = $ab->linkedin_url;
        $this->facebook_url = $ab->facebook_url;
    }

    public function update()
    {
        $data = $this->validate($this->rules());
        
        if (!is_string($this->profile_image) && $this->profile_image !== null){
            if ($this->about->profile_image )
                Storage::disk('public')->delete($this->about->profile_image);
            $data['profile_image'] = $this->profile_image->storeAs('mesDocs/photo', $this->profile_image->getClientOriginalName(), 'public');
        }
        if (!is_string($this->cv_file) && $this->cv_file){
            if ($this->about->cv_file)
                Storage::disk('public')->delete($this->about->cv_file);
            $data['cv_file'] = $this->cv_file->storeAs('mesDocs/cvs', $this->cv_file->getClientOriginalName(), 'public');
        }
        $this->about->update($data);

        session()->flash('success', 'Info mise à jour.');
        $this->resetForm();
    }

    public function delete($id)
    {
        About::findOrFail($id)->delete();
        session()->flash('danger', 'Info supprimée.');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
    }

    #[Layout("components.layouts.app")]
    #[Title("A propos")]
    public function render()
    {
        return view('livewire.admin.about.index', [
            'abouts' => About::where('name', 'like', "%{$this->search}%")
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }
}
