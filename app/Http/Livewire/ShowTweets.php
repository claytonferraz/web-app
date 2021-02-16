<?php

namespace App\Http\Livewire;
use App\Models\Tweet;

use Livewire\Component;

class ShowTweets extends Component
{
    public $message = 'Mensagens de dados';
    
    public function render()
    {
        $tweets = Tweet::get();
        
        return view('livewire.show-tweets', compact('tweets'));
    }
}
