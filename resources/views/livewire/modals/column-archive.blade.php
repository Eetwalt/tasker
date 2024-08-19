<x-modal-wrapper title="Archived columns">
    <div class="space-y-2 overflow-y-scroll max-h-96">
        @forelse ($columns as $column)
            <div class="flex items-center justify-between px-3 py-2 border border-gray-600 rounded-lg">
                <div>
                    {{ $column->title }}
                </div>
                <button class="text-sm text-gray-500" wire:click="unarchiveColumn({{ $column->id }})">Put back</button>
            </div>
        @empty
            <p>You don't have any archived columns.</p>
        @endforelse
    </div>
</x-modal-wrapper>
