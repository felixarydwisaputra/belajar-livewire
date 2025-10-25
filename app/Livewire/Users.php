<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Users extends Component
{
    #[Title('User Page')]
    public function render()
    {
        return view('livewire.users');
    }
}
