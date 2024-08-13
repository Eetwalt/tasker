<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ $board->title }}
        </h2>
    </x-slot>

    <div class="w-full p-6 overflow-x-scroll">
        <div class="flex h-[calc(theme('height.screen')-64px-73px-theme('padding.12'))] space-x-6 w-max">
            @foreach ($columns as $column)
                <livewire:column wire:key='$column->id' :column='$column' />
            @endforeach
        </div>
    </div>

</div>
