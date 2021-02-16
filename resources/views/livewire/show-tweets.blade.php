<div>
    Show Tweets
    <p> {{ $message }}</p>

    <form action="" method="post" wire:submit.prevent="create" >

        <input type="text" name="message" id="message" wire:model="message">

        <button type="submit"> Criar Tweet </button>


        </form>

    <hr>
    @foreach ($tweets as $tweet)
        </p>
        {{ $tweet->user->name }} - {{ $tweet->content }}
        <p>
    @endforeach



</div>
