<?php

namespace App\Livewire;
use App\Models\Booth;
use Livewire\Attributes\On;

use Livewire\Component;

class AreaSelection extends Component
{
    public function mount()
    {
    }

    #[On('item-dropped')]
    public function itemDropped($x, $y, $id)
    {
        $booth = Booth::find($id);
        $booth->posX = $x;
        $booth->posY = $y;
        $booth->save();
    }


    public function render()
    {
        return view('livewire.area-selection');
    }
}
