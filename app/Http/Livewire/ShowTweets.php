<?php

namespace App\Http\Livewire;

use App\Models\Tweet;

use Livewire\Component;

class ShowTweets extends Component
{
    public $content = 'Mensagens de dados';

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->get();

        return view('livewire.show-tweets', compact('tweets'));
    }

    public function create()
    {
        $this->validate();
        Tweet::create(
            [
                'content' => $this->content,
                'user_id' => 1
            ]
        );

        $this->content = '';
    }
}
