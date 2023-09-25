<?php

namespace App\Livewire;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Livewire\Component;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;

class ManagePost extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;


    public function deleteAction(): Action
    {
        return Action::make('delete')
            ->requiresConfirmation()
            ->form([
                TextInput::make('reason')
                    ->label('Reason for deleting post')
                    ->required(),
            ])
            ->action(fn () => \Log::info('Deleted post'));
    }

    public function render()
    {
        return view('livewire.manage-product');
    }
}
