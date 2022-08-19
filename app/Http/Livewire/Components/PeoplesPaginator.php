<?php

namespace App\Http\Livewire\Components;

use App\Models\Peoples;
use Livewire\Component;
use Livewire\WithPagination;

class PeoplesPaginator extends Component
{
    use WithPagination;

    protected $listeners = ['updatePeoples'];

    public function updatePeoples() {}

    public function render()
    {
        $people = Peoples::orderBy('created_at', 'DESC');

        if (request()->has('busca')) {
            $people->where('name', 'LIKE', "%".request()->query('busca')."%");
        }

        return view('livewire.components.peoples-paginator', [
            'peoples' => $people->paginate(10)
        ]);
    }
}
