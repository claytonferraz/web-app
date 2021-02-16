<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowTweets extends Component
{
    public $message = 'Mensagens de dados';
    public function render()
    {
        return view('livewire.show-tweets');
    }
}
