<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateColumn;
use App\Models\Board;
use App\Models\Card;
use App\Models\Column;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BoardShow extends Component
{
    public Board $board;

    public CreateColumn $createColumnForm;

    public function mount()
    {
        $this->authorize('show', $this->board);
    }

    public function sorted(array $items)
    {
        $order = collect($items)->pluck('value')->toArray();

        Column::setNewOrder($order, 1, 'id', function(Builder $query) {
            $query->whereBelongsTo('user', auth()->user());
        });
    }

    public function moved(array $items)
    {
        collect($items)->recursive()->each(function($column) {
            $columnId = $column->get('value');
            $order = $column->get('items')->pluck('value')->toArray();

            Card::where('user_id', auth()->id())
                ->find($order)
                ->where('column_id', '!=', $columnId)
                ->each->update([
                    'column_id' => $columnId,
                ]);

            Card::setNewOrder($order, 1, 'id', function(Builder $query) {
                $query->where('user_id', auth()->id());
            });
        });
    }

    public function createColumn()
    {
        $this->createColumnForm->validate();

        $column = $this->board->columns()->make($this->createColumnForm->only('title'));
        $column->user()->associate(auth()->user());

        $column->save();

        $this->createColumnForm->reset();

        $this->dispatch('colmun-created');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.board-show', [
            'columns' => $this->board->columns()->ordered()->get(),
        ]);
    }
}
