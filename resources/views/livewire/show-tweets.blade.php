
<div class="px-4 py-5 bg-white shadow sm:p-6 sm:rounded-tl-md sm:rounded-tr-md">
    <p>

    </p>
    Show Tweets
    <p> {{ $content }}</p>

    <form action="" method="post" wire:submit.prevent="store" >

        <input type="text" name="content" id="content" wire:model="content">


        <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25" type="submit"> Criar Tweet </button>
        <span class="danger">
        @error('content')
            {{$message}}
        @enderror
        </span>
        </form>



    <hr>
    @foreach ($tweets as $tweet)
        </p>
        {{ $tweet->user->name }} - {{ $tweet->content }}
            @if($tweet->likes()->count())

             <a href="#" wire:click.prevent="unlike({{$tweet->id}})" > Descurtir</a>
            @else
                <a href="#" wire:click.prevent="like({{$tweet->id}})"> Curtir</a>
            @endif
        <p>
    @endforeach
   <hr>
   <div>
       {{ $tweets->links() }}
   </div>


</div>
