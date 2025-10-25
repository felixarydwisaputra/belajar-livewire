<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $query = '';

    #[On('created-user')]
    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function placeholder()
    {
        return view('livewire.placeholder.skeleton');
    }

    #[Computed()]
    public function users()
    {
        return User::where('name', 'like', "%{$this->query}%")->latest()->paginate(6);
    }

    public function render()
    {

        return view('livewire.user-list', [
            'title' => 'Users Page Class',
        ]);
    }
}
