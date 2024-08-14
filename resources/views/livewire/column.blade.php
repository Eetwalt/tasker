<div class="w-[260px] bg-gray-800 self-start max-h-full rounded-lg shadow-sm shrink-0 text-white flex flex-col">
    <div class="flex items-center justify-between">
        <div x-data="{ editing: false }" x-on:click.outside="editing = false" x-on:column-updated.window="editing = false" class="flex items-center w-full h-8 min-w-0 pl-4 pr-0">
            <button
                x-on:click="editing = true" x-show="!editing"
                class="w-full font-medium text-left">{{ $column->title }}</button>
            <template x-if="editing">
                <form wire:submit="updateColumn" class="-ml-[calc(theme('margin[1.5]')+1px)] grow">
                    <x-text-input type="text" class="h-8 px-1.5 w-full" wire:model="$column->title" wire:model="editColumnForm.title" x-init="$el.focus()" />
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
                    Content
                </x-slot>
            </x-dropdown>
        </div>
    </div>
    <div
        class="p-3 space-y-1.5 pt-0 overflow-y-scroll"
        wire:sortable-group.item-group="{{ $column->id }}"
    >
        @foreach ($cards as $card)
            <div wire:key="{{ $card->id }}" wire:sortable-group.item="{{ $card->id }}">
                <livewire:card :key='$card->id' :card='$card'/>
            </div>
        @endforeach
    </div>
    <div class="p-3">create card</div>
</div>
