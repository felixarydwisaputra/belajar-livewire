<?php

namespace App\Livewire;

// use App\Livewire\Forms\ContactForm;
use App\Livewire\Forms\ContactForm;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Contact Page')]
class Contact extends Component
{
    public ContactForm $form;

    public $showSuccess = false;

    public $successMessage = '';

    public function createNewMessage()
    {
        $this->form->store();
        $this->resetValidation();

        $this->showSuccess = true;
        $this->successMessage = 'Message has been send.';

        // Dispatch browser event to hide message after 3 seconds
        $this->dispatch('hideMessage');
    }

    public function hideMessage()
    {
        $this->showSuccess = false;
    }
}
