<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    Use WithPagination;

    public $content = 'Mensagens de dados';

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->latest()->paginate(5);

        return view('livewire.show-tweets', compact('tweets'));
    }



    public function store()
    {
        $this->validate();
        // Tweet::create(
        //     [
        //         'content' => $this->content,
        //         'user_id' => auth()->user()->id,
        //     ]
        // );

        auth()->user()->tweets()->create([
            'content' => $this->content,
        ]);

        $this->content = '';
    }


    public function like($idTweet)
    {
        $tweet = Tweet::find($idTweet);

        $tweet->likes()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function unlike(Tweet $tweet)
    {
        $tweet->likes()->delete();
    }
}
