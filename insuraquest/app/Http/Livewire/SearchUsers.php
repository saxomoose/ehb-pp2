<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';
    public function render()
    {
        return view('livewire.search-users', [
            'users' => User::query()
            ->where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->get(),
        ]);
    }
}
