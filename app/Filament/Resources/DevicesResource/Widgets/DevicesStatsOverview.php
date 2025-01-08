<?php

namespace App\Filament\Resources\DevicesResource\Widgets;

use App\Models\Devices;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DevicesStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make("eRaptor",Devices::eRaptor()),
            Stat::make("eRex",Devices::eRex()),


        ];
    }
}
