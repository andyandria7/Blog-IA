<?php

namespace App\Livewire;

use Livewire\Component;

class Header extends Component
{
    public $mode = 'dark'; // Définit le mode par défaut à 'dark'
    public $menuOpen = false;

    public function mount()
    {
        if (request()->routeIs('index')) {
            $this->mode = 'dark'; // Assurez-vous que le mode est 'dark' sur la page d'accueil
        }
    }

    public function toggleMenu()
    {
        $this->menuOpen = !$this->menuOpen;
    }

    public function toggleTheme($theme)
    {
        $this->mode = $theme;
    }

    public function render()
    {
        return view('livewire.header');
    }
}
