<div>
    <h1 class="h-24 py-6 text-4xl font-bold">Tweets</h1>

    <form method="post" wire:submit.prevent="create" class="px-8 pt-6 pb-8 mb-8 bg-white rounded shadow-md">
        <label class="block mb-4 text-sm font-bold text-gray-700" for="username">
            Tweet
        </label>
        <textarea name="content" id="content" rows="5" placeholder="O que está pensando?" wire:model="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror"></textarea>
        @error('content') <p><span class="text-red-500">{{ $message }}</span></p> @enderror
        <button type="submit" class="p-2 pl-6 pr-6 text-white bg-blue-900 rounded">Criar Tweet</button>
    </form>

    @foreach ($tweets as $tweet)
        <div class="flex p-4 m-8 bg-white rounded shadow-md">
            <div class="pl-3 text-center w-1/8">
                @if ($tweet->user->photo)
                    <img src="{{ url("storage/{$tweet->user->photo}") }}" alt="{{ $tweet->user->name }}" class="w-8 h-8 rounded-full">
                @else
                    <img src="{{ url('imgs/no-image.png') }}" alt="{{ $tweet->user->name }}" class="w-8 h-8 rounded-full">
                @endif
                {{-- $tweet->user->name --}}
            </div>
            <div class="inline-block pl-3 w-7/8 align-text-middle">
                {{ $tweet->content }}
                (
                    @if ($tweet->likes->count())
                        <a href="#" wire:click.prevent="unlike({{ $tweet->id }})" class="text-red-500">Descurtir</a>
                    @else
                        <a href="#" wire:click.prevent="like({{ $tweet->id }})" class="text-teal-500">Curtir</a>
                    @endif
                )
            </div>
        </div>
    @endforeach

    <div class="py-12">
        {{ $tweets->links() }}
    </div>
</div>
