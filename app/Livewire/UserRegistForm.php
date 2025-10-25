<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserRegistForm extends Component
{
    use WithFileUploads;

    #[Validate('required|min:5')]
    public $name;

    #[Validate('required|min:5|email:dns|unique:users')]
    public $email;

    #[Validate('required|min:5')]
    public $password;

    #[Validate('max:5000')]
    public $avatar = null;

    #[Title('Home Page')]
    public function createNewUser()
    {
        $validated = $this->validate();

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatar', config('filesystems.default_public_disk'));
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $validated['avatar'],
        ]);
        $this->reset();

        session()->flash('success', 'User has been created.');
        $this->dispatch('created-user');
    }

    public function render()
    {
        return view('livewire.user-regist-form');

    }
}
