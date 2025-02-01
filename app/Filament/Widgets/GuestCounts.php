<?php

namespace App\Filament\Widgets;

use App\Models\Guest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GuestCounts extends BaseWidget
{
    protected function getStats(): array
    {
        $guests = Guest::all();

        return [
            Stat::make('Всего гостей', 'guests')->value(fn() => $guests->sum(fn($guest) => $guest->personsCount())),
            Stat::make('Подтвердили участие', 'accepted')->value(fn() => $guests->sum(fn($guest) => $guest->acceptedPersonsCount())),
            Stat::make('Отказались', 'declined')->value(fn() => $guests->sum(fn($guest) => $guest->declinedPersonsCount())),
            Stat::make('Не подтвердили', 'notAccepted')->value(fn() => $guests->sum(fn(Guest $guest) => $guest->formIsSubmitted() ? 0 : $guest->personsCount())),
        ];
    }
}
