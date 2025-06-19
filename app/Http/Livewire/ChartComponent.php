<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChartComponent extends Component
{
    public $data = [10,12,30,40,50];

    public function render()
    { 
       // dd($this->data);
        return view('livewire.chart-component')->layout('layouts.main');
    }
}
