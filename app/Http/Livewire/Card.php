<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Card extends Component
{
    public $type;
    public $header;
    public $className;
    public $values;
    public $topic;
    protected $listeners = ['change' => 'change'];

    // public function mount()
    // {
    //     if ($this->topic == '/sub/energy') {
    //         $energy = Energy::latest()->first();
    //         $this->values = $energy->message;
    //     } else if ($this->topic == '/sub/humidity') {
    //         $humidity = Humidity::latest()->first();
    //         $this->values = $humidity->message;
    //     } else {
    //         $this->values = null;
    //     }
    // }

    public function render()
    {
        return view('livewire.card');
    }

    // public function change()
    // {
    //     $this->values++;
    //     $energy = Energy::latest()->first();
    //     $this->values = $energy->message;
    // }
}
