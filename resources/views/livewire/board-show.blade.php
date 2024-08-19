<div>
    <x-slot name="header">
        <div class="flex items-center justify-between text-gray-800 dark:text-gray-200">
            <h2 class="text-xl font-semibold leading-tight ">
                {{ $board->title }}
            </h2>
            <x-dropdown>
                <x-slot name="trigger">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>

                </x-slot>
                <x-slot name="content">
                    <div class="px-1 space-y-2">
                        <x-dropdown-button x-on:click="Livewire.dispatch('openModal', { component: 'modals.card-archive', arguments: {board: {{ $board->id }} } })">Archived cards</x-dropdown-button>
                        <x-dropdown-button x-on:click="Livewire.dispatch('openModal', { component: 'modals.column-archive', arguments: {board: {{ $board->id }} } })">Archived columns</x-dropdown-button>
                    </div>
                </x-slot>
            </x-dropdown>
        </div>
    </x-slot>

    <div class="w-full p-6 overflow-x-scroll">
        <div class="flex h-[calc(theme('height.screen')-64px-73px-theme('padding.12'))] space-x-6 w-max"
            wire:sortable="sorted" wire:sortable-group="moved">
            @foreach ($columns as $column)
                <div wire:key="{{ $column->id }}" wire:sortable.item="{{ $column->id }}">
                    <livewire:column :key='$column->id' :column='$column' />
                </div>
            @endforeach

            <div x-data="{ adding: false }" x-on:column-created.window="adding = false">
                <template x-if="adding">
                    <form wire:submit="createColumn"
                        class="px-4 py-3 bg-gray-700 rounded-lg shadow-sm w-[260px] text-white">
                        <div>
                            <x-input-label for="title" value="Title" class="sr-only" />
                            <x-text-input id="title" placeholder="Column title" class="w-full"
                                wire:model="createColumnForm.title" x-init="$el.focus()" />
                            <x-input-error :messages="$errors->get('createColumnForm.title')" class="mt-1" />
                        </div>

                        <div class="flex items-center mt-2 space-x-2">
                            <x-primary-button>
                                Create
                            </x-primary-button>
                            <button x-on:click="adding = false" type="button"
                                class="text-sm text-gray-200">Cancel</button>
                        </div>
                    </form>
                </template>
                <button x-show="!adding" x-on:click="adding = true"
                    class="flex items-center px-4 py-3 space-x-1 bg-gray-600 rounded-lg shadow-sm w-[260px] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span>
                        Add a column
                    </span>
                </button>
            </div>
        </div>
    </div>

</div>
