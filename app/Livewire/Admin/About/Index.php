<?php

namespace App\Livewire\Admin\About;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;


use Livewire\Component;

class Index extends Component
{

    #[Layout("components.layouts.app")]
    #[Title("A propos")]
    public function render()
    {
        return view('livewire.admin.about.index');
    }
}
