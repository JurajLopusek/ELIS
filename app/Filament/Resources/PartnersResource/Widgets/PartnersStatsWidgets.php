<?php

namespace App\Filament\Resources\PartnersResource\Widgets;

use App\Models\Partners;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PartnersStatsWidgets extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make("Stats", Partners::all()->count())
                ->icon('heroicon-o-users')
                ->chartColor('warning')
                ->description('Active partners in the system')
                ->descriptionIcon('heroicon-o-check', 'before')
                ->descriptionColor('warning')
                ->chart([2, 22, 10, 40]),

        ];
    }
}

