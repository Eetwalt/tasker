<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\EditBoard as FormsEditBoard;
use App\Models\Board;
use LivewireUI\Modal\ModalComponent;

class EditBoard extends ModalComponent
{
    public Board $board;

    public FormsEditBoard $editBoardForm;

    public function mount()
    {
        $this->editBoardForm->fill($this->board->only('title'));
    }

    public function updateBoard()
    {
        $this->authorize('update', $this->board);

        $this->editBoardForm->validate();

        $this->board->update($this->editBoardForm->only('title'));

        $this->dispatch('board-updated');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.modals.edit-board');
    }
}
