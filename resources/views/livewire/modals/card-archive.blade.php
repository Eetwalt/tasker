<x-modal-wrapper title="Archived cards">
    <div class="space-y-2 overflow-y-scroll max-h-96">
        @forelse ($cards as $card)
            <div class="flex items-center justify-between px-3 py-2 border border-gray-600 rounded-lg">
                <div>
                    {{ $card->title }}
                </div>
                <button class="text-sm text-gray-500" wire:click="unarchiveCard({{ $card->id }})">Put back</button>
            </div>
        @empty
            <p>You don't have any archived cards.</p>
        @endforelse
    </div>
</x-modal-wrapper>
