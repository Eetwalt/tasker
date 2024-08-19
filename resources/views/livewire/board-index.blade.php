<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-white">
        {{ __('Boards') }}
    </h2>
</x-slot>

<div class="py-6">
    <div class="grid grid-cols-4 gap-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @foreach ($boards as $board)
            <a href="{{ route('boards.show', $board) }}"
                class="flex items-end p-6 overflow-hidden text-lg text-white transition duration-300 border shadow-sm bg-base-700 border-primary/50 hover:bg-base-500 hover:border-primary hover:shadow-lg hover:-translate-y-1 sm:rounded-lg h-36">
                {{ $board->title }}
            </a>
        @endforeach

        <button
            class="flex items-center justify-center p-6 space-x-1 overflow-hidden text-lg transition duration-300 shadow-sm text-secondary bg-base-500 hover:bg-base-300 sm:rounded-lg h-36" wire:click="$dispatch('openModal', { component: 'modals.create-board' })">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
            <span>
                Create board
            </span>
        </button>
    </div>
</div>
