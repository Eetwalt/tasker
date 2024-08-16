<x-modal-wrapper title="Edit card">
    <form class="space-y-3" wire:submit="updateCard">
        <div>
            <x-input-label for="title" value="Title" class="sr-only" />
            <x-text-input id="title" placeholder="Card title" class="w-full" autofocus wire:model="editCardForm.title" />
            <x-input-error :messages="$errors->get('editCardForm.title')" class="mt-1" />
        </div>
        <div>
            <x-input-label for="notes" value="Notes" class="sr-only" />
            <x-textarea id="notes" placeholder="Card notes" class="w-full" wire:model="editCardForm.notes" rows="6"/>
            <x-input-error :messages="$errors->get('editCardForm.notes')" class="mt-1" />
        </div>
        <div class="flex items-center justify-end space-x-2">
            <x-secondary-button>
                Archive
            </x-secondary-button>
            <x-primary-button>
                Save
            </x-primary-button>
        </div>
    </form>
</x-modal-wrapper>
