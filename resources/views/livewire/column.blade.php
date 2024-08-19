<div class="w-[260px] bg-base-500 border-primary/50 border self-start max-h-full rounded-lg shadow-sm shrink-0 text-white flex flex-col">
    <div class="flex items-center justify-between">
        <div x-data="{ editing: false }" x-on:click.outside="editing = false" x-on:column-updated.window="editing = false"
            class="flex items-center w-full h-8 min-w-0 pl-4 pr-0">
            <button x-on:click="editing = true" x-show="!editing"
                class="w-full font-medium text-left">{{ $column->title }}</button>
            <template x-if="editing">
                <form wire:submit="updateColumn" class="-ml-[calc(theme('margin[1.5]')+1px)] grow">
                    <x-text-input type="text" class="h-8 px-1.5 w-full" wire:model="$column->title"
                        wire:model="editColumnForm.title" x-init="$el.focus()" />
                </form>
            </template>
        </div>
        <div class="px-3.5 py-3">
            <x-dropdown>
                <x-slot name="trigger">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>

                </x-slot>
                <x-slot name="content">
                    <div class="px-1 space-y-1">
                        <x-dropdown-button wire:click="archiveColumn">Archive</x-dropdown-button>
                    </div>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
    <div class="p-3 space-y-1.5 pt-0 overflow-y-scroll" wire:sortable-group.item-group="{{ $column->id }}" wire:sortable-group.options="{ ghostClass: 'opacity-20'}">
        @foreach ($cards as $card)
            <div wire:key="{{ $card->id }}" wire:sortable-group.item="{{ $card->id }}">
                <livewire:card :key='$card->id' :card='$card' />
            </div>
        @endforeach
    </div>
    <div class="p-3" x-data="{ adding: false }" x-on:card-created.window="adding = false">
        <template x-if="adding">
            <form wire:submit="createCard">
                <div>
                    <x-input-label for="title" value="Title" class="sr-only" />
                    <x-text-input id="title" placeholder="Card title" class="w-full"
                        wire:model="createCardForm.title" x-init="$el.focus()" />
                    <x-input-error :messages="$errors->get('createCardForm.title')" class="mt-1" />
                </div>

                <div class="flex items-center mt-2 space-x-4">
                    <x-primary-button>
                        Create
                    </x-primary-button>
                    <button x-on:click="adding = false" type="button" class="text-sm text-secondary">Cancel</button>
                </div>
            </form>
        </template>
        <button x-show="!adding" x-on:click="adding = true" class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span>
                Add a card
            </span>
        </button>
    </div>
</div>
