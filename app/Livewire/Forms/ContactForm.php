<?php

namespace App\Livewire\Forms;

use App\Models\Contacts;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactForm extends Form
{
    #[Validate('required|email:dns')]
    public $email = '';

    #[Validate('required|min:5')]
    public $subject = '';

    #[Validate('required|min:5')]
    public $message = '';

    public function store()
    {
        $validated = $this->validate();
        Contacts::create($validated);
        $this->reset();
    }
}
