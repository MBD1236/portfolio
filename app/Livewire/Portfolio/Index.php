<?php

namespace App\Livewire\Portfolio;

use Livewire\Component;
use Livewire\Attributes\Layout;


class Index extends Component
{

    public string $page = 'home';
    public bool $menuOpen = false;
    protected $listeners = ['closeMobileMenu' => 'closeMenu'];
    // Contact form properties
    public string $contact_name = '';
    public string $contact_email = '';
    public string $contact_message = '';

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

    
    #[Layout("components.layouts.base")]
    public function render()
    {
        return view('livewire.portfolio.index');
    }
}
