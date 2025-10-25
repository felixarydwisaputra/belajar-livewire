<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home Page')]
class Home extends Component
{
    public function render()
    {
        return <<<'HTML'
        <div class="text-center mt-52">
            <p class="text-4xl font-bold">Home Page</p>
        </div>
        HTML;
    }
}
