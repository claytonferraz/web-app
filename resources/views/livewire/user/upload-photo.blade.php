<div>
    <h1 class="py-6 text-4xl font-bold">Atualizar Foto do Perfil</h1>
    <form wire:submit.prevent="storagePhoto" class="px-8 pt-6 pb-8 m-8 mb-8 bg-white rounded shadow-md">
        @if ($photo)
            <div class="mb-4">
                <img src="{{ $photo->temporaryUrl() }}" style="max-width: 200px;">
            </div>
        @endif
        <div class="mb-4">
            <input type="file" wire:model="photo">
        </div>

        @error('photo') <p><span class="text-red-500">{{ $message }}</span></p> @enderror

        <button type="submit" class="p-2 pl-6 pr-6 text-white bg-blue-900 rounded">Upload Foto</button>
    </form>
</div>
