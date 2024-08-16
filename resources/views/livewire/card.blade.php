<div class="cursor-pointer" wire:sortable-group.handle
    wire:click="$dispatch('openModal', { component: 'modals.edit-card', arguments: { card: {{ $card->id }} } })">
    <div class="flex items-center justify-between px-3 py-1 bg-gray-600 rounded-lg 5">
        <div>
            {{ $card->title }}
        </div>

        @if ($card->notes)
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="text-gray-300 size-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
            </svg>
        @endif

    </div>
</div>
