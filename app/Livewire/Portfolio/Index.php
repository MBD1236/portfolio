<?php

namespace App\Livewire\Portfolio;

use App\Models\About;
use App\Models\Certification;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\ProjectTechnology;
use App\Models\Skill;
use Livewire\Attributes\Layout;
use Livewire\Component;


class Index extends Component
{

    public string $page = 'home';
    public bool $menuOpen = false;
    protected $listeners = ['closeMobileMenu' => 'closeMenu'];
    // Contact form properties
    public string $contact_name = '';
    public string $contact_email = '';
    public string $contact_message = '';


    public About $about;
    
    public function mount()
    {
        // Charge l’unique entrée about (ou crée une entrée vide si non trouvée)
        $this->about = About::first();
    }

    public function navigate($page)
    {
        $this->page = $page;
    }

    public function toggleMenu()
    {
        $this->menuOpen = ! $this->menuOpen;
    }

    public function closeMenu()
    {
        $this->menuOpen = false;
    }

    public function sendContact()
    {
        $this->validate([
            'contact_name' => 'required|string|max:100',
            'contact_email' => 'required|email|max:150',
            'contact_message' => 'required|string|max:2000',
        ]);

        // For now, just flash a message. In a real app you'd send an email or store in DB.
        session()->flash('contact_sent', 'Merci — votre message a bien été envoyé.');

        // Reset form fields
        $this->contact_name = '';
        $this->contact_email = '';
        $this->contact_message = '';
    }

    // Recupérer toutes les données de mes tables

    #[Layout("components.layouts.base")]
    public function render()
    {
        return view('livewire.portfolio.index', [
            'projets' => Project::with('technologies')->get(),
            'competences' => Skill::all(),
            'certifications' => Certification::all(),
            'technoProjets' => ProjectTechnology::all(),
            'about' => $this->about,
            'educations' => Education::all(),
            'experiences' => Experience::all(),
        ]);
    }
}
