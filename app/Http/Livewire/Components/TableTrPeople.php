<?php

namespace App\Http\Livewire\Components;

use App\Models\Peoples;
use Livewire\Component;

class TableTrPeople extends Component
{
    public Peoples $people;
    public bool $modal = false;

    public function delete() {
        $this->people->delete();

        $this->emit('updatePeoples');
    }

    public function render()
    {
        return view('livewire.components.table-tr-people');
    }
}
