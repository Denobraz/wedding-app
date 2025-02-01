<?php

namespace App\Filament\Resources\GuestResource\Pages;

use App\Filament\Resources\GuestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditGuest extends EditRecord
{
    protected static string $resource = GuestResource::class;

    public function getTitle(): string|Htmlable
    {
        return $this->record->displayName();
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('url')
                ->icon('heroicon-o-link')
                ->label('Ссылка')
                ->url($this->record->personalUrl(), true),
            Actions\DeleteAction::make(),
        ];
    }
}
