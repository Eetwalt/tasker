<x-modal-wrapper title="Edit board">
    <form class="space-y-3" wire:submit="updateBoard">
        <div>
            <x-input-label for="title" value="Title" class="sr-only" />
            <x-text-input id="title" placeholder="Board title" class="w-full" autofocus wire:model="editBoardForm.title" />
            <x-input-error :messages="$errors->get('editBoardForm.title')" class="mt-1" />
        </div>
        <div class="flex items-center justify-end space-x-2">
            <x-secondary-button wire:click="archiveCard">
                Archive
            </x-secondary-button>
            <x-primary-button>
                Save
            </x-primary-button>
        </div>
    </form>
</x-modal-wrapper>
